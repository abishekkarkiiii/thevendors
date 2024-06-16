<?php
session_start();
$db = strtolower(str_replace(' ', '', $_SESSION['company']));
$company_db = new mysqli('localhost', 'root', '', $db);
