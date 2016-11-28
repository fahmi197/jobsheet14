<?php

mysql_connect("localhost","root",""); 
mysql_select_db("user2");

$nm = $_GET['a'];

$query = "SELECT  `user_id` FROM `tabeluser` WHERE `user_id`='$nm'";
$exe = mysql_query($query);
if(mysql_num_rows($exe)>0){
    echo "$nm belum ada yang pakai";
}else{
    echo "$nm sudah ada yang pakai";
}
?> 