<?php
// エラーレポートをオンにする
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// プリフライトリクエストの場合
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

$url = 'https://script.google.com/macros/s/AKfycbw_b332tD3ePKmGA3KKBtjeHoBXXDkOh3UXaxG9PWkPqvfnSH4QUvc_pK0aNCnWWhLE/exec';

// リクエストの本体を取得
$data = file_get_contents('php://input');

// デバッグ用にデータをログ出力
error_log("Received data: " . $data);

// cURLセッションを初期化
$ch = curl_init($url);

if ($ch === false) {
    error_log("Failed to initialize cURL session");
    echo json_encode(array("error" => "Failed to initialize cURL session"));
    http_response_code(500);
    exit();
}

// cURLオプションを設定
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    )
);

// リクエストを実行し、レスポンスを取得
$result = curl_exec($ch);

if ($result === false) {
    $error = curl_error($ch);
    error_log("cURL error: " . $error);
    echo json_encode(array("error" => $error));
    http_response_code(500);
    curl_close($ch);
    exit();
}

// cURLセッションを閉じる
curl_close($ch);

// デバッグ用にレスポンスをログ出力
error_log("cURL response: " . $result);

// レスポンスにCORSヘッダーを追加して出力
header('Access-Control-Allow-Origin: *');
echo $result;
