    <?php
    include("includes/company_db.php");

    if (!isset($_SESSION['android_login'])) {
        header('location:login.php');
        exit;
    }

    $user = $_SESSION['user_id'];
    $date = date("Y/m/d");

    $attendance_check = mysqli_query($company_db, "SELECT * FROM `attendance` WHERE `user_id`='$user' and attendance = 1 and attendance_date='$date'");
    if (mysqli_num_rows($attendance_check) == 0) {
        header('location:attendance.php');
        exit;
    }

    $route = mysqli_query($company_db, "SELECT r.*,r1.* FROM route_plan r,routes r1 WHERE r.user_id='$user' and r.assigned_date='$date' and r.route_id=r1.route_id");
    while ($row = mysqli_fetch_assoc($route)) {
        $route_id = $row['route_id'];
        $r = $row['route_name'];
    }

    $main_outlet_id = $_GET['id'];
    $outlet = mysqli_query($company_db, 'SELECT * FROM outlet where outlet_id=' . $main_outlet_id);
    while ($row = mysqli_fetch_assoc($outlet)) {
    ?>

        <!doctype html>
        <html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
            <title>Login | The Vendors</title>
            <meta name="description" content="" />
            <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
            <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
            <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
            <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
            <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
            <link rel="stylesheet" href="../../assets/css/demo.css" />
            <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
            <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
            <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />
            <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
            <script src="../../assets/vendor/js/helpers.js"></script>
            <script src="../../assets/vendor/js/template-customizer.js"></script>
            <script src="../../assets/js/config.js"></script>


        </head>

        <body>
            <div>
                <div class="sticky-top text-center border-bottom bg-primary align-items-center">
                    <div class="pt-3">
                        <h4 class="text-white"><?= htmlspecialchars($row['outlet_name'], ENT_QUOTES, 'UTF-8') ?></h4>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                <div class="position-relative">
                    <div class="border-bottom p-2">
                        <span class="text-primary"><strong>Beat Name: <?= htmlspecialchars($r, ENT_QUOTES, 'UTF-8') ?></strong></span>
                    </div>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row text-center mb-5">
                            <div class="col text-center">
                                <button type="button" id="call_make" value="<?= htmlspecialchars($row['outlet_number'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary btn-lg"><i class="ri-phone-line"></i></button>

                            </div>
                            <div class="col text-center">
                                <a href="new-call.php?id=<?= $row['outlet_id'] ?>" class="btn btn-primary"><i class="ri-add-line"></i></a>
                            </div>
                            <div class="col text-center">
                                <button type="button" onclick="get_locala()" class="btn btn-primary btn-lg"><i class="ri-map-pin-line"></i></button>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col"></div>
                            <div class="col-auto text-center">
                                <img width="250px" class="img-fluid rounded img-thumbnail text-center mb-4" src="outlet_images/<?= htmlspecialchars($row['outlet_image'], ENT_QUOTES, 'UTF-8') ?>" alt="">
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row border p-5">
                            <div class="col border-end">Outlet Name</div>
                            <div class="border-start col"><?= htmlspecialchars($row['outlet_name'], ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                        <div class="row border p-5">
                            <div class="col border-end">Phone Number</div>
                            <div class="border-start col"><?= htmlspecialchars($row['outlet_number'], ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                        <div class="row border p-5">
                            <div class="col border-end">Route</div>
                            <div class="border-start col">
                                <?php
                                $route_stmt = mysqli_prepare($company_db, "SELECT * FROM routes WHERE route_id = ?");
                                mysqli_stmt_bind_param($route_stmt, 'i', $row['route_id']);
                                mysqli_stmt_execute($route_stmt);
                                $route_result = mysqli_stmt_get_result($route_stmt);
                                while ($w = mysqli_fetch_assoc($route_result)) {
                                    echo htmlspecialchars($w['route_name'], ENT_QUOTES, 'UTF-8');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
            <script src="../../assets/vendor/libs/popper/popper.js"></script>
            <script src="../../assets/vendor/js/bootstrap.js"></script>
            <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
            <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
            <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
            <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
            <script src="../../assets/vendor/libs/@form-validation/form-validation.js"></script>
            <script src="../../assets/js/main.js"></script>
            <script src="../../assets/js/pages-auth.js"></script>
            <!-- <div class="container">
                <div class="row">
                    <div class="col-10 text-right">
                        <a href="new-call.php?id=" class="btn btn-primary rounded-circle shadow-bottom-right btn-lg p-4"><i class="ri-add-line"></i></a>
                    </div>
                </div>
            </div> -->
            <!-- <button type="submit" name="change_url" class="btn btn-primary rounded-circle shadow-bottom-right btn-lg p-4"><i class="ri-add-line"></i></button> -->

            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    document.getElementById('call_make').addEventListener('click', function() {
                        console.log('Call button clicked!');
                        let phoneNumber = this.value;
                        call_make(phoneNumber);
                    });
                });

                function call_make(phoneNumber) {
                    AndroidFunction.makeCall(
                        '<?= $row['outlet_number'] ?>'
                    );

                }

                function get_locala() {


                    AndroidFunction.getUserLocation('<?= $row['lalitude'] ?>', '<?= $row['longitute'] ?>')
                }
            </script>

        </body>


        </script>


        </html>

    <?php
    }
    ?>