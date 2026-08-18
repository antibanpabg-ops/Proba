<?php
$token = "7853960741:AAEcPSb6ebZeH2paq5WI7oMTFiop3XjDySM";   // например "123456:ABC-DEF"
$chat_id = "6017567530";    // например "123456789"

$name = $_POST['name'] ?? 'не указано';
$phone = $_POST['phone'] ?? 'не указано';
$message = $_POST['message'] ?? 'не указано';

$text = "📩 Новая заявка с сайта!\n\n👤 Имя: $name\n📞 Телефон: $phone\n📝 Сообщение: $message";

// Отправляем в Telegram
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text));

// Перенаправляем на страницу "спасибо"
header('Location: thanks.html');
exit;
?>
