<?php
include 'api/data.php';
checkLogin();

$id = $_GET['id'];
$provider = fetchServiceProvider($id);
$conn = mysqli_connect("localhost", "root", "", "profwaititu");
$qry = "SELECT * FROM service ORDER BY name ASC";
$res = mysqli_query($conn, $qry);
$services = array();
while ($row = mysqli_fetch_assoc($res)) {
    array_push($services, $row);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Dashboard
    </title>
    <link href="/components/dummy-assets/common/img/favicon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- VENDORS -->
    <!-- v2.1.0 -->
    <link rel="stylesheet" type="text/css" href="/vendors/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/vendors/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css"
          href="/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/chartist/dist/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/vendors/jquery-steps/demo/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="/vendors/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="/vendors/font-feathericons/dist/feather.css">
    <link rel="stylesheet" type="text/css" href="/vendors/font-linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="/vendors/font-icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="/vendors/font-awesome/css/font-awesome.min.css">
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/popper.js/dist/umd/popper.js"></script>
    <script src="/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="/vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src="/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="/vendors/spin.js/spin.js"></script>
    <script src="/vendors/ladda/dist/ladda.min.js"></script>
    <script src="/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="/vendors/autosize/dist/autosize.min.js"></script>
    <script src="/vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js"></script>
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="/vendors/summernote/dist/summernote.min.js"></script>
    <script src="/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/vendors/nestable/jquery.nestable.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.js"></script>
    <script src="/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="/vendors/d3/d3.min.js"></script>
    <script src="/vendors/c3/c3.min.js"></script>
    <script src="/vendors/chartist/dist/chartist.min.js"></script>
    <script src="/vendors/peity/jquery.peity.min.js"></script>
    <script src="/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/vendors/jquery-countTo/jquery.countTo.js"></script>
    <script src="/vendors/nprogress/nprogress.js"></script>
    <script src="/vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/vendors/dropify/dist/js/dropify.min.js"></script>
    <script src="/vendors/d3-dsv/dist/d3-dsv.js"></script>
    <script src="/vendors/d3-time-format/dist/d3-time-format.js"></script>
    <script src="/vendors/techan/dist/techan.min.js"></script>

    <!-- CLEAN UI HTML ADMIN TEMPLATE MODULES-->
    <!-- v2.1.0 -->
    <link rel="stylesheet" type="text/css" href="/components/core/common/core.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/core/widgets/widgets.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/vendors/common/vendors.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/settings/common/settings.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/settings/themes/themes.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/menu-left/common/menu-left.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/menu-top/common/menu-top.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/menu-right/common/menu-right.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/top-bar/common/top-bar.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/breadcrumbs/common/breadcrumbs.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/footer/common/footer.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/pages/common/pages.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/ecommerce/common/ecommerce.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/apps/common/apps.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/blog/common/blog.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/youtube/common/youtube.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/github/common/github.cleanui.css">
    <link rel="stylesheet" type="text/css" href="/components/docs/common/docs.cleanui.css">
    <script src="/components/menu-left/common/menu-left.cleanui.js"></script>
    <script src="/components/menu-top/common/menu-top.cleanui.js"></script>
    <script src="/components/menu-right/common/menu-right.cleanui.js"></script>
    <script src="/components/blog/common/blog.cleanui.js"></script>
    <script src="/components/github/common/github.cleanui.js"></script>


    <!-- PRELOADER STYLES-->
    <style>
        .cui-initial-loading {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDFweCIgIGhlaWdodD0iNDFweCIgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIiBjbGFzcz0ibGRzLXJvbGxpbmciPiAgICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBuZy1hdHRyLXN0cm9rZT0ie3tjb25maWcuY29sb3J9fSIgbmctYXR0ci1zdHJva2Utd2lkdGg9Int7Y29uZmlnLndpZHRofX0iIG5nLWF0dHItcj0ie3tjb25maWcucmFkaXVzfX0iIG5nLWF0dHItc3Ryb2tlLWRhc2hhcnJheT0ie3tjb25maWcuZGFzaGFycmF5fX0iIHN0cm9rZT0iIzAxOTBmZSIgc3Ryb2tlLXdpZHRoPSIxMCIgcj0iMzUiIHN0cm9rZS1kYXNoYXJyYXk9IjE2NC45MzM2MTQzMTM0NjQxNSA1Ni45Nzc4NzE0Mzc4MjEzOCIgdHJhbnNmb3JtPSJyb3RhdGUoODQgNTAgNTApIj4gICAgICA8YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgY2FsY01vZGU9ImxpbmVhciIgdmFsdWVzPSIwIDUwIDUwOzM2MCA1MCA1MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxcyIgYmVnaW49IjBzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlVHJhbnNmb3JtPiAgICA8L2NpcmNsZT4gIDwvc3ZnPg==);
            background-color: #f2f4f8;
        }

        .form-control {
            height: 42px !important;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('.cui-initial-loading').delay(200).fadeOut(400);
            $('select').selectpicker();
        })
    </script>
</head>

<body class="cui-config-borderless cui-menu-left-toggled cui-menu-colorful cui-menu-left-shadow">
<div class="cui-initial-loading"></div>
<div class="cui-layout cui-layout-has-sider">
    <div class="cui-menu-right">
        <div class="cui-menu-right-inner">
            <div class="cui-menu-right-header">
                <span class="fa fa-times pull-right cui-menu-right-action-toggle"><!-- --></span>
                Theme Settings
            </div>
            <div class="cui-menu-right-content">
                <div class="cui-menu-right-descr">
                    This module "block-menu-right" gives possibility to construct custom blocks with any
                    widgets, components and elements inside, like this theme settings
                </div>
                <div class="cui-menu-right-label">
                    Theme Style
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value=""/> Dark
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value="cui-theme-light"/> Light
                            </label>
                        </div>
                    </div>
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value="cui-theme-green"/> Green
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value="cui-theme-blue"/> Blue
                            </label>
                        </div>
                    </div>
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value="cui-theme-red"/> Red
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-theme" value="cui-theme-orange"/> Orange
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cui-menu-right-label">
                    Menu Shadow
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-shadow" value="cui-menu-left-shadow"/> On
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-shadow" value=""/> Off
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cui-menu-right-label">
                    Borderless Cards
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-borderless" value="cui-config-borderless"/> On
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-borderless" value=""/> Off
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cui-menu-right-label">
                    Squared Corners
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-corners" value="cui-config-squared-corners"/> On
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-corners" value=""/> Off
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cui-menu-right-label">
                    Fixed Width
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-boxed" value="cui-config-fixed-width"/> On
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-boxed" value=""/> Off
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cui-menu-right-label">
                    Colorful Menu
                </div>
                <div class="cui-menu-right-setting cui-menu-right-example-option">
                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-colorful" value="cui-menu-left-colorful"/> On
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-default">
                                <input type="radio" name="options-colorful" value=""/> Off
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="cui-menu-left">
        <div class="cui-menu-left-trigger cui-menu-left-trigger-action"></div>
        <div class="cui-menu-left-handler">
            <div class="cui-menu-left-handler-icon"></div>
        </div>
        <div class="cui-menu-left-inner">
            <div class="cui-menu-left-logo">
                <a href="dashboards-alpha.html">
                    <img
                            class="cui-menu-left-logo-default"
                            src="/components/dummy-assets/common/img/logo-inverse.png"
                            alt=""
                    />
                    <img
                            class="cui-menu-left-logo-toggled"
                            src="/components/dummy-assets/common/img/logo-mobile.png"
                            alt=""
                    />
                </a>
            </div>
            <?php include 'common/menu.php' ?>

        </div>
    </nav>
    <div class="cui-layout">
        <div class="cui-layout-content">
            <nav class="cui-breadcrumbs cui-breadcrumbs-bg">

          <span class="font-size-18 d-block">
              <strong><a href="/">Dashboard ></a> </strong>
            <span class="text-muted">Add Service Provider</span>
          </span>
            </nav>
            <div class="cui-utils-content">
                <!-- START: forms/form-wizard -->
                <form action="/admin/api/servicep.php" method="post" class="form" enctype="multipart/form-data">

                    <section class="card">
                        <div class="card-body">
                            <input type="hidden" name="request" value="update"/>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="row">

                                <div class="col-lg-12">
                                    <h5 class="text-black"><strong>Service Provider Information</strong></h5>
                                    <p class="text-muted">Fill in all fields</p>


                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">First Name</label>
                                            <input type="text" placeholder="First Name" name="fname" , required
                                                   maxlength="50" value="<?php echo $provider['fname']; ?>"
                                                   class="form-control">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" placeholder="Last Name" name="lname" required
                                                   maxlength="50" value="<?php echo $provider['lname']; ?>"
                                                   class="form-control">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Organisation Name</label>
                                            <input type="text" placeholder="Organisation Name" name="oname" required
                                                   maxlength="50" value="<?php echo $provider['oname']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">Age</label>
                                            <input type="number" placeholder="Age" name="age" required max="100" min="15" value="18"
                                                   class="form-control" value="<?php echo $provider['age']; ?>" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">ID Number</label>
                                            <input type="text" placeholder="ID Number" name="idnumber" required
                                                   maxlength="8" class="form-control" value="<?php echo $provider['idnumber']; ?>" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Gender</label>
                                            <select name="gender" required class="form-control">
                                                <option value="">-select-</option>
                                                <option <?php if ($provider['gender'] == 'male') echo 'selected';?> value="male">Male</option>
                                                <option  <?php if ($provider['gender'] == 'female') echo 'selected';?> value="female">Female</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">Email</label>
                                            <input type="email" placeholder="Email Address" name="email" required maxlength="100"
                                                   class="form-control" value="<?php echo $provider['email']; ?>" >
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Town</label>
                                            <input type="text" placeholder="Town" name="town" required
                                                   maxlength="100" class="form-control" value="<?php echo $provider['town']; ?>" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Estate</label>
                                            <input type="text" placeholder="Estate" maxlength="100" required
                                                   name="estate" class="form-control" value="<?php echo $provider['estate']; ?>">

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">Tel</label>
                                            <input type="text" placeholder="Tel" name="tel" required maxlength="20"
                                                   class="form-control" value="<?php echo $provider['tel']; ?>">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Education</label>
                                            <input type="text" placeholder="Education" name="education" required
                                                   maxlength="100" class="form-control" value="<?php echo $provider['education']; ?>" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Course</label>
                                            <input type="text" maxlength="100" required placeholder="Course"
                                                   name="course" class="form-control" value="<?php echo $provider['course']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">Grade</label>
                                            <input type="text" placeholder="Grade" name="grade" required maxlength="20"
                                                   class="form-control" value="<?php echo $provider['grade']; ?>">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Prof</label>
                                            <input type="text" placeholder="Prof" name="prof" required
                                                   maxlength="100" class="form-control" value="<?php echo $provider['prof']; ?>" />
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Address</label>
                                            <input type="text" maxlength="100" required placeholder="Address"
                                                   name="address" class="form-control" value="<?php echo $provider['address']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="firstName">Pass</label>
                                            <input type="text" placeholder="Pass" name="pass" required maxlength="20"
                                                   class="form-control" value="<?php echo $provider['pass']; ?>">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="lastName">Message</label>
                                            <input type="text" maxlength="100" required placeholder="Message"
                                                   name="message" class="form-control" value="<?php echo $provider['message']; ?>">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Services</label>
                                            <select name="services[]" required multiple data-live-search="true" class="form-control" >
                                                <?php
                                                foreach ($services as $s) {
                                                    echo "<option value='". $s['tid'] ."'>". $s['name'] ."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <p class="text-muted">Confirm the information provided above before submitting</5>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <button class="btn btn-success btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
                <!-- END: forms/form-wizard -->

                <!-- START: page scripts -->
                <script>
                    ;(function ($) {
                        'use strict'
                        $(function () {
                            $('#example-icons').steps({
                                headerTag: 'h3',
                                bodyTag: 'section',
                                transitionEffect: 'slideLeft',
                                autoFocus: true,
                            })

                            $('#example-numbers').steps({
                                headerTag: 'h3',
                                bodyTag: 'section',
                                transitionEffect: 'slideLeft',
                                autoFocus: true,
                            })
                            $('#isOwner').on('change', function () {
                                let isOwner = $('#isOwner').val();
                                if (isOwner === "No") {
                                    window.location.href = "./mechanics.only.add";
                                }
                            })
                        })
                    })(jQuery)
                </script>


                <!-- END: page scripts -->
            </div>
        </div>
    </div>
</div>
</body>

</html>