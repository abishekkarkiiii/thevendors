<?php
include("includes/company_db.php");
if (!isset($_SESSION['android_login'])) {
    header('location:login.php');
}
$user = $_SESSION['user_id'];
$date = date('Y-m-d');
$q = "SELECT * FROM `attendance` WHERE `user_id`='$user' and attendance = 1 and attendance_date='$date'";
$attendance_check = mysqli_query($company_db, "SELECT * FROM `attendance` WHERE `user_id`='$user' and attendance = 1 and attendance_date='$date'");
if (mysqli_num_rows($attendance_check) == 0) {
    header('location:attendance.php');
    // echo $q;
}
$date = date('Y/m/d');
$route = mysqli_query($company_db, "SELECT r.*,r1.* FROM route_plan r,routes r1 WHERE r.user_id='$user' and r.assigned_date='$date' and r.route_id=r1.route_id");
while ($row = mysqli_fetch_assoc($route)) {
    $route_id = $row['route_id'];
    $r = $row['route_name'];
}
?>

<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login | The Vendors</title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div>
        <div class="sticky-top text-center border-bottom bg-primary align-items-center">
            <div class="pt-3">
                <h4 class="text-white">Outlets</h4>
            </div>
        </div>
    </div>
    <div class="sticky-top text-center border-bottom mt-2 p-2 bg-white align-items-center">
        <div class="input-group bg-white mb-3">
            <input type="text" class="form-control" onkeydown="load_ajax(this.value,<?= $route_id ?>)" onkeyup=" load_ajax(this.value,<?= $route_id ?>)" onchange="load_ajax(this.value,<?= $route_id ?>)" placeholder="Search...">
            <span class="input-group-text"><i class="ri-search-line"></i></span>
        </div>
    </div>
    <div class="position-relative">
        <div class="border-bottom p-2">
            <span class="text-primary"><strong>Beat Name:<?= $r ?></strong></span>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div id="load_ajax" class="load_ajax">

            </div>
        </div>
    </div>
    </div>
    <!-- <div class="buy-now">
    <button class="btn btn-danger btn-buy-now">+</button>
  </div> -->
    <style>
        .shadow-bottom-right {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        /* Optional: Add media query to only apply styles on mobile devices */
        @media (max-width: 768px) {
            .shadow-bottom-right {
                bottom: 10px;
                right: 10px;
            }
        }
    </style>
    <!-- / Content -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-right">
                <form action="send.php" method="post">
                    <button type="submit" name="change_url" class="btn btn-primary rounded-circle shadow-bottom-right btn-lg p-4"><i class="ri-add-line"></i></button>
                </form>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-auth.js"></script>
    <script>
        function refresh_to_add() {
            AndroidFunction.sendtoadd();
        }
        $(document).ready(function() {
            load_ajax('', <?= $route_id ?>);
        })

        function load_ajax(x, r) {
            $.ajax({
                url: 'includes/functions_ajax.php?fun=load_outlets&val=' + x + '&r=' + r,
                type: 'GET',
                success: function(res) {
                    res = JSON.parse(res);
                    let result = ''
                    for (let x = 0; x < res.length; x++) {

                        result += ` <div onclick="load_outlet(` + res[x].outlet_id + `)" class="card mb-2">
                        <div class="card-body">
                        <p class="h4">` + res[x].outlet_name + `</p>
                        <span class="text-muted">` + res[x].address + `</span>
                        </div>
                        </div>`
                    }
                    document.getElementById('load_ajax').innerHTML = result

                }
            })

        }

        function load_outlet(x) {
            window.location.href = "outlet-view.php?id=" + x;
        }
    </script>
</body>

</html>