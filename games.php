<?php
require_once "bot/config.php";
?>
<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>O‘yinlar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>O‘yinlar ro‘yxati</h1>
<?php
foreach($GAMES as $game){
    $vip = $game['type']=="vip"?"💎 VIP":"🆓 Bepul";
    echo "<h3>{$game['name']} - {$vip}</h3>";
    echo "<p>Max o‘yinchi: {$game['max_players']}<br>";
    echo "Ta'rif: {$game['description']}</p><hr>";
}
?>
<a href="index.php">Orqaga</a>
</body>
</html>