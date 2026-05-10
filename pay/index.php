<?php 

include '../config.php';

//=============== GET ==================
$user   = $_GET['id'];
$amount = $_GET['amount'];

try {

    // گرفتن تنظیمات
    $stmt = $pdo->prepare("SELECT * FROM setting LIMIT 1");
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$res) exit("error");

    $idpay_merchant = $res['idpay_merchant'];

} catch (PDOException $e) {
    die("خطای دیتابیس: " . $e->getMessage());
}


//=============== بررسی وجود کاربر ==================
$stmtUser = $pdo->prepare("SELECT id FROM users WHERE id = :id");
$stmtUser->bindParam(':id', $user, PDO::PARAM_INT);
$stmtUser->execute();

if (!$stmtUser->fetch(PDO::FETCH_ASSOC)) {
    exit("ایدی عددی وارد شده اشتباه است");
}


//=============== پرداخت IDPay ==================

$order_id = time() . rand(1000, 9999);

$params = array(
    'order_id' => $order_id,
    'amount'   => $amount,
    'name'     => 'خریدار',
    'phone'    => '09999999999',
    'mail'     => 'my@site.com',
    'desc'     => 'خرید از ربات',
    'callback' => "$web/pay/back.php?id=$user&amount=$amount&order=$order_id",
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    "X-API-KEY: $idpay_merchant",
    'X-SANDBOX: 1'
));

$response = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);


if ($curl_error) {
    exit("cURL Error: " . $curl_error);
}

$result = json_decode($response, true);


//=============== بررسی نتیجه API ==================

if (!empty($result['error'])) {
    echo "Error Code: " . $result['error']['code'] . "<br>";
    echo "Message: " . $result['error']['message'];
    exit;
}

if ($result['status'] == 1 && !empty($result['id'])) {

    // انتقال صحیح به صفحه پرداخت
    $paymentLink = "https://idpay.ir/p/" . $result['id'];
    header("Location: $paymentLink");
    exit;

} else {
    echo "خطا در ایجاد تراکنش";
}

?>
