<?php
require_once '../CONFIG.php';
require_once '../scripts/inc_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>JI2A</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- plugins:css -->
    <?php include('partials/_plugins-css.html'); ?>
    <style>
        .fh5co-loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(./loader.gif) center no-repeat #fff;
        }
    </style>
</head>
<body>
    <div class="fh5co-loader"></div>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include('partials/_navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <?php include('partials/_settings-panel.html'); ?>
            <!-- partial:partials/_sidebar.html -->
            <?php include('partials/_sidebar.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <?php if (isset($_SESSION['welcome'])) : ?>
                                    <div id="alert" class="alert alert-info alert-dismissible fade show" role="alert" align="center">
                                        <b><?php echo $_SESSION['welcome']; ?></b>
                                    </div>
                                <?php unset($_SESSION['welcome']);
                                endif ?>
                            </div>
                        </div>
                    </div>                
                </div><!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include('partials/_footer.html'); ?>
            </div><!-- main-panel ends -->
        </div><!-- page-body-wrapper ends -->
    </div><!-- container-scroller ends-->
    <!-- plugins:js -->
    <?php include('partials/_plugins-js.html'); ?>
</body>
</html>