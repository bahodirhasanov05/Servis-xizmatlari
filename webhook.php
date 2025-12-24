<?php
require_once "bot.php";

// Telegram JSON update qabul qiladi
$update = json_decode(file_get_contents("php://input"), true);

// Botni ishlatadi
handleUpdate($update);

// Log qilish (xatolarni ko‘rish uchun)
file_put_contents("log.txt", print_r($update,true),FILE_APPEND);
?>