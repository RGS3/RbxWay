<?php

$merchant = $_REQUEST['merchant']; // id вашего магазина
const SECRET_KEY_2 = "XGWIIJ_QjXwHoHPvrE2uUuHPwXAaUOrA";

$sign = md5($merchant.':'.$_POST['amount'].':'.SECRET_KEY_2.':'.$_POST['merchant_id']);

if ($sign != $_REQUEST['sign_2']) {
    echo json_encode(['code'=>0,'message'=>'Bad pay']);
    return true;
}

require_once "./php/classes/Roblox.php";
require_once "./php/classes/DataBase.php";
$Roblox = new Roblox();
$Roblox->payout($_POST['custom_field'],$_POST['amount']*$Roblox->config['price']);

$sql = "INSERT INTO `donate` (id, number, amount,message,login) VALUES (?,?,?,?,?)";
$data = [$pay->txnId,$pay->account,$pay->total->amount,"unexpected error",$pay->comment];
$DataBase->query($sql,$data);

echo json_encode(['code'=>1]);