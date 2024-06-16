<?php
$page = 'users';
require('includes/php/company_db.php');
require('includes/php/db.php');
if (isset($_SESSION["islogined"])) {
} else {

  header("location:login.php");
}
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
  <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />

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


              <div class="card-datatable table-responsive pt-0">

                <table class="datatable-custom table ">
                  <thead>
                    <th>#ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Designation</th>
                    <th>Zone</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <?php
                    $main_users = mysqli_query($conn, "SELECT * FROM users where `company_name` ='" . $_SESSION["company"] . "'");
                    while ($row = mysqli_fetch_assoc($main_users)) {
                    ?>
                      <tr>
                        <td></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= ucwords($row['first_name']) . ' ' . ucwords($row['last_name']) ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td class="text-success">Admin</td>
                        <td>All</td>
                        <td class="text-success">Active</td>
                        <td><?php
                            if ($_SESSION['uname'] == $row['username']) { ?>
                            <button class="btn btn-primary"><i class="tf-icons ri-edit-line"></i></button>
                          <?php }
                          ?>
                        </td>
                      </tr>

                    <?php
                    }
                    ?>
                    <?php
                    $other_users = mysqli_query($conn, "SELECT * FROM other_users where `company_name` ='" . $_SESSION["company"] . "' and designation != 2");
                    while ($r = mysqli_fetch_assoc($other_users)) {
                    ?>
                      <tr>
                        <td><?= $r['user_id'] ?></td>
                        <td><?= $r['username'] ?></td>
                        <td><?= ucwords($r['first_name']) . " " . ucwords($r['last_name']) ?></td><?php
                                                                                                  // mysqli_select_db($company_db, 'begwanigroup');
                                                                                                  $details = mysqli_query($company_db, 'SELECT * FROM user_details where user_id = ' . $r['user_id']);
                                                                                                  $d = mysqli_fetch_assoc($details);
                                                                                                  ?>
                        <td><?= $d['phone_num'] ?></td>
                        <td class="<?php
                                    if ($r['designation'] == 1) {
                                      echo 'text-success';
                                    } elseif ($r['designation'] == 3) {
                                      echo 'text-primary';
                                    } elseif ($r['designation'] == 4) {
                                      echo 'text-danger';
                                    }  ?>"><?php
                                            if ($r['designation'] == 1) {
                                              echo 'admin';
                                            } elseif ($r['designation'] == 3) {
                                              echo 'Sales Manager';
                                            } elseif ($r['designation'] == 4) {
                                              echo 'Salesman';
                                            }  ?></td>
                        <?php
                        if ($r['designation'] != 1) {

                          $zone_query = mysqli_query($company_db, "select * from zones where zone_id =" . $d['zone']);
                          $z = mysqli_fetch_assoc($zone_query);

                        ?>
                          <td><?= $z['zone_name'] ?></td>
                        <?php
                        } else { ?>
                          <td>All</td>

                        <?php
                        }
                        ?>
                        <td class="<?php if ($r['status'] == 1) {
                                      echo 'text-success';
                                    } else {
                                      echo 'text-danger';
                                    } ?>"><?php if ($r['status'] == 1) {
                                            echo 'Active';
                                          } else {
                                            echo 'Inactive';
                                          } ?></td>
                        <td><button class="btn btn-primary"><i class="tf-icons ri-edit-line"></i></button>
                          <?php
                          if ($r['designation'] == 4) { ?>
                            <button type="button" value="<?= $r['user_id'] ?>" onclick="hide_route(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop">
                              PJP
                            </button>
                          <?php
                          }
                          ?>
                        </td>
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
      <!-- User Form -->
      <?php
      include('includes/php/functions_company.php');
      ?>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New User</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
          <form action="includes/php/functions_company.php" method="post" class="mb-4">
            <div class="mb-2">
              <label for="user_name" class="form-label">Username</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
            </div>
            <div class="mb-2">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="mb-2">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" name="last_name" id="last_name" class="form-control">
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-2">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="mb-2">
              <label for="designation" class="form-label">Designation</label>
              <select name="designation" onchange="hide_zone()" class="select2 form-select" id="select2Basic">
                <option value="1">Admin</option>
                <option value="3">Sales Manager</option>
                <option value="4">Salesman</option>
              </select>
            </div>
            <div class="mb-2" id="zone_div">
              <label for="zone" class="form-label">Zone</label>
              <select onchange="show_dis(this)" name="zone" id="zone" class="form-select select2">
                <option value="0">SELECT</option>
                <?php
                $zone_query = mysqli_query($company_db, "select * from zones");
                while ($z = mysqli_fetch_assoc($zone_query)) {
                ?>
                  <option value="<?= $z['zone_id'] ?>"><?= $z['zone_name'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-4 hide">
              <label for="dis" class="form-label">Distributors</label>
              <select name="dis[]" multiple id="dis" class="select2 form-select">
              </select>
            </div>
            <button type="submit" name="user_create" class="btn btn-primary mb-2 d-grid w-100">Add</button>
          </form>
          <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
            Cancel
          </button>
        </div>
      </div>
      <!-- /User Form -->
    </div>

    <div class="modal modal-top fade" id="modalTop" tabindex="-1">
      <div class="modal-dialog">
        <form class="modal-content" method="post" action="includes/php/functions_company.php">
          <div class="modal-header">
            <h4 class="modal-title" id="modalTopTitle">Assign Route</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-6 mt-2">
                <div class="form-floating form-floating-outline">
                  <select onchange="load_route(this.value)" name="zone" id="nameSlideTop" class="form-select">
                    <?php
                    $z = mysqli_query($company_db, 'select * from zones');
                    while ($m = mysqli_fetch_assoc($z)) { ?>
                      <option value="<?= $m['zone_id'] ?>"><?= $m['zone_name'] ?></option>
                    <?php  }
                    ?>
                  </select>
                  <label for="nameSlideTop">Zone</label>
                </div>
              </div>
            </div>
            <div class="row g-4">
              <div class="col mb-2">
                <div id="hide_nec" class="form-floating form-floating-outline">
                  <select name="route" id="route" class="select2 form-select"></select>
                  <label for="route">Route</label>
                </div>
              </div>
              <input type="hidden" name="user_id" id="user_id">
              <div class="col mb-2">
                <div class="form-floating form-floating-outline">
                  <input type="date" id="dateSlideTop" name="date" class="form-control" />
                  <label for="dateSlideTop">date</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="submit" name="Assign_route" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
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
  <script src="../../assets/vendor/js/menu.js"></script>
  <script src="../../assets/vendor/libs/select2/select2.js"></script>
  <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
  <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/dashboards-analytics.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>


  <script src="includes/js/datatable.js"></script>
  <script>
    $(document).ready(function() {
      $('.offcan').attr('data-bs-toggle', 'offcanvas');
      $('.offcan').attr('data-bs-target', '#offcanvasEnd');
      $('.offcan').attr('aria-controls', 'offcanvasEnd');
      $('.offcan').attr('onclick', 'hide_dis();hide_zone();');

    });
    $('.btn-group').append('1');
    let a = 0;

    function hide_route(x) {
      a = x;
      $('#hide_nec').hide();

    }

    function load_route(x) {
      console.log(a);
      $.ajax({
        url: 'includes/php/functions_ajax.php?fun=load_route&a=' + a + '&z=' + x,
        type: 'GET',
        success(res) {
          res = JSON.parse(res);
          let opt = '';
          for (let i = 0; i < res.length; i++) {
            opt += '<option value="' + res[i].route_id + '">' + res[i].route_name + '</option>';
          }
          document.getElementById('route').innerHTML = opt;
          document.getElementById('user_id').innerHTML = a;
          $('#hide_nec').show();

        }
      })
    }
  </script>
</body>

</html>