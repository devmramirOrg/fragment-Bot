<?php

//-------------------------
// Dev : @DevMrAmir
// Channel Telegram : @AlaCode
//-------------------------

$serverName = "localhost"; // IP کانتینر MySQL
$db_name    = "";  // نام دیتابیس
$db_user    = "";       // یوزر که ساختی
$db_pass    = ''; // پسورد

try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    echo "✅ اتصال موفقیت‌آمیز بود!";
} catch (PDOException $e) {
    die("❌ خطا در اتصال: " . $e->getMessage());
}
//------- Data ------- 
$token        = ""; // Bot Token
$admin        = "544316811"; // Admin Id
$bot_id       = "irancreatbot"; // Bot Id
$web          = "https://devmramir.sbs/irancreat"; // Your Url
$chanSef      = "-";
$chaneljoin   = ""; 
$chaneljoin2  = "";
$chaneljoin3  = "";
$chaneljoin4  = "";
//------- Function -------  
function bot($method, $user = []){
    global $token;
$url = "https://tapi.bale.ai/bot$token"."/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
$res = curl_exec($ch);
if (curl_error($ch)) {
    var_dump(curl_error($ch));
} else {
    return json_decode($res);
}
}


?>
