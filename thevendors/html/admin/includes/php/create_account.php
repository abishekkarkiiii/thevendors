<?php
require('db.php');
$status = 0;
$name = $_POST['multiStepsUsername'];
$email = $_POST['multiStepsEmail'];
$check_email_query = "SELECT * FROM `users` WHERE `email`= '$email';";
$check_email_res = mysqli_query($conn, $check_email_query);
if (mysqli_num_rows($check_email_res) > 0) {
  $status = 0;
} else {
  $status = 1;
}
$password = $_POST['multiStepsPass'];
$company = $_POST['multiStepsCompany'];
$check_company_query = "select * FROM `users` where `company_name`='$company'";
$check_company_res = mysqli_query($conn, $check_company_query);
if (mysqli_num_rows($check_company_res) > 0 || $company == 'thevendors' || $company == 'the vendors' || $company == 'The Vendors' || $company == 'the Vendors' || $company == 'The vendors') {
  $status = 0;
} else {
  $status = 1;
}
$firstName = $_POST['multiStepsFirstName'];
$lastName = $_POST['multiStepsLastName'];
$phone = $_POST['multiStepsMobile'];
$phone = str_replace(' ', '', $phone);
$check_phone_query = "select * FROM `users` where `phone`='$phone'";
$check_phone_res = mysqli_query($conn, $check_phone_query);
if (mysqli_num_rows($check_phone_res) > 0) {
  $status = 0;
} else {
  $status = 1;
}
$pin_code = $_POST['multiStepsPincode'];
$address = $_POST['multiStepsAddress'];
$landmark = $_POST['multiStepsArea'];
$city = $_POST['multiStepsCity'];
$country = $_POST['country'];
$plan = $_POST['customRadioIcon'];
$currentDate = date("Y/m/d");
$dateAfter30Days = date("Y-m-d", strtotime("+30 days", strtotime($currentDate)));
$phone = str_replace(' ', '', $phone);
$sql = "INSERT INTO `users`(`username`, `email`, `password`, `company_name`, `first_name`, `last_name`, `phone`, `pincode`, `address`, `landmark`, `city`, `country`, `plan`,`renew_date`)VALUES ('$name','$email','$password','$company','$firstName','$lastName','$phone','$pin_code','$address','$landmark','$city','$country','$plan','$dateAfter30Days')";
if ($status == 1) {
  $result = mysqli_query($conn, $sql);
  $company = strtolower(str_replace(' ', '', $company));
  $sql1 = "CREATE DATABASE `$company`";
  $result = mysqli_query($conn, $sql1);
  $company_db = new mysqli('localhost', "root", "");
  // include('company_db.php');
  mysqli_select_db($company_db, $company);
  $sql_table = 'CREATE TABLE `distributors` (
  `dis_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dis_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `pan_no` varchar(11) NOT NULL,
  `zones` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
)';
  mysqli_query($company_db, $sql_table);
  $sql_table = "create TABLE `zones`( zone_id int not null PRIMARY KEY AUTO_INCREMENT, zone_name varchar(25), STATUS tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE user_details( tmp_id int not null PRIMARY KEY AUTO_INCREMENT, user_id int not null, zone int, phone_num varchar(11), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `distributor_user_link`( id int not null PRIMARY KEY AUTO_INCREMENT, user_id int not null, dis_id int not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create TABLE `route_plan`( id int not null PRIMARY key AUTO_INCREMENT, route_id int not null, user_id int not null, assigned_date DATE not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table `routes`( route_id int not null PRIMARY KEY AUTO_INCREMENT, zone_id int not null, route_name varchar(50), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `products`( product_id int not null PRIMARY KEY AUTO_INCREMENT, product_name varchar(50) not null, price double, unitpercrt int, brand_id int, category_id int );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table `category`( category_id int PRIMARY KEY not null AUTO_INCREMENT, category_name varchar(25), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table `brand`( brand_id int not null PRIMARY key AUTO_INCREMENT, brand_name varchar(25), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table schemes( scheme_id int not null PRIMARY KEY AUTO_INCREMENT, scheme_name varchar(25), start_date date, end_date date, free_product_id int, status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table schemes_product_link( link_id int not null PRIMARY KEY AUTO_INCREMENT, product_id int not null, scheme_id int not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table schemes_distributor_link( link_id int not null PRIMARY KEY AUTO_INCREMENT, dis_id int not null, scheme_id int not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table user_activity( activity_id int not null PRIMARY KEY AUTO_INCREMENT, activity_type int COMMENT 'Call:1 outletadded:2 Order:3', date_time datetime DEFAULT CURRENT_TIMESTAMP, longitude varchar(50), latitude varchar(50), user_id int not null, outlet_id int not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table outlet( outlet_id int not null PRIMARY key AUTO_INCREMENT, outlet_name varchar(50), outlet_number varchar(12), route_id int, outlet_type int, address varchar(50), outlet_image varchar(1000), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table outlet_type( outlet_type_id int not null PRIMARY key AUTO_INCREMENT, type_name varchar(25), status tinyint DEFAULT 1 );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE orders( order_id int not null PRIMARY KEY AUTO_INCREMENT, dis_id int not null, outlet_id int not null, total_price_before_dis double not null, discount double, total_price double, date_time date DEFAULT CURRENT_TIMESTAMP, user_id int not null );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `orders` ADD `satus` BOOLEAN NOT NULL DEFAULT TRUE AFTER `user_id`, ADD `reject_reason` VARCHAR(25) NOT NULL AFTER `satus`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `orders_details` (
  `order_details_id` int(11) NOT NULL PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` double DEFAULT NULL,
  `crt` int(11) DEFAULT NULL,
  `pcs` int(11) DEFAULT NULL,
  `dis` double DEFAULT NULL,
  `total` double DEFAULT NULL
)";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table stocks_outlet( stock_id int not null PRIMARY key AUTO_INCREMENT, dis_id int not null, outlet_id int not null, user_id int );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table stocks_outlet_details( stock_details_id int not null PRIMARY key AUTO_INCREMENT, product_id int not null, crt int, pcs int );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "create table stocks_dis_details( stock_details_id int not null PRIMARY key AUTO_INCREMENT, product_id int not null, crt int, pcs int );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `products` ADD `status` TINYINT NOT NULL DEFAULT '1' AFTER `category_id`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE table attendance( a_id int not null PRIMARY key AUTO_INCREMENT, attendance int not null COMMENT 'Present: 1, Absent:2', user_id int not null, attendance_date date DEFAULT CURRENT_TIMESTAMP );";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `attendance` ADD `attendance_image` VARCHAR(1000) NOT NULL AFTER `user_id`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `outlet` (
  `outlet_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `outlet_name` varchar(50) DEFAULT NULL,
  `outlet_number` varchar(12) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `outlet_type` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `outlet_image` varchar(1000) DEFAULT NULL,
  `longitute` mediumtext NOT NULL,
  `lalitude` mediumtext NOT NULL,
  `status` tinyint(4) DEFAULT 1
)";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `attendance` ADD `longitute` TEXT NOT NULL AFTER `attendance_date`, ADD `latitude` TEXT NOT NULL AFTER `longitute`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `attendance` CHANGE `attendance_date` `attendance_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `attendance` ADD `attendance_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `attendance_date`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `attendance` CHANGE `attendance_date` `attendance_date` DATE NULL DEFAULT CURRENT_TIMESTAMP;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `mdm` (
  `mdm_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mdm_name` int(11) NOT NULL,
  `mdm_file` int(11) NOT NULL
) ";
  mysqli_query($company_db, $sql_table);
  $sql_table = "CREATE TABLE `stock_outlet` (
  `temp_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `outlet_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `crt` int(11) NOT NULL
)";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `stocks_dis_details` CHANGE `stock_details_id` `stock_id` INT(11) NOT NULL AUTO_INCREMENT;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `stocks_dis_details` ADD `dis_id` INT NOT NULL AFTER `stock_id`;";
  mysqli_query($company_db, $sql_table);
  $sql_table = "ALTER TABLE `user_activity` ADD `isfailedcall` TINYINT NOT NULL DEFAULT '1' AFTER `outlet_id`;";
  mysqli_query($company_db, $sql_table);
}
echo $status;

# code made by Priyanshu Begwani