<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title> Register | The Vendors</title>

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
  <link rel="stylesheet" href="../../assets/vendor/libs/bs-stepper/bs-stepper.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
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

  <div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-2">
      <span class="app-brand-logo demo">
        <span style="color: var(--bs-primary)">
          <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z" fill="currentColor" />
            <path d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z" fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
            <path d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z" fill="currentColor" />
            <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="currentColor" />
            <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
            <path d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z" fill="currentColor" />
            <defs>
              <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-opacity="1" />
                <stop offset="1" stop-opacity="0" />
              </linearGradient>
              <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-opacity="1" />
                <stop offset="1" stop-opacity="0" />
              </linearGradient>
            </defs>
          </svg>
        </span>
      </span>
      <span class="app-brand-text demo text-heading fw-semibold">The Vendors</span>
    </a>
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
      <!-- Left Text -->
      <div class="d-none d-lg-flex col-lg-3 align-items-center justify-content-center p-12 mt-12 mt-xxl-0">
        <img alt="register-multi-steps-illustration" src="../../assets/img/illustrations/auth-register-multi-steps-illustration.png" class="h-auto mh-100 w-px-200" />
      </div>
      <!-- /Left Text -->

      <!--  Multi Steps Registration -->
      <div class="d-flex col-lg-9 align-items-center justify-content-center authentication-bg p-5">
        <div class="w-px-700 mt-12 mt-lg-0 pt-lg-0 pt-4">
          <div id="multiStepsValidation" class="bs-stepper wizard-numbered shadow-none">
            <div class="bs-stepper-header border-bottom-0 mb-2">
              <div class="step" data-target="#accountDetailsValidation">
                <button type="button" class="step-trigger ps-0">
                  <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">01</span>
                    <span class="d-flex flex-column ms-2">
                      <span class="bs-stepper-title">Account</span>
                      <span class="bs-stepper-subtitle">Account Details</span>
                    </span>
                  </span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#personalInfoValidation">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">02</span>
                    <span class="d-flex flex-column ms-2">
                      <span class="bs-stepper-title">Personal</span>
                      <span class="bs-stepper-subtitle">Enter Information</span>
                    </span>
                  </span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#billingLinksValidation">
                <button type="button" class="step-trigger">
                  <span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
                  <span class="bs-stepper-label">
                    <span class="bs-stepper-number">03</span>
                    <span class="d-flex flex-column ms-2">
                      <span class="bs-stepper-title">Billing</span>
                      <span class="bs-stepper-subtitle">Payment Details</span>
                    </span>
                  </span>
                </button>
              </div>
            </div>
            <div class="bs-stepper-content">
              <form id="multiStepsForm" name="register" onsubmit="return false">
                <!-- Account Details -->
                <div id="accountDetailsValidation" class="content">
                  <div class="content-header mb-5">
                    <h4 class="mb-1">Account Information</h4>
                    <span>Enter Your Account Details</span>
                    <p class="mb-2">

                      <a href="login.php" class="link">Already have an account?login</a>
                    </p>
                    <?php
                    if (isset($_GET['err'])) {
                    ?>
                      <div class="invalid-feedback">
                        Account already exists
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="row gx-5">
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" name="multiStepsUsername" id="multiStepsUsername" class="form-control" placeholder="johndoe" />
                        <label for="multiStepsUsername">Username</label>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="email" name="multiStepsEmail" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                        <label for="multiStepsEmail">Email</label>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle mb-5">
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <input type="password" id="multiStepsPass" name="multiStepsPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" />
                          <label for="multiStepsPass">Password</label>
                        </div>
                        <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="ri-eye-off-line"></i></span>
                      </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle mb-5">
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <input type="password" id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsConfirmPass2" />
                          <label for="multiStepsConfirmPass">Confirm Password</label>
                        </div>
                        <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="ri-eye-off-line"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" name="multiStepsCompany" id="multiStepsCompany" class="form-control" placeholder="The Vendors" aria-label="The Vendors" />
                        <label for="multiStepsCompany">Company Name</label>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev" disabled>
                        <i class="ri-arrow-left-line ri-16px me-sm-1_5 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1_5 me-0">Next</span>
                        <i class="ri-arrow-right-line ri-16px"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <!-- Personal Info -->
                <div id="personalInfoValidation" class="content">
                  <div class="content-header mb-5">
                    <h4 class="mb-1">Personal Information</h4>
                    <span>Enter Your Personal Information</span>
                  </div>
                  <div class="row gx-5">
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsFirstName" name="multiStepsFirstName" class="form-control" placeholder="John" />
                        <label for="multiStepsFirstName">First Name</label>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsLastName" name="multiStepsLastName" class="form-control" placeholder="Doe" />
                        <label for="multiStepsLastName">Last Name</label>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">NP (+977)</span>
                        <div class="form-floating form-floating-outline">
                          <input type="text" id="multiStepsMobile" name="multiStepsMobile" class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                          <label for="multiStepsMobile">Mobile</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsPincode" name="multiStepsPincode" class="form-control multi-steps-pincode" placeholder="Postal Code" maxlength="6" />
                        <label for="multiStepsPincode">Pincode</label>
                      </div>
                    </div>
                    <div class="col-md-12 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsAddress" name="multiStepsAddress" class="form-control" placeholder="Address" />
                        <label for="multiStepsAddress">Address</label>
                      </div>
                    </div>
                    <div class="col-md-12 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsArea" name="multiStepsArea" class="form-control" placeholder="Area/Landmark" />
                        <label for="multiStepsArea">Landmark</label>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsCity" class="form-control" placeholder="Jackson" />
                        <label for="multiStepsCity">City</label>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-5">
                      <div class="form-floating form-floating-outline">
                        <select id="multiStepsCountry" name="country" class="select2 form-select" data-allow-clear="true">
                          <option selected value="NP">Nepal</option>

                        </select>
                        <label for="multiStepsCountry">Country</label>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev">
                        <i class="ri-arrow-left-line ri-16px me-sm-1_5 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1_5 me-0">Next</span>
                        <i class="ri-arrow-right-line ri-16px"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <!-- Billing Links -->
                <div id="billingLinksValidation" class="content">
                  <div class="content-header mb-5">
                    <h4 class="mb-1">Select Plan</h4>
                    <span>Select plan as per your requirement</span>
                  </div>
                  <!-- Custom plan options -->
                  <div class="row gap-md-0 gap-4 mb-12 gx-5">
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="basicOption">
                          <span class="custom-option-body">
                            <span class="fs-6 d-block fw-medium text-heading mb-2">Basic</span>
                            <small>A simple start for start ups & Students</small>
                            <span class="d-flex justify-content-center py-2">
                              <sup class="text-primary small lh-1 mt-3">RS</sup>
                              <span class="h4 mb-0 text-primary">500</span>
                              <sub class="lh-1 mt-auto mb-3 text-muted small">/month</sub>
                            </span>
                          </span>
                          <input name="customRadioIcon" class="form-check-input" type="radio" value="1" id="basicOption" />
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="standardOption">
                          <span class="custom-option-body">
                            <span class="fs-6 d-block fw-medium text-heading mb-2">Standard</span>
                            <small>For small to medium businesses</small>
                            <span class="d-flex justify-content-center py-2">
                              <sup class="text-primary small lh-1 mt-3">RS</sup>
                              <span class="h4 mb-0 text-primary">1000</span>
                              <sub class="lh-1 mt-auto mb-3 text-muted small">/month</sub>
                            </span>
                          </span>
                          <input name="customRadioIcon" class="form-check-input" type="radio" value="2" id="standardOption" checked />
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-icon">
                        <label class="form-check-label custom-option-content" for="enterpriseOption">
                          <span class="custom-option-body">
                            <span class="fs-6 d-block fw-medium text-heading mb-2">Enterprise</span>
                            <small>Solution for enterprise & organizations</small>
                            <span class="d-flex justify-content-center py-2">
                              <sup class="text-primary small lh-1 mt-3">RS</sup>
                              <span class="h4 mb-0 text-primary">1500</span>
                              <sub class="lh-1 mt-auto mb-3 text-muted small">/month</sub>
                            </span>
                          </span>
                          <input name="customRadioIcon" class="form-check-input" type="radio" value="3" id="enterpriseOption" />
                        </label>
                      </div>
                    </div>
                  </div>
                  <!--/ Custom plan options -->
                  <div class="content-header mb-5">
                    <h4 class="mb-1">Payment Information</h4>
                    <span>Enter your card information</span>
                  </div>
                  <!-- Credit Card Details -->
                  <div class="row gx-5">
                    <div class="col-md-12 mb-5">
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <input id="multiStepsCard" class="form-control multi-steps-card" name="multiStepsCard" type="text" placeholder="1356 3215 6548 7898" aria-describedby="multiStepsCardImg" />
                          <label for="multiStepsCard">Card Number</label>
                        </div>
                        <span class="input-group-text cursor-pointer" id="multiStepsCardImg"><span class="card-type"></span></span>
                      </div>
                    </div>
                    <div class="col-md-5 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsName" class="form-control" name="multiStepsName" placeholder="John Doe" />
                        <label for="multiStepsName">Name On Card</label>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 mb-5">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="multiStepsExDate" class="form-control multi-steps-exp-date" name="multiStepsExDate" placeholder="MM/YY" />
                        <label for="multiStepsExDate">Expiry Date</label>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-5">
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <input type="text" id="multiStepsCvv" class="form-control multi-steps-cvv" name="multiStepsCvv" maxlength="3" placeholder="654" />
                          <label for="multiStepsCvv">CVV Code</label>
                        </div>
                        <span class="input-group-text cursor-pointer" id="multiStepsCvvHelp"><i class="ri-question-line" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                      <button class="btn btn-outline-secondary btn-prev">
                        <i class="ri-arrow-left-line ri-16px me-sm-1_5 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                      </button>
                      <button type="submit" name="create" class="btn btn-success btn-next btn-submit">
                        Submit <i class="ri-check-line ri-16px ms-1_5"></i>
                      </button>
                    </div>
                  </div>
                  <!--/ Credit Card Details -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- / Multi Steps Registration -->
    </div>
  </div>



  <!-- / Content -->

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
  <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
  <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
  <script src="../../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
  <script src="../../assets/vendor/libs/select2/select2.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="includes/js/register.js"></script>
</body>

</html>