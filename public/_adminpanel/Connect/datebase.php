<?php
include 'baglan.php';
// category page category table

$categorytable=$db->query("SELECT * FROM category", PDO::FETCH_OBJ)->fetchAll();
$categoryayar=$db->prepare("SELECT * FROM category");
$categoryayar->execute();
$categorylist=$db->prepare("SELECT * FROM category");
$categorylist->execute();
$users=$db->prepare("SELECT * FROM users");
$users->execute();
$malls=$db->prepare("SELECT
	general_market.*, 
	personalbusiness.*, 

	market_user.*
FROM
	general_market
	LEFT JOIN
	personalbusiness
	ON 
		general_market.id = personalbusiness.market_id
	LEFT JOIN
	companybusiness
	ON 
		general_market.id = companybusiness.market_id
	LEFT JOIN
	market_user
	ON 
		general_market.id = market_user.market_id
");
$malls->execute();
$services=$db->prepare("SELECT * FROM service_providers");
$services->execute();
$subcategory=$db->prepare("SELECT * FROM sub_category");
$subcategory->execute();
$subandsubcategory=$db->prepare("SELECT * FROM sub_category_second");
$subandsubcategory->execute();
$subcategorylist=$db->prepare("SELECT * FROM sub_category");
$subcategorylist->execute();
$carcategory=$db->prepare("SELECT * FROM pc_cars");
$carcategory->execute();
$carsubcategory=$db->prepare("SELECT * FROM pc_car_models");
$carsubcategory->execute();
$carslist=$db->prepare("SELECT * FROM pc_cars");
$carslist->execute();
$servicescategorylist=$db->prepare("SELECT * FROM service_categories");
$servicescategorylist->execute();
$servicescategory=$db->prepare("SELECT * FROM service_categories");
$servicescategory->execute();