<!DOCTYPE html>
<?php
mysql_connect("localhost","root",""); 
mysql_select_db("user2"); 

$query = mysql_query("select id_prop,prop from prop"); 
?>

<html>
<head>
<script> 
var drz, kata, x; 
function cekid(){ 
    kata = document.getElementById("userid").value; 
    if(kata.length>2){ 
        document.getElementById("teks").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekid.php"; 
        url=url+"?q="+kata; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus(); 
         } 
} 
function ceknama(){ 
    nama1 = document.getElementById("id_nama").value; 
    if(nama1.length>2){ 
        document.getElementById("teks5").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="ceknama.php"; 
        url=url+"?a="+nama1; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged5; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
       fokus5(); 
         } 
} 
function cekemail(){ 
    email = document.getElementById("email").value; 
    if(email.length>2){ 
        document.getElementById("teks2").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekemail.php"; 
        url=url+"?w="+email; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged2; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus2(); 
         } 
} 

function cekumur(){ 
    umur = document.getElementById("umur").value; 
    if(umur.length>0){ 
        document.getElementById("teks3").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekumur.php"; 
        url=url+"?r="+umur; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged3; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus3(); 
         } 
} 

function cek_kab(){ 
    kab = document.getElementById("prop").value; 
    if(kab.length>0){ 
        document.getElementById("text4").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cek_kab.php"; 
        url=url+"?s="+kab; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged4; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus4(); 
         } 
} 



function buatajax(){ 
    if (window.XMLHttpRequest){ 
        return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
 

function stateChanged(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks").innerHTML = data; 
    } 
} 

function stateChanged4(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("text4").innerHTML = data; 
    } 
} 
function stateChanged2(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks2").innerHTML = data; 
    } 
} 

function stateChanged3(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks3").innerHTML = data; 
    } 
} 
function stateChanged5(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks5").innerHTML = data; 
    } 
}
function fokus(){ 
    document.getElementById("userid").focus(); 
} 

function fokus2(){ 
    document.getElementById("email").focus(); 
}

function fokus3(){ 
    document.getElementById("umur").focus(); 
}  


function fokus4(){ 
    document.getElementById("prop").focus(); 
}

function fokus5(){ 
    document.getElementById("id_nama").focus(); 
}



function cek_empty(){ 
    nama1 = document.getElementById("id_nama").value; 
    if(nama1.length==0){ 
        document.getElementById("teks5").innerHTML = "Field ini Wajib diisi"; 
        }else{
            ceknama();
        }
    }
</script> 
</head>
<body>
<pre>
<form> 
Nama : <input type=text name=nama id=id_nama onblur=cek_empty()> 
<span id=teks5 style="color:red;font-size:15pt"></span> <br> 
User ID : <input type=text name=userid id=userid onblur=cekid()> 
<span id=teks style="color:red;font-size:15pt"></span> <br> 
Email : <input type=text name=email id=email onblur=cekemail() >
<span id=teks2 style="color:red;font-size:15pt"></span> <br> 
Umur : <input type=text name=umur id=umur onblur=cekumur() >
<span id=teks3 style="color:red;font-size:15pt"></span> <br> 
Provinsi :
<?php 
    if(mysql_num_rows($query)>0){
    echo "<select name='prop' id='prop' onchange=cek_kab()>";
    echo "<option value='0'>Pilih<br>";
    while($row=mysql_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
?>
<span id=text4 style="color:red;font-size:15pt"></span> <br> 
</form> 
