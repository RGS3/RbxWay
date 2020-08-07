<?php

const SHOP_ID = 3662;
const SECRET_WORD = "k4dcEyfyyEZ3aP8DBRlxFLKVBE8o_Mc-";
const SHOP_URL = "https://enot.io/pay";
$AMOUNT = (int)$_GET['amount'] > 0 ? $_GET['amount'] : 1;
$PAYMENT_ID = time();
$ROBLOX_NAME = $_GET['name'];

if($ROBLOX_NAME=== null)
    return printf(json_encode(['code'=>0,'message'=>'Укажите имя!']));

$sign = md5(SHOP_ID.":".$AMOUNT.":".SECRET_WORD.":".$PAYMENT_ID);


echo json_encode(
    ['code'=>1,'query'=>SHOP_URL."?".http_build_query
        (
            [
                "m"=>SHOP_ID,
                "oa"=>$AMOUNT,
                "o"=>$PAYMENT_ID,
                "s"=>$sign,
                "cf"=>$ROBLOX_NAME
            ]
        )
    ]
);