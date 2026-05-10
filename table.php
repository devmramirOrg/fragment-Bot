<?php
include "config.php";

try {

    // ------- SQL Code -------
    $sql = "
        CREATE TABLE `users` (
            `id` bigint PRIMARY KEY,
            `step` text,
            `time` text,
            `number` text,
            `coin` text,
            `account` text,
            `date` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `setting` (
            `bot` text,
            `ton` text,
            `stars` text,
            `permium` text,
            `tron` text,
            `pay` text,
            `idpay` text,
            `cart` text,
            `sell` text,
            `tron_walet` text,
            `idpay_merchant` text,
            `cart_number` text,
            `Percentage` text,
            `Percentage_result` text,
            `tonwalet` text,
            `fragment` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `ProductsA` (
            `id` bigint PRIMARY KEY,
            `name` text,
            `Description` text,
            `time` text,
            `date` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `ProductsF` (
            `id` bigint PRIMARY KEY,
            `name` text,
            `Description` text,
            `time` text,
            `date` text,
            `price` text,
            `ProductsA` text,
            `Fragment` text,
            `number` text,
            `startsorpermium` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `Orders` (
            `id` text,
            `products_id` text,
            `user` text,
            `user_id` text,
            `time` text,
            `date` text,
            `price` text,
            `result` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `texts` (
            `help` text,
            `ruls` text,
            `start` text
        ) DEFAULT CHARSET=utf8mb4;
        
        CREATE TABLE `code` (
            `code` text,
            `users` text,
            `result` text,
            `time` text,
            `coin` text
        ) DEFAULT CHARSET=utf8mb4;

        CREATE TABLE `trons_pay` (
            `id` text,
            `user` text,
            `tron` text,
            `price_toman` text,
            `walet` text,
            `time` text,
            `date` text,
            `result` text
        ) DEFAULT CHARSET=utf8mb4;

        CREATE TABLE `tron_pays` (
            `id` text,
            `user` text,
            `tron` text,
            `hash` text,
            `time` text,
            `date` text,
            `result` text
        ) DEFAULT CHARSET=utf8mb4;

        CREATE TABLE `ton_pays` (
            `id` text,
            `user` text,
            `tron` text,
            `hash` text,
            `time` text,
            `date` text,
            `result` text
        ) DEFAULT CHARSET=utf8mb4;

        CREATE TABLE `admin` (
            `id` text
        ) DEFAULT CHARSET=utf8mb4;
    ";

    $pdo->exec($sql);

    echo "دیتابیس متصل و نصب شد .";

} catch (PDOException $e) {
    echo "خطا در اتصال یا اجرای کوئری: " . $e->getMessage();
}
?>
