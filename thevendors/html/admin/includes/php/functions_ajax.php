<?php
include("company_db.php");
$fun = $_GET['fun'];
$fun($company_db);
function load_dis($con)
{
    $zone = $_GET['val'];
    $res = mysqli_query($con, 'SELECT * FROM distributors where zones=' . $zone);
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
function get_zone_data($con)
{
    $zone = $_GET['val'];
    $res = mysqli_query($con, "SELECT * FROM `zones` WHERE `zone_id`='$zone'");
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
function load_dis_edit($con)
{
    $dis_id = $_GET['val'];
    $dis = mysqli_query($con, 'SELECT * FROM `distributors` where dis_id=' . $dis_id);
    $out = array();
    while ($r = mysqli_fetch_assoc($dis)) {
        $out[] = $r;
    }
    echo json_encode($out);
}
function load_product($con)
{
    $product_id = $_GET['val'];
    $p = mysqli_query($con, 'SELECT * FROM `products` WHERE `product_id`=' . $product_id);
    while ($r = mysqli_fetch_assoc($p)) {
        $out[] = $r;
    }
    echo json_encode($out);
}
function get_cat_data($con)
{
    $id = $_GET['val'];
    $res = mysqli_query($con, 'SELECT * FROM `category` WHERE category_id=' . $id);
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
function get_brand_data($con)
{
    $id = $_GET['val'];
    $res = mysqli_query($con, 'SELECT * FROM `brand` WHERE brand_id=' . $id);
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
function load_route($con)
{
    $z = $_GET['z'];
    $res = mysqli_query($con, 'select * from routes where zone_id=' . $z);
    $out = array();
    while ($row = mysqli_fetch_array($res)) {
        $out[] = $row;
    }
    echo json_encode($out);
}
