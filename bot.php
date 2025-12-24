<?php
require_once "config.php";

// Xush kelibsiz xabari
function sendWelcomeMessage($chat_id){
    global $GAMES;
    $menu = [
        ["🎮 Game Xizmatlari","💎 Premium"],
        ["⚙️ Mening botlarim","🏷 Referral"]
    ];
    $msg = "Assalomu alaykum! 🎮\nBotimiz orqali bepul va VIP o‘yinlarga kirishingiz mumkin.\n\nMenyudan tanlang va o‘ynashni boshlang!";
    sendMessage($chat_id, $msg, $menu);
}

// Telegramga xabar yuborish
function sendMessage($chat_id,$text,$buttons=null){
    global $BOT_TOKEN;
    $data = [
        'chat_id'=>$chat_id,
        'text'=>$text,
        'parse_mode'=>"HTML"
    ];
    if($buttons){
        $data['reply_markup']=json_encode([
            'keyboard'=>$buttons,
            'resize_keyboard'=>true
        ]);
    }
    file_get_contents("https://api.telegram.org/bot$BOT_TOKEN/sendMessage?".http_build_query($data));
}

// O‘yinlar ro‘yxati
function showGames($chat_id){
    global $GAMES;
    $msg = "🎮 O‘yinlar ro‘yxati:\n\n";
    foreach($GAMES as $game){
        $vip = $game['type']=="vip"?"💎 VIP":"🆓 Bepul";
        $msg .= "{$game['name']} - {$vip}\nMax o‘yinchi: {$game['max_players']}\nTa'rif: {$game['description']}\n\n";
    }
    sendMessage($chat_id,$msg);
}

// Premium ro‘yxati
function showPremium($chat_id){
    global $TON_WALLET,$BTC_WALLET;
    $msg = "💎 PREMIUM TARIFLAR\n\n1) Oddiy VIP – 3$ (TON yoki BTC)\n   Limit: 5 ta bot ulash\n2) Super VIP – 10$\n   Limit: 60 ta bot ulash\n\nTo‘lov tizimi:\n🔵 TON: <code>$TON_WALLET</code>\n🟠 Bitcoin: <code>$BTC_WALLET</code>";
    sendMessage($chat_id,$msg);
}

// Referal tizimi
function showReferral($chat_id,$user_id){
    $link = "https://t.me/YOUR_BOT_USERNAME?start=ref$user_id";
    $msg = "👥 Referal tizimi:\nDo‘stlaringizni taklif qilib bonus oling!\n\nSizning havolangiz:\n$link";
    sendMessage($chat_id,$msg);
}

// Foydalanuvchi xabari qabul qilish
function handleUpdate($update){
    if(!isset($update["message"])) return;
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];
    global $BOT_TOKEN;

    switch($text){
        case "/start":
            sendWelcomeMessage($chat_id);
            break;
        case "🎮 Game Xizmatlari":
            showGames($chat_id);
            break;
        case "💎 Premium":
            showPremium($chat_id);
            break;
        case "🏷 Referral":
            showReferral($chat_id,$update["message"]["from"]["id"]);
            break;
        default:
            sendMessage($chat_id,"Buyruq topilmadi. Menyudan tanlang!");
    }
}
?>