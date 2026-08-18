<?php
// Защита от прямого доступа
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Доступ запрещён');
}

$token = "7853960741:AAEcPSb6ebZeH2paq5WI7oMTFiop3XjDySM";
$chat_id = "6017567530";

// Валидация
if (empty($_POST['phone'])) {
    die('Укажите телефон');
}

$name = $_POST['name'] ?? 'не указано';
$phone = $_POST['phone'];
$message = $_POST['message'] ?? 'не указано';

$text = "📩 Новая заявка с сайта!\n\n👤 Имя: $name\n📞 Телефон: $phone\n📝 Сообщение: $message";

// Отправка через cURL (надёжнее)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$token/sendMessage");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'chat_id' => $chat_id,
    'text' => $text
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

// Перенаправление на страницу благодарности
header('Location: thanks.html');
exit;
