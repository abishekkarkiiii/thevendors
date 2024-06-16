<?php
include("includes/php/db.php");
include("includes/php/company_db.php");
$page = 'attendance-report';
// session_start();
if (isset($_SESSION["islogined"])) {
} else {

    header("location:login.php");
}
if (isset($_POST["select-date"]) and $_POST["select-date"] != '') {
    $date = date("Y-m-d", strtotime($_POST["select-date"]));
} else {

    $date = date("y/m/d");
}

$present = mysqli_query($company_db, "SELECT * FROM attendance where attendance_date='$date' and attendance=1");
$absent = mysqli_query($company_db, "SELECT * FROM attendance where attendance_date='$date' and attendance=0");
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>The Vendors</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="stylesheet" href="assets/vendor/fonts/remixicon/remixicon.css" />
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
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-analytics.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php
            require("includes/php/sidebar.php");
            ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
                require("includes/php/nav.php");
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Attendance Report</div>
                                <div class="form">
                                    <form action="" method="post">

                                        <div class="row">
                                            <div class="col">
                                                <input type="date" value="<?php
                                                                            if (isset($_POST["select-date"]) and $_POST["select-date"] != '') {
                                                                                echo date("Y-m-d", strtotime($_POST["select-date"]));
                                                                            } else {

                                                                                echo date("Y-m-d");
                                                                            }
                                                                            ?>" name="select-date" class="form-control" id="select-date">
                                            </div>
                                            <div class="col mt-1">
                                                <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                                                <a href="attendance-report.php" class="btn btn-danger">Reset</a>
                                            </div>
                                            <div class="col">
                                            </div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h4>Summary</h>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Total Users</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Not Marked</th>
                                            </thead>
                                            <?php
                                            $users = mysqli_query($conn, "SELECT * FROM other_users where status=1 and designation = 3 and company_name='" . $_SESSION['company'] . "'");
                                            $users1 = mysqli_query($conn, "SELECT * FROM other_users where status=1 and designation = 4 and company_name='" . $_SESSION['company'] . "'");
                                            ?>
                                            <tbody>
                                                <tr>

                                                    <td><?= mysqli_num_rows($users) + mysqli_num_rows($users1) ?></td>
                                                    <td><?= mysqli_num_rows($present) ?></td>
                                                    <td><?= mysqli_num_rows($absent) ?></td>
                                                    <td><?php echo mysqli_num_rows($users) + mysqli_num_rows($users1) - mysqli_num_rows($present) - mysqli_num_rows($absent); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <table class="table table-bordered datatable-custom">
                                    <thead>
                                        <th>Username</th>
                                        <th>Date & Time</th>
                                        <th>Status</th>
                                        <th>Location</th>
                                        <th>Picture</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $att = mysqli_query($company_db, "SELECT * FROM attendance where attendance_date='$date'");
                                        while ($row = mysqli_fetch_assoc($att)) {
                                        ?>
                                            <tr>
                                                <td><?php
                                                    $user = mysqli_query($conn, "SELECT * FROM `other_users` where user_id=" . $row['user_id']);
                                                    $u = mysqli_fetch_assoc($user);
                                                    echo $u['username'];
                                                    ?></td>
                                                <td><?= $row['attendance_time'] ?></td>
                                                <td class="<?php if ($row['attendance'] == 1) {
                                                                echo 'text-success';
                                                            } else {
                                                                echo 'text-danger';
                                                            } ?>"><?php if ($row['attendance'] == 1) {
                                                                        echo 'Present';
                                                                    } else {
                                                                        echo 'Absent';
                                                                    } ?></td>
                                                <td><a target="_blank" href="https://maps.google.com/maps?q=<?= $row['longitute'] ?>,<?= $row['latitude'] ?>" class="link">View Location</a></td>
                                                <td><img width="60px" data-bs-toggle="modal" data-bs-target="#modalTop" class="img-fluid img-thumbnail cursor-pointer" onclick="load_img('../../../thevendors-android/html/android/attendance_images/<?= $row['attendance_image'] ?>')" src="../../../thevendors-android/html/android/attendance_images/<?= $row['attendance_image'] ?>" alt=""></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- / Content -->
                    <div class="modal modal-top fade" id="modalTop" tabindex="-1">
                        <div class="modal-dialog">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div id="modal-body" class="modal-body">

                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- Footer -->
                    <?php
                    include("includes/php/footer.php");
                    ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

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
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>


    <script src="includes/js/datatable.js"></script>
    <script>
        $('.btn-group').append('1');
        $(document).ready(function() {
            $('.offcan').css('display', 'none !important')
        })

        function load_img(x) {
            document.getElementById('modal-body').innerHTML = '<img class="img-fluid rounded img-thumbnail" src="' + x + '" alt="">'
        }
    </script>

</body>

</html>