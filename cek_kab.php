<?php
mysql_connect("localhost","root",""); 
mysql_select_db("user2"); 

$prop = $_GET['s'];
$query = mysql_query("SELECT kab.id_kab , kab.kabupaten FROM kab , prop WHERE kab.id_prop = prop.id_prop and prop.id_prop=$prop"); 
if(mysql_num_rows($query)>0){
    echo "<select>";
    while($row=mysql_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
   else
   {
   	echo "tidak ada kota yang match dengan $prop";
   }
?>


