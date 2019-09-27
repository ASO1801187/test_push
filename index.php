<?php
// HTTPヘッダを設定

if(isset($_GET["name"])){
    $message = $_GET["name"];
    $channelToken = '352jijyCONf7qp9N9sSHCWHTDnki/dnjKYlKNzVW93myBTzloeHbfD0vwJLsS3KmRUHWUjqMcklIQ1e6dtD9PBTdxkNdcSFq64bxiUD54iWHx8y8qxciySFJDxka4GP9HqBxEATWkQBm9Yw2Zwd74wdB04t89/1O/w1cDnyilFU=';
    $headers = [
        'Authorization: Bearer ' . $channelToken,
        'Content-Type: application/json; charset=utf-8',
    ];

// POSTデータを設定してJSONにエンコード
    $post = [
        'messages' => [
            [
                'type' => 'text',
                'text' => $message,
            ],
        ],
    ];
    $post = json_encode($post);

// HTTPリクエストを設定
    $ch = curl_init('https://api.line.me/v2/bot/message/broadcast');
    $options = [
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_BINARYTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => $post,
    ];
    curl_setopt_array($ch, $options);

// 実行
    $result = curl_exec($ch);

// エラーチェック
    $errno = curl_errno($ch);
    if ($errno) {
        return;
    }

// HTTPステータスを取得
    $info = curl_getinfo($ch);
    $httpStatus = $info['http_code'];

    $responseHeaderSize = $info['header_size'];
    $body = substr($result, $responseHeaderSize);

// 200 だったら OK
    echo $httpStatus . ' ' . $body;
}

?>
<form action="index.php" method="post">
    送信内容；<input type="text" name="name">
    <input type="submit" value="送信">
</form>
