<?php

$exist_sku_1 = "CA-0001";
$exist_sku_2 = "CA-0002";

$exist_skus = array();

$hw = "Hello World";

$hw2 = explode("-",$exist_sku_1);

echo $hw." ".$hw2;

// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

// Example 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user; // foo
echo $pass; // *

?>