<?php

include '../config.php';

try {

    $stmt = $pdo->prepare("SELECT * FROM setting LIMIT 1");
    $stmt->execute();
    $setting = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$setting){
        exit("خطا در دریافت تنظیمات");
    }

    $idpay_merchant = $setting['idpay_merchant'];

} catch (PDOException $e) {
    die("خطای دیتابیس: ".$e->getMessage());
}


//================ دریافت اطلاعات =================

$status   = $_POST['status']   ?? $_GET['status']   ?? null;
$track_id = $_POST['track_id'] ?? $_GET['track_id'] ?? null;
$id       = $_POST['id']       ?? $_GET['id']       ?? null;
$order_id = $_POST['order_id'] ?? $_GET['order_id'] ?? null;
$amount   = $_POST['amount']   ?? $_GET['amount']   ?? null;


//================ بررسی اولیه =================

if(!$id || !$order_id){
    exit("اطلاعات پرداخت ناقص است");
}


//================ اگر پرداخت موفق بود =================

if($status == 10){

    $params = array(
        'id' => $id,
        'order_id' => $order_id
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "X-API-KEY: $idpay_merchant",
        'X-SANDBOX: 1'
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result,true);


    //================ تایید موفق =================

    if(isset($result['status']) && $result['status'] == 100){

        $amount = $result['amount'];

        if(isset($_GET['id'])){

            $user = $_GET['id'];

            $stmt = $pdo->prepare("UPDATE users SET coin = coin + :amount WHERE id = :id");
            $stmt->execute([
                ':amount' => $amount,
                ':id' => $user
            ]);

        }

        echo "✅ پرداخت با موفقیت انجام شد";
        echo "<br>";
        echo "کد رهگیری: ".$result['track_id'];

    }else{

        echo "❌ تایید پرداخت ناموفق بود";

    }

}else{

    echo "❌ پرداخت انجام نشد یا لغو شد";

}
