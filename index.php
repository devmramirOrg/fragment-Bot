<?php
// ---------
// We Telegram Channel : @AlaCode
// Developer (Telegram ID) : @DevMrAmir
// ---------
$client_ip = null;

if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $client_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $client_ip = $_SERVER['HTTP_X_REAL_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $client_ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
} elseif (!empty($_SERVER['REMOTE_ADDR'])) {
    $client_ip = $_SERVER['REMOTE_ADDR'];
} else {
    exit;
}

date_default_timezone_set('Asia/Tehran');

$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
];

$ip_dec = (float) sprintf("%u", ip2long($client_ip));

$ok = false;
foreach ($telegram_ip_ranges as $range) {
    $lower_dec = (float) sprintf("%u", ip2long($range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($range['upper']));
    if ($ip_dec >= $lower_dec && $ip_dec <= $upper_dec) {
        $ok = true;
        break;
    }
}

if (!$ok) {
    header("Location: https://t.me/alacode");
    exit;
}

//error_reporting(0);
    // ------- include -------
    include("config.php");
    include("file.php");
    //include("fragment.php"); // For Next Update
    $date = jdate("Y/m/d");
    $time = jdate("H:i:s");
    $next = jdate('Y/m/d',strtotime('+30 day'));
    //$client = new TonFragmentClient('http://localhost:5000'); For Next Update
    // ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
    if(isset($update->message)){
    $chat_id = $update->message->chat->id;
    $from_id = $update->message->from->id;
    $text = $update->message->text;
    $first = $update->message->from->first_name;
    $message_id = $update->message->message_id;
    $captio = $update->message->caption;
    $video = $update->message->video;
    $file_id = $update->message->video->file_id;
    $photo = $update->message->photo;
    $document = $update->message->document;
    $file_id2 = $update->message->document->file_id;
    $phoneid = $update->message->contact->user_id;
    }
    if (isset($photo) && is_array($photo) && count($photo) > 0) {
    $file_id1 = $photo[count($photo)-1]->file_id;
} else {
    $file_id1 = null;  
}
    if (isset($update->callback_query)){
    $callback_query_id = $update->callback_query->id;
    $chat_id = $update->callback_query->message->chat->id;
    $data = $update->callback_query->data;
    $message_id2 = $update->callback_query->message->message_id;
}

//Anti Code
if($chat_id != $admin){
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
}

try {
    $sql2setting = "SELECT * FROM `setting` LIMIT 1";
    $stmtSetting = $pdo->query($sql2setting);
    $ressetting  = $stmtSetting->fetch(PDO::FETCH_ASSOC);

    if (!$ressetting) {
$sqlInsert = "INSERT INTO `setting` (`bot`, `ton`, `stars`, `pay`, `permium`, `idpay`, `tron`, `cart`, `sell`, `tron_walet`, `idpay_merchant`, `cart_number`, `Percentage`, `Percentage_result`, `tonwalet`, `fragment`) VALUES ('on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on')";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute();
    }else {


        

    $botsetting          = $ressetting['bot'];
    $pay                 = $ressetting['pay'];
    $idpay               = $ressetting['idpay'];
    $tron                = $ressetting['tonwalet'];
    $cart                = $ressetting['cart'];
    $sell                = $ressetting['sell'];
    $tron_walet          = $ressetting['tron_walet'];
    $idpay_merchant      = $ressetting['idpay_merchant'];
    $cart_number         = $ressetting['cart_number'];
    $Percentage          = $ressetting['Percentage'];
    $Percentage_result   = $ressetting['Percentage_result'];
    $fragment            = $ressetting['fragment'];
    $stars_setting       = $ressetting['stars'];
    $permium_setting     = $ressetting['permium'];
    $tron_setting        = $ressetting['tron'];
    $ton                 = $ressetting['ton'];
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات setting: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}

try {
    $sql2texts = "SELECT * FROM `texts` LIMIT 1";
    $stmtStexts = $pdo->query($sql2texts);
    $restexts  = $stmtStexts->fetch(PDO::FETCH_ASSOC);

    if (!$restexts) {
        $sqlInsert = "INSERT INTO `texts` (`help`, `ruls`, `start`) VALUES ('none', 'none', 'none')";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute();
    }else{
    $help                = $restexts['help'];
    $ruls                = $restexts['ruls'];
    $start               = $restexts['start'];

    }

    
    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات texts: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}

try {
    $sql2users = "SELECT * FROM `users` WHERE `id` = :chat_id";
    $stmtUsers = $pdo->prepare($sql2users);
    $stmtUsers->execute([':chat_id' => $chat_id]);
    $resusers = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        $sqlInsert = "INSERT INTO `users` (`id`, `step`, `time`, `number`, `coin`, `account`, `date`) 
                      VALUES (:chat_id, 'none', :time, '0', '0', 'none', :date)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([
            ':chat_id' => $chat_id,
            ':time' => $time,
            ':date' => $date
        ]);
    } else {
        $step = $resusers['step'];
        $timeuser = $resusers['time'];
        $numberuser = $resusers['number'];
        $coinuser = $resusers['coin'];
        $accountuser = $resusers['account'];
        $dateuser = $resusers['date'];
    }
} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
}

if (isset($update) and $chat_id != $admin){

if ($botsetting == "off") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "ربات در حال حاضر غیر فعال است .",
        'parse_mode' => "HTML",
    ]);
    exit;

}

if ($accountuser == "ban"){
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "شما از استفاده از ربات محروم شده اید .",
        'parse_mode' => "HTML",
    ]);
    exit;
}
}



$account     = '💻 حساب کاربری';
$helpKey     = '🚦راهنما و قوانین';
$support     = '👮🏻 پشتیبانی';
$addCoin     = '🛒 افزایش موجودی';
$servislist    = '🗂 سرویس ها';

$account_data     = 'account';
$helpKey_data     = 'help';
$support_data     = 'support';
$addCoin_data     = 'add_coin';
$servislist_data    = 'my_bots';



$inline_keyboard = [
    [
        ['text' => $account, 'callback_data' => "$account_data"],
        ['text' => $servislist, 'callback_data' => "$servislist_data"]
    ],
    [
        ['text' => $helpKey, 'callback_data' => "$helpKey_data"],
        ['text' => $addCoin, 'callback_data' => "$addCoin_data"]
    ],
    [
        ['text' => $support, 'callback_data' => "$support_data"]
    ]
];

$reply_markup = json_encode([
    'inline_keyboard' => $inline_keyboard
]);

$key11          = '📊 امار ربات';
$key21          = '📨 پیام همگانی';
$key51          = '📨 فوروارد همگانی';
$addServes      = '🔧 مدیریت سرویس ها';
$adCoin         = '💰 افزایش موجودی';
$kasrCoin       = '💰 کاهش موجودی';
$checkA         = '👀 چک کردن کاربر';
$suppprt_result = '📭 ارسال پیام به کاربر';
$addAdmin       = '👤 اضافه کردن ادمین';
$kasrAdmin      = '👤 کسر ادمین';
$onbot          = '✅ روشن کردن ربات';
$offBot         = '❌ خاموش کردن ربات';
$banUser        = '❌ بن یوزر';
$unbanU         = '✅ ازاد کردن کاربر';
$motonSeting    = '🗂 تنظیمات متن';
$setingbot      = '🤖 تنظیمات ربات';
$back           = '◀️ بازگشت';
                
                                $reply_keyboard_panel = [
                                                        [$key11] ,
                                                        [$key21 , $key51] ,
                                                        [$addServes] ,
                                                        [$adCoin , $kasrCoin] ,
                                                        [$checkA , $suppprt_result] ,
                                                        [$addAdmin , $kasrAdmin] ,
                                                        [$onbot , $offBot] ,
                                                        [$banUser , $unbanU] ,
                                                        [$motonSeting , $setingbot] ,
                                                        [$back] ,
                                                        
                                                        ];
                                 
                                    $reply_kb_options_panel = [
                                                                                                'keyboard'          => $reply_keyboard_panel ,
                                                                                                'resize_keyboard'   => true ,
                                                                                                'one_time_keyboard' => false ,
];

                                                                $reply_keyboard_back = [
                                                                                            [$back] ,
                                                                                            
                                                                                        ];
                                                                                             
    $reply_kb_options_back = [
                                                                                                'keyboard'          => $reply_keyboard_back ,
                                                                                                'resize_keyboard'   => true ,
                                                                                                'one_time_keyboard' => false ,
                                                                                            ];


if($data == "ozvshodam"){

$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin&user_id=".$chat_id));
$tch = $forchaneel->result->status;

$forchaneel2 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin2&user_id=".$chat_id));
$tch2 = $forchaneel2->result->status;

$forchaneel3 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin3&user_id=".$chat_id));
$tch3 = $forchaneel3->result->status;

$forchaneel4 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin4&user_id=".$chat_id));
$tch4 = $forchaneel4->result->status;

if(
    !($tch != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch2 != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch3 != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch4 != 'member' && $tch != 'creator' && $tch != 'administrator')
){

        bot('answerCallbackQuery', [
            'callback_query_id' => $callback_query_id,
            'text' => "❌ - شما هنوز در کانال ها جوین نشدید",
            'show_alert' => true
        ]);

    } else {

        bot('deleteMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2
        ]);

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ - عضویت شما تایید شد",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_markup),
        ]);
    }
}

$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin&user_id=".$chat_id));
$tch = $forchaneel->result->status;

$forchaneel2 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin2&user_id=".$chat_id));
$tch2 = $forchaneel2->result->status;

$forchaneel3 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin3&user_id=".$chat_id));
$tch3 = $forchaneel3->result->status;

$forchaneel4 = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chaneljoin4&user_id=".$chat_id));
$tch4 = $forchaneel4->result->status;

if ($chat_id != $admin){
if(
    !($tch != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch2 != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch3 != 'member' && $tch != 'creator' && $tch != 'administrator') ||
    !($tch4 != 'member' && $tch != 'creator' && $tch != 'administrator')
){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت کار با ربات در کانال های زیر عضو شوید و سپس /start را به ربات ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🖥 کانال اول",'url'=>"https://t.me/$chaneljoin"]],
                [['text'=>"🖥 کانال دوم",'url'=>"https://t.me/$chaneljoin2"]],
                [['text'=>"🖥 کانال سوم",'url'=>"https://t.me/$chaneljoin3"]],
                [['text'=>"🖥 کانال چهارم",'url'=>"https://t.me/$chaneljoin4"]],
                [['text'=>"✅ عضو شدم",'callback_data'=>"ozvshodam"]],
            ]
        ])
    ]);

    exit();
}}



function cartTocart($pdo,$chat_id,$cart,$cart_number,$reply_kb_options_back,$pay){

if ($cart == "on"){

if ($pay == "on"){

bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "$cart_number
            
به شماره کارت بالا پول رو واریز کنید و عکس رسید را ارسال کنید",
            'parse_mode' => "HTML",
             'reply_markup' => json_encode($reply_kb_options_back),
        ]);

         $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'cartTocart' WHERE id = :chat_id LIMIT 1");
$stmt->execute(['chat_id' => $chat_id]);

} else {
bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "قسمت خرید کارت به کارت خاموش شده توسط ادمین",
            'parse_mode' => "HTML",
        ]);
}

}else {
    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "قسمت خرید کارت به کارت خاموش شده توسط ادمین",
            'parse_mode' => "HTML",
        ]);
}
}
function TronOrTon_pay($chat_id,$pay){

if ($pay == "on"){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 از بخش زیر ارز خود را انتخاب کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"📩 ترون",'callback_data'=>"pay_tron_end"]],
                [['text'=>"📩 تون",'callback_data'=>"pay_ton_end"]],
                            ],
        ])
    ]);

}else {
    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خرید خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}

}
function idpay_pay($chat_id,$pay,$idpay,$reply_kb_options_back,$pdo){

if ($pay == "on"){

if ($idpay == "on"){

bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ - مبلغی که میخواهید پرداخت کنید به تومان وارد کنید",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_back),
        ]);
$stmt = $pdo->prepare("UPDATE `users` SET `step` = 'idpay_pay' WHERE id = :chat_id LIMIT 1");
$stmt->execute(['chat_id' => $chat_id]);

}else {
    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "درگاه ایدی پی از طرف ادمین خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}
}else{

bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "افزایش موجودی خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}

}

function pay_tron_end($chat_id,$pdo,$tron,$reply_kb_options_back,$pay,$tron_walet){

if ($pay == "on"){

if ($tron == "on"){

bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ - ترون را به ولت : 
$tron_walet 

واریز کنید بعد هش را ارسال کنید",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_back),
        ]);
$stmt = $pdo->prepare("UPDATE `users` SET `step` = 'pay_tron_end' WHERE id = :chat_id LIMIT 1");
$stmt->execute(['chat_id' => $chat_id]);

}else {
bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خرید ترون خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}
}else {
    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خرید خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}
}

function pay_ton_end($chat_id,$pdo,$ton,$reply_kb_options_back,$pay,$tron_setting){

if ($pay == "on"){

if ($tron_setting == "on"){

bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ - مقدار تون را به ولت :
$ton 

واریز کنید و هش ارسال کنید",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_back),
        ]);
$stmt = $pdo->prepare("UPDATE `users` SET `step` = 'pay_ton_end' WHERE id = :chat_id LIMIT 1");
$stmt->execute(['chat_id' => $chat_id]);

}else {
bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خرید ترون خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}
}else {
    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خرید خاموش میباشد",
            'parse_mode' => "HTML",
        ]);
}
}
switch($data) {

    case "pay_ton_end"              : pay_ton_end($chat_id,$pdo,$ton,$reply_kb_options_back,$pay,$tron_setting);                                                                               break;
    case "pay_tron_end"             : pay_tron_end($chat_id,$pdo,$tron,$reply_kb_options_back,$pay,$tron_walet);                                                                              break;
    case "cartTocart"               : cartTocart($pdo,$chat_id,$cart,$cart_number,$reply_kb_options_back,$pay);                                                                                break;
    case "idpay_pay"                : idpay_pay($chat_id,$pay,$idpay,$reply_kb_options_back,$pdo);                                 break;
    case $account_data              : account_data($pdo,$chat_id,$timeuser,$numberuser,$coinuser,$accountuser,$dateuser);          break;
    case $helpKey_data              : helpKey_data($chat_id);                                                                      break;                                                                                  
    case $support_data              : support_data($pdo,$chat_id,$reply_kb_options_back);                                          break;
    case $addCoin_data              : addCoin_data($chat_id,$idpay,$tron,$sell,$cart,$pay,$ton);                                                                              break;
    case $servislist_data           : servislist_data($sell,$pdo,$chat_id);                                                                           break;
    case "helptext"                 : helptext($help,$chat_id);                                                                    break;
    case "rulstext"                 : rulstext($ruls,$chat_id);                                                                    break;    
    case "start_text_set"           : start_text_set($pdo,$chat_id,$reply_kb_options_back);                                        break;
    case "help_text_help"           : help_text_help($pdo,$chat_id,$reply_kb_options_back);                                        break;
    case "rule_text_rules"          : rule_text_rules($pdo,$chat_id,$reply_kb_options_back);                                       break;
    case "tonwalet"                 : tonwalet($pdo,$chat_id,$reply_kb_options_back);                                              break;
    case "fragmentsetting"          : fragmentsetting($pdo,$chat_id,$reply_kb_options_back);                                       break;
    case "idpaymarchand"            : idpaymarchand($pdo,$chat_id,$reply_kb_options_back);                                         break;
    case "shopsetting"              : shopsetting($chat_id);                                                                       break;
    case "tronwalet"                : tronwalet($pdo,$chat_id,$reply_kb_options_back);                                             break;
    case "paysetting"               : paysetting($chat_id);                                                                        break;
    case "onidpay"                  : onidpay($pdo,$chat_id);                                                                      break;
    case "offidpay"                 : offidpay($pdo,$chat_id);                                                                     break;
    case "ontronshop"               : ontronshop($pdo,$chat_id);                                                                   break;
    case "offtronshop"              : offtronshop($pdo,$chat_id);                                                                  break;
    case "onpaystarts"              : onpaystarts($pdo,$chat_id);                                                                   break;
    case "offpaystars"              : offpaystars($pdo,$chat_id);                                                                   break;
    case "onpaypermium"             : onpaypermium($pdo,$chat_id);                                                                  break;
    case "offpaypermium"            : offpaypermium($pdo,$chat_id);                                                                 break;
    case "onallofthem_pay"          : onallofthem_pay($pdo,$chat_id);                                                               break;
    case "offallofthem_pay"         : offallofthem_pay($pdo,$chat_id);                                                              break;
    case "addorginal_service"       : addorginal_service($pdo,$chat_id,$reply_kb_options_back);                                                                         break;
    case "addsecend_service"        : addsecend_service($pdo,$chat_id,$reply_kb_options_back);                                                                          break;
    case "removorginal"             : removorginal($pdo,$chat_id,$reply_kb_options_back);                                                                               break;
    case "removesecend"             : removesecend($pdo,$chat_id,$reply_kb_options_back);                                                                               break;
    case "TronOrTon_pay"            : TronOrTon_pay($chat_id,$pay);



}

function removesecend($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 نام سرویس را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'removesecend' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function removorginal($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 نام سرویس را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'removorginal' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function addsecend_service($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 نام سرویس را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addsecend_service' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function addorginal_service($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 نام سرویس را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addorginal_service' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function offallofthem_pay($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 خاموش شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `pay` = 'off'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function onallofthem_pay($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 روشن شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `pay` = 'on'");
    $stmt->execute(['chat_id' => $chat_id]);

}


function offpaypermium($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 خاموش شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `permium` = 'off'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function onpaypermium($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 روشن شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `permium` = 'on'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function offpaystars($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 خاموش شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `stars` = 'off'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function onpaystarts($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 روشن شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `stars` = 'on'");
    $stmt->execute(['chat_id' => $chat_id]);

}


function offtronshop($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 خاموش شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `tron` = 'off'");
    $stmt->execute(['chat_id' => $chat_id]);

}


function ontronshop($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 رپشن شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `tron` = 'on'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function offidpay($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 خاموش شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `idpay` = 'off'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function onidpay($pdo,$chat_id){


bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 روشن شد",
        'parse_mode' => "HTML",
    ]);

    $stmt = $pdo->prepare("UPDATE `setting` SET `idpay` = 'on'");
    $stmt->execute(['chat_id' => $chat_id]);

}

function shopsetting($chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت تنظیم قسمت خرید از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"📩 روشن کردن ایدی پی",'callback_data'=>"onidpay"]],
                [['text'=>"📩 خاموش کردن ایدی پی",'callback_data'=>"offidpay"]],
                            ],
                            [
                [['text'=>"📩 روشن کردن ترون",'callback_data'=>"ontronshop"]],
                [['text'=>"📩 خاموش کردن ترون",'callback_data'=>"offtronshop"]],
                            ]
        ])
    ]);
}

function paysetting($chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت تنظیم قسمت خرید از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"📩 روشن کردن خرید استار",'callback_data'=>"onpaystarts"]],
                [['text'=>"📩 خاموش کردن خرید استار",'callback_data'=>"offpaystars"]],
                            ],
                            [
                [['text'=>"📩 روشن کردن خررید پرمیوم",'callback_data'=>"onpaypermium"]],
                [['text'=>"📩 خاموش کردن خرید پرمیوم",'callback_data'=>"offpaypermium"]],
                            ],
                            [
                [['text'=>"📩 روشن کردن کل",'callback_data'=>"onallofthem_pay"]],
                [['text'=>"📩 خاموش کردن کل",'callback_data'=>"offallofthem_pay"]],
                            ]
        ])
    ]);

}

function tronwalet($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 ولت ترون خود را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'idpaymarchand' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);

}

function idpaymarchand($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 مرچند درگاه ایدی پی را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'idpaymarchand' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);

}

function fragmentsetting($pdo,$chat_id,$reply_kb_options_back){


}

function tonwalet($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 ولت تون خود را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'tonwalet' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);

}

function rule_text_rules($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 متن قوانین را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'rule_text_rules' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function help_text_help($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 متن راهنما را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'help_text_help' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function start_text_set($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 متن استارت را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'start_text_set' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}


$stmt = $pdo->prepare("SELECT `id` FROM `admin` WHERE `id` = :id");
$stmt->execute(['id' => $chat_id]);
$res_admin = $stmt->fetch(PDO::FETCH_ASSOC);

$trsrul_admin = $res_admin['id'] ?? 0; 


if ($from_id == $admin || $from_id == $trsrul_admin) {

    switch($text) {

        case $key11          : statistics($pdo,$chat_id);                            break;
        case "/admin"        : panel($chat_id,$reply_kb_options_panel);              break;
        case $key21          : key_hmgani($pdo,$chat_id,$reply_kb_options_back);     break;
        case $key51          : key_forvard($pdo,$chat_id,$reply_kb_options_back);    break;
        case $addServes      : addserves($pdo,$chat_id);                             break;
        case $suppprt_result : suppprt_result($pdo,$chat_id,$reply_kb_options_back); break;
        case $checkA         : check_user($pdo,$chat_id,$reply_kb_options_back);     break;
        case $addAdmin       : ad_admin($pdo,$chat_id,$reply_kb_options_back);       break;
        case $setingbot      : setingbot($chat_id);                                  break;
        case $motonSeting    : motonSeting($chat_id);                                break;
        case $unbanU         : unbanU($pdo,$chat_id,$reply_kb_options_back);         break;
        case $banUser        : banUser($pdo,$chat_id,$reply_kb_options_back);        break;
        case $offBot         : offBot($pdo,$chat_id);                                break;
        case $onbot          : onbot($pdo,$chat_id);                                 break;
        case $adCoin         : adCoin($pdo,$chat_id,$reply_kb_options_back);         break;
        case $kasrCoin       : kasrCoin($pdo,$chat_id,$reply_kb_options_back);       break;
        case $kasrAdmin      : kasrAdmin($pdo,$chat_id,$reply_kb_options_back);      break;

    }
}

function addserves($pdo,$chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت تنظیمات سرویس ها از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"➕ سرویس اصلی",'callback_data'=>"addorginal_service"]],
                [['text'=>"➕ سرویس فرعی",'callback_data'=>"addsecend_service"]],
                [['text'=>"➖ سرویس اصلی",'callback_data'=>"removorginal"]],
                [['text'=>"➖ سرویس فرعی",'callback_data'=>"removesecend"]],
                
            ]
        ])
    ]);
}

function setingbot($chat_id){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت تنظیم ربات از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"تنظیمات ولت تون",'callback_data'=>"tonwalet"]],
                [['text'=>"تنظیمات فرگمنت",'callback_data'=>"fragmentsetting"]],
                [['text'=>"تنظیمات ولت ترون",'callback_data'=>"tronwalet"]],
                [['text'=>"تنظیمات درگاه",'callback_data'=>"idpaymarchand"]],
                [['text'=>"تنظیمات خرید",'callback_data'=>"shopsetting"]],
                [['text'=>"تنظیمات پرداخت",'callback_data'=>"paysetting"]],
                
            ]
        ])
    ]);

}

function motonSeting($chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت تنظیم متن های ربات از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"📩 متن استارت",'callback_data'=>"start_text_set"]],
                [['text'=>"📩 متن راهنما",'callback_data'=>"help_text_help"]],
                [['text'=>"📩 متن قوانین",'callback_data'=>"rule_text_rules"]],
            ]
        ])
    ]);

}

function check_user($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'check_user' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function banUser($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'ban_user' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function unbanU($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `account` = 'none' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function kasrCoin($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید و مبلغ را زیر ان",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'kasr_coin' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function adCoin($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر و مبلغ را با , بفرستید
id,number",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'add_coin' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function onbot($pdo,$chat_id){

    $stmt = $pdo->prepare("UPDATE `setting` SET `bot` = 'on' LIMIT 1");
    $stmt->execute();

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ ربات با موفقیت روشن شد",
        'parse_mode' => "HTML",
    ]);
}

function offBot($pdo,$chat_id){

    $stmt = $pdo->prepare("UPDATE `setting` SET `bot` = 'off' LIMIT 1");
    $stmt->execute();

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ ربات با موفقیت خاموش شد",
        'parse_mode' => "HTML",
    ]);
}

function kasrAdmin($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'kasr_admin' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function ad_admin($pdo,$chat_id,$reply_kb_options_back){
    
    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 ایدی عددی کاربر را ارسال کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'add_admin' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function key_hmgani($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 پیام خود را بنویسید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'key_hmgani' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function key_forvard($pdo,$chat_id,$reply_kb_options_back){

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 پیام خود را فوروارد کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'key_forvard' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);
}

function statistics($pdo,$chat_id){

    $stmt = $pdo->query("SELECT COUNT(*) AS total_users FROM `users`");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_users = $result['total_users'] ?? 0;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 تعداد کل کاربران : $total_users",
        'parse_mode'=>"HTML",
                ]);
}



function panel($chat_id,$reply_kb_options_panel){


    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "📝 به پنل مدیریت خوش امدید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
}
switch($text) {
 
    case $back              : back($pdo,$chat_id,$reply_markup);                 break;      
    case '/start'           : show_menu($chat_id,$reply_markup,$start);          break;  
    

}

function idpay_pay_end($pdo,$chat_id,$text,$message_id,$web){

if (is_numeric($text)){

if ($text >= 5000){

bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "💳 درگاه پرداخت ساخته شد

✅ بعد پرداخت موجودی خودکار واریز میشود",
                'reply_to_message_id' => $message_id,
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [['text' => "💳 | پرداخت $text", 'url' => "$web/pay/index.php?amount=$text&id=$chat_id"]],
                    ]
                ]),
            ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

}else {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 مبلغ باید بیشتر 5000 تومان باشد",
        'parse_mode'=>"HTML",
                ]);
}
} else {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 فقط عدد ارسال کنید",
        'parse_mode'=>"HTML",
                ]);
}

}

function pay_ton_end_step($text, $pdo, $chat_id, $reply_markup, $tron_walet) {

    if (!preg_match('/(?:tonviewer\.com|tonscan\.org|ton\.cx)\/(?:transaction|tx)\/([a-fA-F0-9]{64})/', $text, $matches) &&
        !preg_match('/https?:\/\/([a-z0-9\-]+\.)*(tonviewer|tonscan|ton)\.(com|org|cx)\/.*\/([a-fA-F0-9]{64})/', $text, $matches)) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ لطفاً یک لینک معتبر از TON Viewer یا TON Scan ارسال کنید.\nمثال:\nhttps://tonviewer.com/transaction/5f5a3b8f9e2c4d1a8b7c9d6e5f4a3b2c1d8e7f6a5b4c3d2e1f0a9b8c7d6e5f4",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $hash = end($matches);
    if (strlen($hash) != 64) {
        // تلاش برای پیدا کردن هش با پترن دیگر
        if (!preg_match('/([a-fA-F0-9]{64})/', $text, $hash_match)) {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ هش تراکنش نامعتبر است. لطفاً لینک صحیح را ارسال کنید.",
        'parse_mode'=>"HTML",
                ]);
            return false;
        }
        $hash = $hash_match[1];
    }
    
    $stmt = $pdo->prepare("SELECT hash FROM ton_pays WHERE hash = ?");
    $stmt->execute([$hash]);
    if ($stmt->fetch()) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"⚠️ این تراکنش قبلاً ثبت شده است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $api_url = "https://toncenter.com/api/v2/getTransaction?hash=" . $hash;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code != 200 || !$response) {
         bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ خطا در دریافت اطلاعات تراکنش. لطفاً چند دقیقه دیگر تلاش کنید.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $tx_data = json_decode($response, true);
    
    // بررسی وجود تراکنش
    if (!isset($tx_data['ok']) || $tx_data['ok'] !== true || empty($tx_data['result'])) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ تراکنش یافت نشد. لطفاً مطمئن شوید لینک صحیح است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $tx = $tx_data['result'];
    
    $destination_address = '';
    
    // بررسی خروجی‌های تراکنش
    if (isset($tx['out_msgs']) && is_array($tx['out_msgs'])) {
        foreach ($tx['out_msgs'] as $msg) {
            if (isset($msg['destination']) && !empty($msg['destination'])) {
                $destination_address = $msg['destination'];
                break;
            }
        }
    }
    
    if (empty($destination_address) && isset($tx['in_msg']['destination'])) {
        $destination_address = $tx['in_msg']['destination'];
    }
    
    $destination_address = trim(strtolower($destination_address));
    $expected_wallet = trim(strtolower($tron_walet));
    
    if ($destination_address !== $expected_wallet) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ این تراکنش به ولت شما واریز نشده است.\nولت مورد نظر: $tron_walet\nآدرس مقصد تراکنش: $destination_address",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $amount_nano = 0;
    
    if (isset($tx['out_msgs']) && is_array($tx['out_msgs'])) {
        foreach ($tx['out_msgs'] as $msg) {
            if (isset($msg['value']) && $msg['value'] > 0) {
                $amount_nano = $msg['value'];
                break;
            }
        }
    }
    
    if ($amount_nano == 0 && isset($tx['in_msg']['value'])) {
        $amount_nano = $tx['in_msg']['value'];
    }
    
    $amount_ton = $amount_nano / 1e9;
    
    if ($amount_ton <= 0) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ مبلغ تراکنش صفر یا نامعتبر است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $stmt = $pdo->query("SELECT MAX(CAST(id AS UNSIGNED)) as max_id FROM ton_pays");
    $max_id = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
    $new_id = $max_id ? $max_id + 1 : 1;
    
    $time = time();
    $date = date("Y-m-d H:i:s");
    $result = "completed";
    
    $insert = $pdo->prepare("INSERT INTO ton_pays (id, user, tron, hash, time, date, result) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->execute([$new_id, $chat_id, $amount_ton, $hash, $time, $date, $result]);
    
    $message = "✅ پرداخت شما با موفقیت تأیید شد!\n\n";
    $message .= "💰 مبلغ: " . number_format($amount_ton, 9) . " TON\n";
    $message .= "🆔 شماره تراکنش: $new_id\n";
    $message .= "🔗 هش تراکنش: <code>$hash</code>\n";
    $message .= "📅 تاریخ: $date\n\n";
    $message .= "✅ تراکنش شما با موفقیت ثبت شد.";
    
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"$message",
        'parse_mode'=>"HTML",
                ]);
    
    return true;
}

function pay_tron_end_step($text, $pdo, $chat_id, $reply_markup, $tron_walet) {
    if (!preg_match('/tronscan\.org\/#\/transaction\/([a-fA-F0-9]{64})/', $text, $matches)) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ لطفاً یک لینک معتبر از ترون اسکن (Tronscan) ارسال کنید.\nمثال:\nhttps://tronscan.org/#/transaction/eb60adfccf98b9970163fa1e971ba9df0e549b181f732e2930a8c458fc2c7281",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $hash = $matches[1]; 
    
    $stmt = $pdo->prepare("SELECT hash FROM tron_pays WHERE hash = ?");
    $stmt->execute([$hash]);
    if ($stmt->fetch()) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"⚠️ این تراکنش قبلاً ثبت شده است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $api_url = "https://api.trongrid.io/v1/transactions/" . $hash;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code != 200 || !$response) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ خطا در دریافت اطلاعات تراکنش. لطفاً چند دقیقه دیگر تلاش کنید.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $tx_data = json_decode($response, true);
    if (!isset($tx_data['data'][0])) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ تراکنش یافت نشد. لطفاً مطمئن شوید لینک صحیح است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $tx = $tx_data['data'][0];
    
    $to_address_hex = $tx['raw_data']['contract'][0]['parameter']['value']['to_address'] ?? '';
    
    function convertBase58ToHex($base58_address) {
        $url = "https://api.trongrid.io/v1/accounts/" . $base58_address;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response, true);
        return $data['data'][0]['address'] ?? '';
    }
    
    $expected_hex = convertBase58ToHex($tron_walet);
    
    if (!$expected_hex) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ خطا در بررسی ولت مقصد. لطفاً بعداً تلاش کنید.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    if ($to_address_hex !== $expected_hex) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ این تراکنش به ولت شما واریز نشده است.\nولت مورد نظر: $tron_walet",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $amount_sun = $tx['raw_data']['contract'][0]['parameter']['value']['amount'] ?? 0;
    $amount_trx = $amount_sun / 1e6;
    
    if ($amount_trx <= 0) {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ مبلغ تراکنش صفر یا نامعتبر است.",
        'parse_mode'=>"HTML",
                ]);
        return false;
    }
    
    $stmt = $pdo->query("SELECT MAX(CAST(id AS UNSIGNED)) as max_id FROM tron_pays");
    $max_id = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];
    $new_id = $max_id ? $max_id + 1 : 1;
    
    $time = time();
    $date = date("Y-m-d H:i:s");
    $result = "completed";
    
    $insert = $pdo->prepare("INSERT INTO `tron_pays` (`id`, `user`, `tron`, `hash`, `time`, `date`, result) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->execute([$new_id, $chat_id, $amount_trx, $hash, $time, $date, $result]);
    
    $message = "✅ پرداخت شما با موفقیت تأیید شد!\n\n";
    $message .= "💰 مبلغ: " . number_format($amount_trx, 6) . " TRX\n";
    $message .= "🆔 شماره تراکنش: $new_id\n";
    $message .= "🔗 هش تراکنش: <code>$hash</code>\n";
    $message .= "📅 تاریخ: $date\n\n";
    $message .= "✅ تراکنش شما ثبت شد.";
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"$message",
        'parse_mode'=>"HTML",
                ]);
    
    return true;
}

function cartTocart_end($pdo,$chat_id,$reply_markup,$file_id1,$admin){

if (isset($file_id1)){

bot('sendPhoto', [
                'chat_id' => $admin,
                'photo' => $file_id1,
                'caption' =>
                    "رسید واریزی کاربر : $chat_id" .
                    "🔢 لطفا برا افزایش موجودی از پنل مدیریت استفاده کنید",
                'parse_mode' => "HTML"
            ]);

            bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ رسید با موفقیت برا ادمین ارسال شد",
        'parse_mode' => "HTML",
        'reply_markup' => $reply_markup,
    ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);


}else {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"لطفا فقط تصویر ارسال کنید",
        'parse_mode'=>"HTML",
                ]);
}

}
if ($text != $back){
switch($step) {
 
    case "support"          : support_step($text,$pdo,$chat_id,$reply_markup,$message_id,$admin);              break;  
    case 'key_hmgani'       : key_hmgani_send($text,$pdo,$chat_id,$reply_kb_options_panel);                    break;
    case 'key_forvard'      : key_forvard_send($text,$pdo,$chat_id,$reply_kb_options_panel,$message_id);       break;     
    case 'suppprt_result'   : suppprt_result_send($text,$pdo,$chat_id,$reply_kb_options_panel);                break;     
    case 'add_admin'        : add_admin_send($text,$pdo,$chat_id,$reply_kb_options_panel);                     break;
    case 'kasr_admin'       : kasr_admin_send($text,$pdo,$chat_id,$reply_kb_options_panel);                    break;
    case 'add_coin'         : addCoin_send($text,$pdo,$chat_id,$reply_kb_options_panel);                       break;
    case 'kasr_coin'        : kasrCoin_send($text,$pdo,$chat_id,$reply_kb_options_panel);                      break;
    case 'unban_user'       : unbanUser_send($text,$pdo,$chat_id,$reply_kb_options_panel);                     break;
    case 'ban_user'         : banUser_send($text,$pdo,$chat_id,$reply_kb_options_panel);                       break;
    case 'check_user'       : check_user_send($text,$pdo,$chat_id,$reply_kb_options_panel);                    break;
    case 'start_text_set'    : start_text_set_send($text,$pdo,$chat_id,$reply_kb_options_panel);               break;
    case 'help_text_help'    : help_text_help_send($text,$pdo,$chat_id,$reply_kb_options_panel);               break;
    case 'rule_text_rules'   : rule_text_rules_send($text,$pdo,$chat_id,$reply_kb_options_panel);              break;
    case "removorginal"      : removorginal_end($text,$pdo,$chat_id,$reply_kb_options_panel);                  break;                                                          
    case "removesecend"      : removesecend_end($text,$pdo,$chat_id,$reply_kb_options_panel);                  break;   
    case "addsecend_service" : addsecend_service_end($text,$pdo,$chat_id,$reply_kb_options_panel,$date,$time);                                                       break; 
    case "addorginal_service": addorginal_service_end($text,$pdo,$chat_id,$reply_kb_options_panel,$date,$time);                                                      break;
    case "idpay_pay"         : idpay_pay_end($pdo,$chat_id,$text,$message_id,$web);                            break;
    case "pay_ton_end"       : pay_ton_end_step($text,$pdo,$chat_id,$reply_markup,$$tron_walet);               break;
    case "pay_tron_end"      : pay_tron_end_step($text,$pdo,$chat_id,$reply_markup,$tron_walet);               break;
    case "cartTocart"        : cartTocart_end($pdo,$chat_id,$reply_markup,$file_id1,$admin);                   break;
}}

function PStars($pdo,$chat_id,$text,$coinuser,$reply_kb_options_back,$sell,$idopbject_step){

if ($sell){
try {
    $sql2users = "SELECT * FROM `ProductsF` WHERE `id` = $idopbject_step";
    $stmtUsers = $pdo->query($sql2users);
    $resusers  = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ این سرویس وجود ندارد",
            'parse_mode' => "HTML"
        ]);
    }else{
    $name                = $resusers['name'];
    $Description         = $resusers['Description'];
    $time                = $resusers['time'];
    $date                = $resusers['date'];
    $price               = $resusers['price'];
    $ProductsA           = $resusers['ProductsA'];
    $Fragment            = $resusers['Fragment'];
    $number              = $resusers['number'];
    $startsorpermium     = $resusers['startsorpermium'];

    if ($coinuser >= $price){

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "شماره اکانت را وارد کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'PStarsEnd,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    


    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ موجودی شما کافی نیست",
            'parse_mode' => "HTML"
        ]);
    }
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}
}

}

function PPermium($pdo,$chat_id,$text,$coinuser,$reply_kb_options_back,$sell,$idopbject_step){
if ($sell){
try {
    $sql2users = "SELECT * FROM `ProductsF` WHERE `id` = $idopbject_step";
    $stmtUsers = $pdo->query($sql2users);
    $resusers  = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ این سرویس وجود ندارد",
            'parse_mode' => "HTML"
        ]);
    }else{
    $name                = $resusers['name'];
    $Description         = $resusers['Description'];
    $time                = $resusers['time'];
    $date                = $resusers['date'];
    $price               = $resusers['price'];
    $ProductsA           = $resusers['ProductsA'];
    $Fragment            = $resusers['Fragment'];
    $number              = $resusers['number'];
    $startsorpermium     = $resusers['startsorpermium'];

    if ($coinuser >= $price){

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "شماره اکانت را وارد کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'PPermiumEnd,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    


    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ موجودی شما کافی نیست",
            'parse_mode' => "HTML"
        ]);
    }
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}
}
}

function PStarsEnd($chat_id,$pdo,$reply_markup,$text,$idopbject_step,$coinuser,$admin,$date,$time){

try {
    $sql2users = "SELECT * FROM `ProductsF` WHERE `id` = $idopbject_step";
    $stmtUsers = $pdo->query($sql2users);
    $resusers  = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ این سرویس وجود ندارد",
            'parse_mode' => "HTML"
        ]);
    }else{
    $name                = $resusers['name'];
    $Description         = $resusers['Description'];
    $time                = $resusers['time'];
    $date                = $resusers['date'];
    $price               = $resusers['price'];
    $ProductsA           = $resusers['ProductsA'];
    $Fragment            = $resusers['Fragment'];
    $number              = $resusers['number'];
    $startsorpermium     = $resusers['startsorpermium'];

    if ($coinuser >= $price){

    if (!is_numeric($text)){

    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ فقط عدد وارد کنید",
            'parse_mode' => "HTML"
        ]);

    exit;

    }
        
    $uid = uniqid();

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "سفارش شما ثبت شد",
        'parse_mode' => "HTML",
        'reply_markup' => $reply_markup,
    ]);

    bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"✔️ - یک سفارش ثبت شد 

⬅️ شماره : $text

🔰 سرویس : $name

🌐تعداد : $number",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"✔️ تایید کردن",'callback_data'=>"Compile,$uid"]],
                [['text'=>"✖️ رد کردن",'callback_data'=>"notCompile,$uid"]],
            ]
        ])
    ]);


    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    $EndCoin = $coinuser - $price;

    $stmt = $pdo->prepare("UPDATE `users` SET `coin` = '$EndCoin' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    $sqlInsert = "INSERT INTO `Orders` (`id`, `products_id`, `user`, `user_id`, `time`, `date`, `price`.`result`) VALUES ('$uid', '$idopbject_step', '$$chat_id', '$text', '$time', '$date', '$price','Incomplete')";
    $stmtInsert = $pdo->prepare($sqlInsert);
    $stmtInsert->execute();
    


    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ موجودی شما کافی نیست",
            'parse_mode' => "HTML"
        ]);
    }
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}
}

function PPermiumEnd($chat_id,$pdo,$reply_markup,$text,$idopbject_step,$coinuser,$admin,$date,$time){

try {
    $sql2users = "SELECT * FROM `ProductsF` WHERE `id` = $idopbject_step";
    $stmtUsers = $pdo->query($sql2users);
    $resusers  = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ این سرویس وجود ندارد",
            'parse_mode' => "HTML"
        ]);
    }else{
    $name                = $resusers['name'];
    $Description         = $resusers['Description'];
    $time                = $resusers['time'];
    $date                = $resusers['date'];
    $price               = $resusers['price'];
    $ProductsA           = $resusers['ProductsA'];
    $Fragment            = $resusers['Fragment'];
    $number              = $resusers['number'];
    $startsorpermium     = $resusers['startsorpermium'];

    if ($coinuser >= $price){

    if (!is_numeric($text)){

    bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ فقط عدد وارد کنید",
            'parse_mode' => "HTML"
        ]);

    exit;

    }
        
    $uid = uniqid();

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "سفارش شما ثبت شد",
        'parse_mode' => "HTML",
        'reply_markup' => $reply_markup,
    ]);

    bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"✔️ - یک سفارش ثبت شد 

⬅️ شماره : $text

🔰 سرویس : $name

🌐تعداد : $number",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"✔️ تایید کردن",'callback_data'=>"Compile,$uid"]],
                [['text'=>"✖️ رد کردن",'callback_data'=>"notCompile,$uid"]],
            ]
        ])
    ]);


    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    $EndCoin = $coinuser - $price;

    $stmt = $pdo->prepare("UPDATE `users` SET `coin` = '$EndCoin' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    $sqlInsert = "INSERT INTO `Orders` (`id`, `products_id`, `user`, `user_id`, `time`, `date`, `price`, `result`) VALUES ('$uid', '$idopbject_step', '$chat_id', '$text', '$time', '$date', '$price', 'Incomplete')";      
    $stmtInsert = $pdo->prepare($sqlInsert);
    $stmtInsert->execute();
    


    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ موجودی شما کافی نیست",
            'parse_mode' => "HTML"
        ]);
    }
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}
}

$textـsteps = explode(",", $step, 2); 
    $object_step = $textـsteps[0];
    $idopbject_step = $textـsteps[1];

if ($text != $back){
switch($object_step) {

    case "addorginalDes" : addorginalDes($pdo,$chat_id,$idopbject_step,$reply_kb_options_panel,$text); break;
    case "addsecendlDes" : addsecendlDes($pdo,$chat_id,$idopbject_step,$text); break;
    case "addsecendlOrg" : addsecendlOrg($pdo,$chat_id,$idopbject_step,$text); break;
    case "addsecendlp_o_s" : addsecendlp_o_s($pdo,$chat_id,$idopbject_step,$text); break;
    case "addsecendl_num_p" : addsecendl_num_p($pdo,$chat_id,$idopbject_step,$text,$reply_kb_options_panel); break;
    case "addsecendl_num_s" : addsecendl_num_s($pdo,$chat_id,$idopbject_step,$text,$reply_kb_options_panel); break;
    case "PStars"           : PStars($pdo,$chat_id,$text,$coinuser,$reply_kb_options_back,$sell,$idopbject_step); break;
    case "PPermium"         : PPermium($pdo,$chat_id,$text,$coinuser,$reply_kb_options_back,$sell,$idopbject_step); break;
    case "PStarsEnd"        : PStarsEnd($chat_id,$pdo,$reply_markup,$text,$idopbject_step,$coinuser,$admin,$date,$time); break;
    case "PPermiumEnd"      : PPermiumEnd($chat_id,$pdo,$reply_markup,$text,$idopbject_step,$coinuser,$admin,$date,$time); break;
 

}}

function servislist_data_pay($pdo, $chat_id, $idopbject_data, $sell) {

    if ($sell == "on") {
        try {
            $sqlCheck = "SELECT `name` FROM `ProductsA` WHERE `id` = :id";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([':id' => $idopbject_data]);
            $exists = $stmtCheck->fetch(PDO::FETCH_ASSOC);
            
            if (!$exists) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "❌ دسته‌بندی مورد نظر یافت نشد!",
                    'parse_mode' => "HTML"
                ]);
                return;
            }
            $exists1 = $exists['name'];
            
            $sqlServices = "SELECT `name`, `id` FROM `ProductsF` WHERE `ProductsA` = :products_a";
            $stmtServices = $pdo->prepare($sqlServices);
            $stmtServices->execute([':products_a' => $exists1]);
            $services = $stmtServices->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($services)) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "❌ هیچ سرویسی در این دسته‌بندی یافت نشد $services!",
                    'parse_mode' => "HTML"
                ]);
                return;
            }
            
            $keyboard = [];
            $row = [];
            
            foreach ($services as $index => $service) {
                $row[] = [
                    'text' => $service['name'],
                    'callback_data' => "buy," . $service['id']
                ];
                
                if (count($row) == 2 || $index == count($services) - 1) {
                    $keyboard[] = $row;
                    $row = []; 
                }
            }
            
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "📋 لیست سرویس‌های موجود:",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboard
                ]),
                'parse_mode' => "HTML"
            ]);
            
        } catch (PDOException $e) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "❌ خطای دیتابیس: " . $e->getMessage(),
                'parse_mode' => "HTML"
            ]);
        } catch (Exception $e) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "❌ خطا: " . $e->getMessage(),
                'parse_mode' => "HTML"
            ]);
        }
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ فروش محصولات بسته شده است",
            'parse_mode' => "HTML"
        ]);
    }
}

function servislist_data_pay_f($pdo,$chat_id,$idopbject_data,$sell,$reply_markup,$coinuser,$reply_kb_options_back){

if ($sell){
try {
    $sql2users = "SELECT * FROM `ProductsF` WHERE `id` = $idopbject_data";
    $stmtUsers = $pdo->query($sql2users);
    $resusers  = $stmtUsers->fetch(PDO::FETCH_ASSOC);

    if (!$resusers) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ این سرویس وجود ندارد",
            'parse_mode' => "HTML"
        ]);
    }else{
    $name                = $resusers['name'];
    $Description         = $resusers['Description'];
    $time                = $resusers['time'];
    $date                = $resusers['date'];
    $price               = $resusers['price'];
    $ProductsA           = $resusers['ProductsA'];
    $Fragment            = $resusers['Fragment'];
    $number              = $resusers['number'];
    $startsorpermium     = $resusers['startsorpermium'];

    if ($coinuser >= $price){

    if ($startsorpermium == "stars"){

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "شماره اکانت را وارد کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'PStars,$idopbject_data' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    }

    if ($startsorpermium == "permium"){


    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "شماره اکانت را وارد کنید",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'PPermium,$idopbject_data' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    }


    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ موجودی شما کافی نیست",
            'parse_mode' => "HTML"
        ]);
    }
    }

    

} catch (PDOException $e) {
    die("خطای دیتابیس هنگام گرفتن اطلاعات users: " . $e->getMessage());
} catch (Exception $e) {
    die("خطا: " . $e->getMessage());
}
}
}

function Compile($pdo, $chat_id, $idopbject_data, $message_id2, $callback_query_id = null) {

    try {
        $sql2users = "SELECT * FROM `Orders` WHERE `id` = :id";
        $stmtUsers = $pdo->prepare($sql2users);
        $stmtUsers->execute([':id' => $idopbject_data]);
        $resusers = $stmtUsers->fetch(PDO::FETCH_ASSOC);

        if (!$resusers) {
            if ($callback_query_id) {
                bot('answerCallbackQuery', [
                    'callback_query_id' => $callback_query_id,
                    'text' => "❌ سفارش یافت نشد!",
                    'show_alert' => true
                ]);
            }
            
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "❌ این سفارش وجود ندارد",
                'parse_mode' => "HTML"
            ]);
            return;
        }
        
        $products_id = $resusers['products_id'];
        $user = $resusers['user'];
        $user_id = $resusers['user_id'];
        $time = $resusers['time'];
        $date = $resusers['date'];
        $price = $resusers['price'];
        $result = $resusers['result'];

        if ($result == 'compile') {
            bot('answerCallbackQuery', [
                'callback_query_id' => $callback_query_id,
                'text' => "❌ این سفارش قبلاً تایید شده است!",
                'show_alert' => true
            ]);
            return;
        }

        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "✅ سفارش با موفقیت تایید شد!\n\n📝 سفارش: $products_id\n👤 کاربر: $user\n💰 قیمت: $price",
            'parse_mode' => "HTML",
        ]);

        bot('sendMessage', [
            'chat_id' => $user,
            'text' => "✅ سفارش شما توسط ادمین تایید شد!\n\n🆔 شماره سفارش: $idopbject_data\n📅 تاریخ: $date\n⏰ زمان: $time",
            'parse_mode' => "HTML",
        ]);

        $stmt = $pdo->prepare("UPDATE `Orders` SET `result` = 'compile' WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $idopbject_data]);

        // پاسخ به callback query
        if ($callback_query_id) {
            bot('answerCallbackQuery', [
                'callback_query_id' => $callback_query_id,
                'text' => "✅ سفارش تایید شد!",
                'show_alert' => false
            ]);
        }

    } catch (PDOException $e) {
        error_log("Database Error in Compile: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطای دیتابیس رخ داد",
            'parse_mode' => "HTML"
        ]);
    } catch (Exception $e) {
        error_log("General Error in Compile: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطا: " . $e->getMessage(),
            'parse_mode' => "HTML"
        ]);
    }
}

function notCompile($pdo, $chat_id, $idopbject_data, $message_id2, $coinuser, $callback_query_id = null) {
    try {
        $sql2users = "SELECT * FROM `Orders` WHERE `id` = :id";
        $stmtUsers = $pdo->prepare($sql2users);
        $stmtUsers->execute([':id' => $idopbject_data]);
        $resusers = $stmtUsers->fetch(PDO::FETCH_ASSOC);

        if (!$resusers) {
            if ($callback_query_id) {
                bot('answerCallbackQuery', [
                    'callback_query_id' => $callback_query_id,
                    'text' => "❌ سفارش یافت نشد!",
                    'show_alert' => true
                ]);
            }
            
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "❌ این سفارش وجود ندارد",
                'parse_mode' => "HTML"
            ]);
            return;
        }
        
        $products_id = $resusers['products_id'];
        $user = $resusers['user'];
        $user_id = $resusers['user_id'];
        $time = $resusers['time'];
        $date = $resusers['date'];
        $price = $resusers['price'];
        $result = $resusers['result'];

        if ($result == 'compile') {
            bot('answerCallbackQuery', [
                'callback_query_id' => $callback_query_id,
                'text' => "❌ این سفارش قبلاً تایید شده است!",
                'show_alert' => true
            ]);
            return;
        }
        
        if ($result == 'NotCompile') {
            bot('answerCallbackQuery', [
                'callback_query_id' => $callback_query_id,
                'text' => "❌ این سفارش قبلاً رد شده است!",
                'show_alert' => true
            ]);
            return;
        }

        $newCoin = $coinuser + $price;

        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "❌ سفارش رد شد!\n\n📝 سفارش: $products_id\n👤 کاربر: $user\n💰 قیمت: $price\n💎 بازگشت موجودی: $price",
            'parse_mode' => "HTML",
        ]);

        bot('sendMessage', [
            'chat_id' => $user,
            'text' => "❌ متأسفانه سفارش شما توسط ادمین رد شد.\n\n🆔 شماره سفارش: $idopbject_data\n💰 مبلغ بازگشتی: $price\n📅 تاریخ: $date\n⏰ زمان: $time\n\nدر صورت نیاز با پشتیبانی تماس بگیرید.",
            'parse_mode' => "HTML",
        ]);

        $stmt = $pdo->prepare("UPDATE `Orders` SET `result` = 'NotCompile' WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $idopbject_data]);

        $stmt = $pdo->prepare("UPDATE `users` SET `coin` = :coin WHERE id = :id LIMIT 1");
        $stmt->execute([
            ':coin' => $newCoin,
            ':id' => $user  
        ]);

        if ($callback_query_id) {
            bot('answerCallbackQuery', [
                'callback_query_id' => $callback_query_id,
                'text' => "✅ سفارش با موفقیت رد شد!",
                'show_alert' => false
            ]);
        }

    } catch (PDOException $e) {
        error_log("Database Error in notCompile: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطای دیتابیس رخ داد",
            'parse_mode' => "HTML"
        ]);
    } catch (Exception $e) {
        error_log("General Error in notCompile: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطا: " . $e->getMessage(),
            'parse_mode' => "HTML"
        ]);
    }
}
$textـdata = explode(",", $data, 2); 
    $object_data = $textـdata[0];
    $idopbject_data = $textـdata[1];

    

switch($object_data) {

    case "hello" : servislist_data_pay($pdo,$chat_id,$idopbject_data,$sell); break;
    case "buy"   : servislist_data_pay_f($pdo,$chat_id,$idopbject_data,$sell,$reply_markup,$coinuser,$reply_kb_options_back); break;
    case "Compile" : Compile($pdo,$chat_id,$idopbject_data,$message_id2); break;
    case "notCompile" : notCompile($pdo,$chat_id,$idopbject_data,$message_id2,$coinuser); break;

    
 

}

function addsecendl_num_s($pdo,$chat_id,$idopbject_step,$text,$reply_kb_options_panel){

try {

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "انجام شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `number` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}

}

function addsecendl_num_p($pdo,$chat_id,$idopbject_step,$text,$reply_kb_options_panel){

try {

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "انجام شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `price` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}
}

function addsecendlp_o_s($pdo,$chat_id,$idopbject_step,$text){



if ($text != "permium" && $text != "starts") {

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "فقط کلمه starts یا permium",
        'parse_mode' => "HTML",
    ]);

    exit;

}

if ($text == "permium"){

try {
bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "مبلغ را وارد کنید",
        'parse_mode' => "HTML",
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addsecendl_num_p,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `startsorpermium` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}

} else {

try {
bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "تعداد استارزی که میخواهید را ارسال کنید",
        'parse_mode' => "HTML",
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addsecendl_num_s,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `startsorpermium` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}
}


}

function addsecendlOrg($pdo,$chat_id,$idopbject_step,$text){

try {

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ اگر میخواهید این سرویس پرمیوم یا استارز باشید کلمه permium یا starts هد کدام که میخواهید را اسال کنید",
        'parse_mode' => "HTML",
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addsecendlp_o_s,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `ProductsA` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}
}

function addsecendlDes($pdo,$chat_id,$idopbject_step,$text){

try {

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ نام سرویس اصلی که میخواید زیر مجموعش بشه این سرویس را وارد کنید",
        'parse_mode' => "HTML",
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addsecendlOrg,$idopbject_step' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsF` SET `Description` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}

}

function addorginalDes($pdo,$chat_id,$idopbject_step,$reply_kb_options_panel,$text){

try {
bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ سرویس با موفقیت اضافه شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
    $stmt = $pdo->prepare("UPDATE `ProductsA` SET `Description` = '$text' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $idopbject_step]);
    
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داده است دوباره تلاش کنید",
        'parse_mode' => "HTML",
    ]);
}
}

function addorginal_service_end($text,$pdo,$chat_id,$reply_kb_options_panel,$date,$time){

try {
    $number = rand(1000000, 9999999);

$sqlInsert = "INSERT INTO `ProductsA` (`id`,`name`,`Description`,`time`,`date`) VALUES ('$number', '$text', 'on', '$time', '$date')";
$stmtInsert = $pdo->prepare($sqlInsert);
$stmtInsert->execute();

$stmt = $pdo->prepare("UPDATE `users` SET `step` = 'addorginalDes,$number' WHERE id = :id LIMIT 1");
$stmt->execute([':id' => $chat_id]);

bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "توضیحات سرویس را ارسال کنید",
        'parse_mode' => "HTML",
    ]);


} catch (\Throwable $th) {
   bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
}



}

function addsecend_service_end($text, $pdo, $chat_id, $reply_kb_options_panel, $date, $time)
{
    if (empty($text) || empty($chat_id)) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطا: اطلاعات معتبر نیست",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_panel),
        ]);
        return;
    }

    try {
        do {
            $number = rand(1000000, 9999999);
            $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM `ProductsF` WHERE `id` = :id");
            $checkStmt->execute([':id' => $number]);
            $exists = $checkStmt->fetchColumn();
        } while ($exists > 0);

        $sqlInsert = "INSERT INTO `ProductsF` (`id`, `name`, `Description`, `time`, `date`, `price`, `ProductsA`, `Fragment`, `number`, `startsorpermium`) 
                      VALUES (:id, :name, 'on', :time, :date, 'none', 'none', 'none', 'none', 'none')";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([
            ':id' => $number,
            ':name' => $text,
            ':time' => $time,
            ':date' => $date
        ]);

        $step_value = "addsecendlDes," . $number;
        $stmt = $pdo->prepare("UPDATE `users` SET `step` = :step WHERE id = :id LIMIT 1");
        $stmt->execute([
            ':step' => $step_value,
            ':id' => $chat_id
        ]);

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "✅ سرویس با موفقیت ایجاد شد!\n\n📝 حالا توضیحات سرویس را ارسال کنید:",
            'parse_mode' => "HTML",
        ]);

    } catch (PDOException $e) {
        error_log("Database Error in addsecend_service_end: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطای دیتابیس: " . $e->getMessage(),
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_panel),
        ]);
        
        try {
            $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $chat_id]);
        } catch (Exception $e) {
            error_log("Error resetting step: " . $e->getMessage());
        }
        
    } catch (Exception $e) {
        error_log("General Error in addsecend_service_end: " . $e->getMessage());
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ خطایی رخ داد: " . $e->getMessage(),
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_panel),
        ]);
        
        try {
            $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $chat_id]);
        } catch (Exception $e) {
            error_log("Error resetting step: " . $e->getMessage());
        }
    }
}

function removesecend_end($text,$pdo,$chat_id,$reply_kb_options_panel){

try {
    $stmt = $pdo->prepare("DELETE FROM `ProductsF` WHERE `name` = :id");
    $stmt->execute([':id' => $text]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ سرویس با موفقیت حذف شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داد",
        'parse_mode' => "HTML",
    ]);
}



}

function removorginal_end($text,$pdo,$chat_id,$reply_kb_options_panel){
try {
    $stmt = $pdo->prepare("DELETE FROM `ProductsA` WHERE `name` = :id");
    $stmt->execute([':id' => $text]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ سرویس با موفقیت حذف شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
} catch (\Throwable $th) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "خطای رخ داد",
        'parse_mode' => "HTML",
    ]);
}

}

function rule_text_rules_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $stmt = $pdo->prepare("UPDATE `texts` SET `ruls` = :ruls");
    $stmt->execute([':ruls' => $text]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ متن قوانین با موفقیت تنظیم شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
}

function help_text_help_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $stmt = $pdo->prepare("UPDATE `texts` SET `help` = :help");
    $stmt->execute([':help' => $text]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ متن راهنما با موفقیت تنظیم شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
}

function start_text_set_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $stmt = $pdo->prepare("UPDATE `texts` SET `start` = :start");
    $stmt->execute([':start' => $text]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ متن استارت با موفقیت تنظیم شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);
}

function check_user_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $user_id = trim($text);

    $stmt = $pdo->prepare("SELECT `id`, `account`, `coin`, `date` FROM `users` WHERE `id` = :id");
    $stmt->execute([':id' => $user_id]);
    $res_user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($res_user) {
        $account_status = $res_user['account'] == 'ban' ? 'بن شده' : 'فعال';
        $coin = $res_user['coin'] ?? '0';
        $date = $res_user['date'] ?? 'نامشخص';

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "👤 اطلاعات کاربر:\n\n🆔 ایدی: {$res_user['id']}\n📅 تاریخ عضویت: {$date}\n💰 موجودی: {$coin}\n⚠️ وضعیت حساب: {$account_status}",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_panel),
        ]);
        $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $chat_id]);

    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ کاربری با این ایدی یافت نشد.",
            'parse_mode' => "HTML",
            'reply_markup' => json_encode($reply_kb_options_panel),
        ]);
        $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $chat_id]);

    }
}

function banUser_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $user_id = trim($text);

    $stmt = $pdo->prepare("UPDATE `users` SET `account` = 'ban' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $user_id]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ کاربر با موفقیت بن شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    
}

function unbanUser_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $user_id = trim($text);

    $stmt = $pdo->prepare("UPDATE `users` SET `account` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $user_id]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ کاربر با موفقیت از بن خارج شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    
}

function kasrCoin_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $text_admin = explode(",", $text, 2); 
    $user_id = trim($text_admin[0]);
    $amount = trim($text_admin[1]);
    $stmt = $pdo->prepare("SELECT `coin` FROM `users` WHERE `id` = :id");
    $stmt->execute([':id' => $user_id]);
    $res_coin = $stmt->fetch(PDO::FETCH_ASSOC);
    $current_coin = $res_coin['coin'] ?? '0';
    $new_coin = max(0, (int)$current_coin - (int)$amount);
    $stmt = $pdo->prepare("UPDATE `users` SET `coin` = :coin WHERE `id` = :id");
    $stmt->execute([':coin' => (string)$new_coin, ':id' => $user_id]);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ موجودی کاربر با موفقیت کاهش یافت",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);


}

function addCoin_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $text_admin = explode(",", $text, 2); 
    $user_id = trim($text_admin[0]);
    $amount = trim($text_admin[1]);

    $stmt = $pdo->prepare("SELECT `coin` FROM `users` WHERE `id` = :id");
    $stmt->execute([':id' => $user_id]);
    $res_coin = $stmt->fetch(PDO::FETCH_ASSOC);
    $current_coin = $res_coin['coin'] ?? '0';

    $new_coin = $current_coin + $amount;

    $stmt = $pdo->prepare("UPDATE `users` SET `coin` = :coin WHERE `id` = :id");
    $stmt->execute([':coin' => (string)$new_coin, ':id' => $user_id]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ موجودی کاربر با موفقیت افزایش یافت",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
}

function kasr_admin_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $user_id = trim($text);

    $stmt = $pdo->prepare("DELETE FROM `admin` WHERE `id` = :id");
    $stmt->execute([':id' => $user_id]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ کاربر با موفقیت از ادمین حذف شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    
}

function add_admin_send($text,$pdo,$chat_id,$reply_kb_options_panel){

    $user_id = trim($text);

    $stmt = $pdo->prepare("INSERT INTO `admin` (`id`) VALUES (:id)");
    $stmt->execute([':id' => $user_id]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ کاربر با موفقیت به عنوان ادمین اضافه شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    $stmt = $pdo->prepare("UPDATE `users` SET `step` = 'none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    
}

function suppprt_result($pdo,$chat_id,$reply_kb_options_back){

$stmt = $pdo->prepare("UPDATE `users` SET `step` = 'suppprt_result' WHERE id = :chat_id LIMIT 1");
    $stmt->execute(['chat_id' => $chat_id]);

    bot('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "👤 کاربری که میخای براش پیام بفرستی پیام را به صورت زیر بنویس\nid,message",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_back),
    ]);
    
}

function suppprt_result_send($text,$pdo,$chat_id,$reply_kb_options_panel){

$stmt = $pdo->prepare("UPDATE `users` SET `step`='none' WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $chat_id]);

    $text_admin = explode(",", $text, 2); 
    $user_id = trim($text_admin[0]);
    $msg = trim($text_admin[1]);

    bot('sendMessage', [
        'chat_id' => $user_id,
        'text' => "👨‍💻 یک پیام از طرف مدیریت براتون امد

📝 : $msg",
    ]);

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ انجام شد",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
    
}

function key_forvard_send($text,$pdo,$chat_id,$reply_kb_options_panel,$message_id){

$stmt = $pdo->prepare("UPDATE `users` SET `step`='none' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute([':chat_id' => $chat_id]);

    $stmt = $pdo->query("SELECT `id` FROM `users`");
    while ($row = $stmt->fetch()) {
        bot('ForwardMessage', [
            'chat_id' => $row['id'],
            'from_chat_id' => $chat_id,
            'message_id' => $message_id,
        ]);
    }

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ انجام شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
}

function key_hmgani_send($text,$pdo,$chat_id,$reply_kb_options_panel){
$stmt = $pdo->prepare("UPDATE `users` SET `step`='none' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute([':chat_id' => $chat_id]);

    $stmt = $pdo->query("SELECT `id` FROM `users`");
    while ($row = $stmt->fetch()) {
        bot('sendMessage', [
            'chat_id' => $row['id'],
            'text' => "$text",
            'parse_mode' => "HTML",
        ]);
    }

    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "✅ انجام شد",
        'parse_mode' => "HTML",
        'reply_markup' => json_encode($reply_kb_options_panel),
    ]);
}
function show_menu($chat_id,$reply_markup,$start){


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"$start",
        'parse_mode'=>"HTML",
        'reply_markup'=>$reply_markup
                ]);
}

function back($pdo,$chat_id,$reply_markup){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"شما به منوی اصلی برگشتید",
        'parse_mode'=>"HTML",
        'reply_markup'=>$reply_markup
                ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step`='none' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute([':chat_id' => $chat_id]);

}

function servislist_data($sell, $pdo, $chat_id) {
    if ($sell == "on") {
        try {
            $sqlServices = "SELECT `name`, `id` FROM `ProductsA`";
            $stmtServices = $pdo->query($sqlServices);
            $services = $stmtServices->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($services)) {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "❌ هیچ سرویسی یافت نشد!",
                    'parse_mode' => "HTML"
                ]);
                return;
            }
            
            $keyboard = [];
            $row = [];
            
            foreach ($services as $index => $service) {
                $row[] = [
                    'text' => $service['name'],
                    'callback_data' => "hello," . $service['id']
                ];
                
                if (count($row) == 2 || $index == count($services) - 1) {
                    $keyboard[] = $row;
                    $row = []; 
                }
            }
            
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "📋 لیست سرویس‌های موجود:",
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboard
                ]),
                'parse_mode' => "HTML"
            ]);
            
        } catch (PDOException $e) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "خطای دیتابیس: " . $e->getMessage(),
                'parse_mode' => "HTML"
            ]);
        } catch (Exception $e) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "خطا: " . $e->getMessage(),
                'parse_mode' => "HTML"
            ]);
        }
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "❌ فروش محصولات بسته شده است",
            'parse_mode' => "HTML"
        ]);
    }
}

function addCoin_data($chat_id,$idpay,$tron,$sell,$cart,$pay,$ton){

if ($pay == "on"){


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت افزایش موجودی از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"🌐 درگاه پرداخت",'callback_data'=>"idpay_pay"]],
                [['text'=>"💻 ارز دیجیتال",'callback_data'=>"TronOrTon_pay"]],
                [['text'=>"💰 کارت به کارت",'callback_data'=>"cartTocart"]],
            ]
        ])
    ]);


} else {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 افزایش موجودی توسط ادمین بسته شده است",
        'parse_mode'=>"HTML",
                ]);
}

}

function support_step($text,$pdo,$chat_id,$reply_markup,$message_id,$admin){

bot('ForwardMessage', [
            'chat_id' => $admin,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id,
        ]);

bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"👤 پیام از طرف کاربر : $chat_id",
        'parse_mode'=>"HTML",
                ]);

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 پیام شما برای ادمین ارسال شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>$reply_markup
                ]);

    $stmt = $pdo->prepare("UPDATE `users` SET `step`='none' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute([':chat_id' => $chat_id]);



}
function support_data($pdo,$chat_id,$reply_kb_options_back){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 پیام خود را ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back)
                ]);
$stmt = $pdo->prepare("UPDATE `users` SET `step`='support' WHERE `id` = :chat_id LIMIT 1");
    $stmt->execute([':chat_id' => $chat_id]);
}

function rulstext($ruls,$chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"$ruls",
        'parse_mode'=>"HTML",
                ]);
}

function helptext($help,$chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"$help",
        'parse_mode'=>"HTML",
                ]);
}

function helpKey_data($chat_id){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 جهت مشاهده قوانین و راهنما از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    ['text'=>"قوانین",'callback_data'=>"helptext"],
                    ['text'=>"راهنما",'callback_data'=>"rulstext"],
                ],
                ]
                ])
                ]);
}

function account_data($pdo,$chat_id,$timeuser,$numberuser,$coinuser,$accountuser,$dateuser){

bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 اطلاعات کاربر :

👤 ایدی عددی : $chat_id

☎️ شماره کاربر : $numberuser
💰 موجودی : $coinuser

📲 تاریخ ورود به ربات : $timeuser . $dateuser",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    ['text'=>"💸 انتقال موجودی",'callback_data'=>"sendcointouser"],
                ],
                ]
                ])
                ]);

}
?>
