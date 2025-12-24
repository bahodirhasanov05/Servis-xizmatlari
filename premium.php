<?php
require_once "bot/config.php";
?>
<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<title>Premium Tariflar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>💎 Premium Tariflar</h1>
<p>1) Oddiy VIP – 3$ (TON yoki BTC)<br>
   Limit: 5 ta bot ulash</p>
<p>2) Super VIP – 10$<br>
   Limit: 60 ta bot ulash</p>
<p>To‘lov tizimi:</p>
<p>🔵 TON: <code><?php echo $TON_WALLET;?></code><br>
🟠 Bitcoin: <code><?php echo $BTC_WALLET;?></code></p>
<a href="index.php">Orqaga</a>
</body>
</html>