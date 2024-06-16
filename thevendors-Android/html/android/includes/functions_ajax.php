<?php
$fun = $_GET['fun'];
include("company_db.php");
$fun($company_db);
function load_outlets($conn)
{
    $string = $_GET['val'];
    $r = $_GET['r'];
    if ($string != '') {

        $res = mysqli_query($conn, "select * from outlet where route_id='$r' and outlet_name like '{$string}%'");
    } else {

        $res = mysqli_query($conn, "select * from outlet where route_id='$r'");
    }
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
function absent($conn)
{
    $id = $_GET['id'];
    mysqli_query($conn, "INSERT INTO `attendance`(`attendance`, `user_id`) VALUES ('2','$id')");
    echo 2;
}
