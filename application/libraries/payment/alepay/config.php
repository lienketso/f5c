<?php

//Thông tin cấu hình
define('URL_DEMO', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/alepay-installment/');
define('URL_CALLBACK', URL_DEMO . '/result.php'); // URL đón nhận kết quả 
//Alepay cung cấp 

$config = array(
    "apiKey" => "34giQWIukyu1z2pomRQFOSwcxF1sOi", //Là key dùng để xác định tài khoản nào đang được sử dụng.
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCGLP6mjwHoLThG9NVI4kF0Kth4qMunRWfKJamPt+ncfckjBORIfP4DjTq4VacpPo0t9w4mJLIva70Xe+pWAY0KOGUqcmmut6gv5SZ4LY6wBtMMNjPm0jI+sJ/g4yxb7mKBLw+bE2HLmSYMJQdG36Ri31/Y45LM0RI7xCJmxrdMZwIDAQAB", //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
    "checksumKey" => "08iguT5VWaaa4fH92jC6v7KE8oHLvO", //Là key dùng để tạo checksum data.
    "callbackUrl" => URL_CALLBACK,
    "env" => "test",
);
?>