<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

$serverName = "localhost"; // IP کانتینر MySQL
$db_name    = "alateami_fragment";  // نام دیتابیس
$db_user    = "alateami_fragment";       // یوزر که ساختی
$db_pass    = 'GDFG%$g^#^H524545'; // پسورد

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
$token        = "2021312070:AJcfyAgOUjWs1OB0iSWMeliBox6ye-UotD4"; // توکن ربات
$admin        = "544316811"; // عددی ادمین
$bot_id       = "irancreatbot";
$web          = "https://devmramir.sbs/irancreat";
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