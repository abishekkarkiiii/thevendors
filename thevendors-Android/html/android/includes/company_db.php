<?php
session_start();
$l = $_SERVER['SERVER_NAME'];
$db = strtolower(str_replace(' ', '', $_SESSION['company']));
$company_db = new mysqli("$l", "root", "", "$db");
