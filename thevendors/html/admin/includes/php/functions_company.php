<?php
if (isset($_POST["user_create"])) {

    $username = $_POST['user_name'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $role = $_POST['designation'];
    if ($role == 1) {
        $zone = 0;
        $dis = 0;
    } else {

        $zone = $_POST['zone'];
        $dis = $_POST['dis'];
    }
    $password = $_POST['password'];
    include('company_db.php');
    include('db.php');
    $company = $_SESSION['company'];
    mysqli_query($conn, "INSERT INTO `other_users`(`first_name`, `last_name`, `company_name`, `username`, `password`, `designation`) VALUES ('$fname','$lname','$company','$username','$password','$role')");
    $u = mysqli_query($conn, "select * from `other_users` where company_name ='$company'");
    $user_id = '';
    while ($row = mysqli_fetch_assoc($u)) {
        $user_id = $row['user_id'];
    }
    mysqli_query($company_db, "INSERT INTO `user_details`(`user_id`, `zone`, `phone_num`) VALUES ('$user_id','$zone','$phone')");
    foreach ($dis as $d) {

        mysqli_query($company_db, "INSERT INTO `distributor_user_link`(`user_id`, `dis_id`) VALUES ('$user_id','$d')");
    }
    header("location:../../users.php");
}
if (isset($_POST['create_zone'])) {
    include('company_db.php');
    $zone = $_POST['zone_name'];
    mysqli_query($company_db, "INSERT INTO `zones`(`zone_name`) VALUES ('$zone')");
    header("location:../../zone.php");
}
if (isset($_POST['edit_zone'])) {
    include('company_db.php');
    $zone = $_POST['zone_edit_name'];
    $id = $_POST['id_hide'];
    if (isset($_POST['isactive'])) {
        $active = 1;
    } else {
        $active = 0;
    }
    mysqli_query($company_db, "UPDATE `zones` SET `zone_name`='$zone',`STATUS`='$active' WHERE `zone_id`='$id'");
    header("location:../../zone.php");
}
if (isset($_POST['dis_create'])) {
    include('company_db.php');
    $company = strtolower(str_replace(' ', '', $_SESSION['company']));
    include('db.php');
    $dis_name = $_POST['dis_name'];
    $dis_address = $_POST['dis_address'];
    $phone = $_POST['phone'];
    $vat = $_POST['VAT'];
    $zone = $_POST['zone'];
    mysqli_query($company_db, "INSERT INTO `distributors`(`dis_name`, `address`, `phone_number`, `pan_no`, `zones`) VALUES ('$dis_name','$dis_address','$phone','$vat','$zone')");
    mysqli_query($conn, "INSERT INTO `other_users`(`company_name`, `username`, `password`, `designation`) VALUES ('$company','$dis_name','$dis_name','2')");
    header("location:../../organization.php");
}

if (isset($_POST['dis_edit'])) {
    include('company_db.php');
    $id = $_POST['id_hide'];
    $old_name = mysqli_query($company_db, "SELECT * FROM distributors where dis_id=" . $id);
    $old_uname = '';
    while ($r = mysqli_fetch_assoc($old_name)) {

        $old_uname = $r['dis_name'];
    }
    $dis_name = $_POST['dis_name_edit'];
    $address = $_POST['dis_address'];
    $phone = $_POST['phone_edit'];
    $VAT = $_POST['VAT_edit'];
    if (isset($_POST['isactive'])) {
        $active = 1;
    } else {
        $active = 0;
    }
    // echo $address;
    mysqli_query($company_db, "UPDATE `distributors` SET `dis_name`='$dis_name',`address`='$address',`phone_number`='$phone',`pan_no`='$VAT',`status`='$active' WHERE `dis_id`='$id'");
    include('db.php');
    mysqli_query($conn, "UPDATE `other_users` SET `username`='$dis_name',`password`='$dis_name',`status`='$active' WHERE `username`='$old_uname'");
    header("location:../../organization.php");
}
if (isset($_POST["product_create"])) {
    include("company_db.php");
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $unitpercrt = $_POST['unitpercrt'];
    $brand = $_POST['brand'];
    $cat = $_POST['Category'];
    mysqli_query($company_db, "INSERT INTO `products`( `product_name`, `price`, `unitpercrt`, `brand_id`, `category_id`) VALUES ('$name','$price','$unitpercrt','$brand','$cat')");
    header("location:../../products.php");
}
if (isset($_POST["pro_edit"])) {
    include("company_db.php");
    $id = $_POST['id_hide'];
    $name = $_POST["product_name_edit"];
    $price = $_POST["price_edit"];
    $unitpercrt = $_POST["unitpercrt_edit"];
    $brand = $_POST["brand_edit"];
    $cat = $_POST["Category_edit"];
    if (isset($_POST["isactive"])) {
        $active = 1;
    } else {
        $active = 0;
    }
    mysqli_query($company_db, "UPDATE `products` SET `product_name`='$name',`price`='$price',`unitpercrt`='$unitpercrt',`brand_id`='$brand',`category_id`='$cat',`status`='$active' WHERE `product_id`='$id'");
    header("location:../../products.php");
}
if (isset($_POST["create_cat"])) {
    include("company_db.php");
    $cat = $_POST['cat_name'];
    mysqli_query($company_db, "INSERT INTO `category`(`category_name`) VALUES ('$cat')");
    header("location:../../category.php");
}
if (isset($_POST["edit_cat"])) {
    include("company_db.php");
    $cat = $_POST['Category_edit_name'];
    $id = $_POST['id_hide'];
    if (isset($_POST['isactive'])) {
        $active = 1;
    } else {
        $active = 0;
    }
    mysqli_query($company_db, "UPDATE `category` SET `category_name`='$cat',`status`='$active' WHERE `category_id`='$id'");
    header("location:../../category.php");
}
if (isset($_POST["create_brand"])) {
    include("company_db.php");
    $b = $_POST['brandname'];
    mysqli_query($company_db, "INSERT INTO `brand`(`brand_name`) VALUES ('$b')");
    header("location:../../brands.php");
}
if (isset($_POST["edit_brand"])) {
    include("company_db.php");
    $b = $_POST["brand_edit_name"];
    $id = $_POST['id_hide'];
    if (isset($_POST['isactive'])) {
        $active = 1;
    } else {
        $active = 0;
    }
    mysqli_query($company_db, "UPDATE `brand` SET `brand_name`='$b',`status`='$active' WHERE `brand_id`='$id'");
    header("location:../../brands.php");
}
if (isset($_POST['add_inventory'])) {
    include("company_db.php");
    $dis = $_POST['dis'];
    $pcs = $_POST['pcs'];
    $crt = $_POST['crt'];
    $id = $_POST['product_id'];
    for ($x = 0; $x < count($id); $x++) {
        $i = $id[$x];
        $c = $crt[$x];
        $p = $pcs[$x];
        mysqli_query($company_db, "INSERT INTO `stocks_dis_details`( `dis_id`, `product_id`, `crt`, `pcs`) VALUES ('$dis','$i','$c','$p')");
    }
    header("location:../../inventory.php");
}
if (isset($_POST["Assign_route"])) {
    include("company_db.php");
    $date = $_POST["date"];
    $route = $_POST["route"];
    $user_id = $_POST["user_id"];
    $check = mysqli_query($company_db, "select * from route_plan where user_id='$user_id' and assigned_date = '$date'");
    if (mysqli_num_rows($check) > 0) {
        while ($r = mysqli_fetch_assoc($check)) {
            $id = $r["id"];
        }
        mysqli_query($company_db, "UPDATE `route_plan` SET`route_id`='[value-2]' WHERE id='$id'");
        header("location:../../users.php");
    } else {
        mysqli_query($company_db, "INSERT INTO `route_plan`(`route_id`, `user_id`, `assigned_date`) VALUES ('$route','$user_id','$date')");
        header("location:../../users.php");
    }
}
