<?php

if (isset($_POST["image"])) {
    // include('includes/company_db.php');
    // $l = $_SERVER['SERVER_NAME'];
    $c = $_POST['company'];
    $con = mysqli_connect("172.16.18.108", 'root', '', "$c");
    $l1 = $_POST['longitude'];
    $l2 = $_POST['latitude'];
    $o = mysqli_query($con, "select * from outlet");
    while ($r = mysqli_fetch_array($o)) {
        $id = $r['outlet_id'];
    }
    $file_name = rand(10, 200) . '_' . date("d-m-y") . '-' . time() . '.jpg';
    if (file_put_contents("outlet_images/" . $file_name, base64_decode($_POST['image']))) {
        mysqli_query($con, "UPDATE `outlet` SET `outlet_image`='$file_name',`longitute`='$l1',`lalitude`='$l2' WHERE outlet_id='$id'");
    }
} else {
    echo "hawa";
}
