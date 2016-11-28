<?php
mysql_connect("localhost","root",""); //{user dan password disesuaikan}
mysql_select_db("user2");

$id = $_GET['q'];

//$query1 = mysql_query("select userid from tabeluser where userid='$id'");
$query = mysql_query("select user_id from tabeluser where user_id='$id'");

if(mysql_num_rows($query)==0){
    echo "$id belum ada yang pakai";
}else{
    echo "$id sudah ada yang pakai";
}
?> 