<?php
    if(!isset($_SESSION['username']) && $_SESSION['username']=='')
        redirect(base_url().'login');

    $main_url=base_url("assets/");

    $pname="";
    if(!empty($page_name) || isset($page_name))
        $pname=$page_name;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=$main_url?>vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?=$main_url?>vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?=$main_url?>vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- Summer Note 
    <link rel="stylesheet" href="<?=$main_url?>vendor/summernote/dist/summernote.css" />
    <link rel="stylesheet" href="<?=$main_url?>vendor/summernote/dist/summernote-bs3.css" />-->

    <link rel="stylesheet" href="<?=$main_url?>vendor/xeditable/bootstrap3-editable/css/bootstrap-editable.css" />
    <link rel="<?=$main_url?>vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css"/>

    <!-- Extra CSS DATATABLES -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css" />

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> -->
    
    
    <!-- Alert -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/sweetalert/lib/sweet-alert.css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=$main_url?>fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?=$main_url?>fonts/pe-icon-7-stroke/css/helper.css" />

    <link rel="stylesheet" href="<?=$main_url?>styles/style.css">
  

    <!-- Clock picker  -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/clockpicker/dist/bootstrap-clockpicker.min.css" />

    <!-- Select (Dropdown) -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/select2-3.5.2/select2.css">
    <link rel="stylesheet" href="<?=$main_url?>vendor/select2-bootstrap/select2-bootstrap.css">
    <link rel="stylesheet" href="<?=$main_url?>vendor/bootstrap-multiselect/dist/css/bootstrap-multiselect.css">

    <!-- File Upload Theme -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/jquery-file-upload/css/jquery.fileupload.css">

    <!-- Date range picker  -->
    <link rel="stylesheet" href="<?=$main_url?>vendor/date-range/daterangepicker.css" />

</head>
<body class="fixed-sidebar fixed-footer fixed-small-header fixed-navbar"><!-- fixed-small-header  fixed-navbar  -->
    
    <!-- Simple splash screen-->
    <div class="splash">
        <div class="color-line"></div>
        <div class="splash-title">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div id="header">
        <div class="color-line">
        </div>
        <div id="logo" class="light-version">
            <span>
                Name Industry
            </span>
        </div>
        <nav role="navigation">
            <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
            <div class="small-logo">
                <span class="text-primary">Name Industry</span>
            </div>
            <!-- <form role="search" class="navbar-form-custom" method="post" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search something special" class="form-control" name="search">
                </div>
            </form> -->
            <!-- <div class="navbar-right">
                <ul class="nav navbar-nav no-borders">
                    <li class="dropdown">
                        <a href="<?=base_url("logout")?>">
                            <i class="pe-7s-upload pe-rotate-90"></i>
                        </a>
                    </li>
                </ul>
            </div> -->
        </nav>
    </div>

    <!-- Navigation -->
    <aside id="menu">
        <div id="navigation">
            <div class="profile-picture">
                <div class="stats-label text-color">
                    <span class="font-extra-bold"><?=$this->session->userdata('username')?></span><!--  font-uppercase -->

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <small class="text-muted">Admin <b class="caret"></b></small>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?=base_url("ChangePassword")?>"><i class="fa fa-gear"></i> &nbsp; Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url("logout")?>"><i class="fa fa-sign-out"></i> &nbsp; Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav" id="side-menu">
                <li <?php if($pname=="dashboard") echo 'class="active"'; ?>>
                    <a href="<?php echo base_url("Dashboard")?>"> <i class="fa fa-dashboard"></i> &nbsp; <span class="nav-label">Dashboard</span> </a>
                </li>
			</ul>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div id="wrapper">
        
        <?php echo $data; ?>
        
        <!-- Footer-->
        <footer class="footer">
            <!--<span class="pull-right">
                Example text
            </span>-->
            Beachcombers @copyright <?=date("Y")?>
        </footer>

    </div>

    <script type="text/javascript">
        var BASE_URL = '<?php echo base_url();?>';
    </script>

    <!-- Vendor scripts -->
    <script src="<?=$main_url?>vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?=$main_url?>vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?=$main_url?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?=$main_url?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=$main_url?>vendor/jquery-flot/jquery.flot.js"></script>
    <script src="<?=$main_url?>vendor/jquery-flot/jquery.flot.resize.js"></script>
    <script src="<?=$main_url?>vendor/jquery-flot/jquery.flot.pie.js"></script>
    <script src="<?=$main_url?>vendor/flot.curvedlines/curvedLines.js"></script>
    <script src="<?=$main_url?>vendor/jquery.flot.spline/index.js"></script>
    <script src="<?=$main_url?>vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?=$main_url?>vendor/iCheck/icheck.min.js"></script>
    <script src="<?=$main_url?>vendor/peity/jquery.peity.min.js"></script>
    <script src="<?=$main_url?>vendor/sparkline/index.js"></script>

    <!-- Summer Note 
    <script src="<?=$main_url?>vendor/summernote/dist/summernote.min.js"></script>-->

    <!-- Alert -->
    <script src="<?=$main_url?>vendor/sweetalert/lib/sweet-alert.min.js"></script>

    <!-- Extra JS DATATABLES-->
    <script src="<?=$main_url?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=$main_url?>vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- <script src="<?=$main_url?>vendor/datatables_plugins/select/dataTables.select.min.js"></script> -->

    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script> -->
    

    <!-- App scripts -->
    <script src="<?=$main_url?>scripts/homer.js"></script>
    <script src="<?=$main_url?>scripts/charts.js"></script>

    <!-- Bootstrap Date picker -->
    <script src="<?=$main_url?>vendor/moment/moment.js"></script>
    <script src="<?=$main_url?>vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- Clock picker  -->
    <script src="<?=$main_url?>vendor/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

    <!-- Select (Dropdown) -->
    <script src="<?=$main_url?>vendor/select2-3.5.2/select2.min.js"></script>
    <script src="<?=$main_url?>vendor/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>

    <!-- File Upload Theme -->
    <script src="<?=$main_url?>vendor/jquery-file-upload/js/jquery.fileupload.js"></script>

    <!-- <script src="<?=$main_url?>plugins/ckeditor.js"></script> -->
    <script src="<?=$main_url?>vendor/ckeditor/ckeditor.js"></script>

    <!-- Date range picker  -->
    <script src="<?=$main_url?>vendor/date-range/daterangepicker.js"></script>

    <?php /* ?>

    <script>

        $(function () 
        {
            $('.summernote').summernote();
        });

    </script>

    <?php */ ?>

</body>
</html>