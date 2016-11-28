<?php
mysql_connect("localhost","root","");
mysql_select_db("user2");

$alamat = $_GET['w'];

$query1 = mysql_query("SELECT `email` FROM `tabeluser` WHERE `email`='$alamat'");

if(mysql_num_rows($query1)==0){
    echo "$alamat belum ada yang pakai";
}else{
    echo "$alamat sudah ada yang pakai";
}
?> 