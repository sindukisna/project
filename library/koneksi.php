<?php
	$server = mysql_connect("localhost","root","");
	$db = mysql_select_db("e_uang");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>