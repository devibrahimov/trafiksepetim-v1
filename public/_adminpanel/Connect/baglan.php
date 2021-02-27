<?php 
try {




	$db=new PDO("mysql:host=localhost;dbname=trafikse_db;charset=utf8",'trafikse_db','Trafiksepetim1453!');

}
catch (PDOExpception $e) {
	echo $e->getMessage();
}
