<?php
// Ambil pesan dari parameter URL
$msg = $_GET['msg'] ?? 'Pesan default dari MikroTik';

// Token dan Chat ID Telegram
$token = '6290020134:AAHr_Y6sZQDOqvUlSYr8EGU7fMOoU35x-xQ'; // GANTI dengan token bot kamu
$chat_id = '561234567'; // GANTI dengan chat ID milik kamu

// URL API Telegram
$url = "https://api.telegram.org/bot$token/sendMessage";

// Siapkan data pesan
$data = [
    'chat_id' => $chat_id,
    'text' => $msg
];

// Kirim HTTP request ke Telegram
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data),
    ]
];

// Eksekusi request
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// Tampilkan respons dari Telegram
echo $response;
?>
