<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$users = "";
$orders = "";
// Include config file
require_once "config/config.php";



// Query for the users
$sql = "SELECT COUNT(complaint_id) FROM complaints";
$results = $link->query($sql);

if ($results->num_rows > 0) {
// output data of each row
while($row_complaints = $results->fetch_assoc()) {
	$complaints = $row_complaints;
}
} else {
// nothing | 0 results
}




?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CampingMaasvalei | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	
	<!-- Get header from header.php -->
	<?php
	include ("header.php");
	?>
    
    <!-- Left side column. contains the logo and sidebar -->
    
	<!-- Get menu from menu.php -->
	<?php
	include ("menu.php");
	?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->

        <section class="content">
         <div class="row">
         <div class="col-md-3">
            <div class="box box-solid">
               <div class="box-header with-border">
               <h4 class="box-title">Draggable Events</h4>
               </div>
               <div class="box-body">
               <!-- the events -->
               <div id="external-events">
                  <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div>
                  <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
                  <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Do homework</div>
                  <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">Work on UI design</div>
                  <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">Sleep tight</div>
                  <div class="checkbox">
                     <label for="drop-remove">
                     <input type="checkbox" id="drop-remove">
                     remove after drop
                     </label>
                  </div>
               </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /. box -->
            <div class="box box-solid">
               <div class="box-header with-border">
               <h3 class="box-title">Create Event</h3>
               </div>
               <div class="box-body">
               <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                  <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                  <ul class="fc-color-picker" id="color-chooser">
                     <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                     <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                  </ul>
               </div>
               <!-- /btn-group -->
               <div class="input-group">
                  <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                  <div class="input-group-btn">
                     <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                  </div>
                  <!-- /btn-group -->
               </div>
               <!-- /input-group -->
               </div>
            </div>
         </div>
         <!-- /.col -->
         <div class="col-md-9">
            <div class="box box-primary">
               <div class="box-body no-padding">
               <!-- THE CALENDAR -->
               <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>April 2019</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 746px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 124px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2019-03-31"></td><td class="fc-day fc-widget-content fc-mon fc-today " data-date="2019-04-01"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-04-02"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-04-03"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-04-04"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-04-05"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-04-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2019-03-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-mon fc-today " data-date="2019-04-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-04-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-04-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-04-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-04-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-04-06"><span class="fc-day-number">6</span></td></tr></thead><tbody><tr><td rowspan="3"></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#f56954;border-color:#f56954"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td class="fc-event-container" rowspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00a65a;border-color:#00a65a"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td><td rowspan="3"></td><td rowspan="3"></td><td rowspan="3"></td><td rowspan="3"></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#0073b7;border-color:#0073b7"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00c0ef;border-color:#00c0ef"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 124px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-04-07"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-04-08"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-04-09"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-04-10"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-04-11"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-04-12"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-04-13"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-04-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-04-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-04-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-04-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-04-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-04-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-04-13"><span class="fc-day-number">13</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 124px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-04-14"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-04-15"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-04-16"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-04-17"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-04-18"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-04-19"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-04-20"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-04-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-04-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-04-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-04-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-04-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-04-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-04-20"><span class="fc-day-number">20</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 124px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-04-21"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-04-22"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-04-23"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-04-24"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-04-25"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-04-26"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-04-27"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-04-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-04-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-04-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-04-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-04-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-04-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-04-27"><span class="fc-day-number">27</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 124px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-04-28"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-04-29"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-04-30"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2019-05-01"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2019-05-02"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2019-05-03"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-05-04"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-04-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-04-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-04-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2019-05-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2019-05-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2019-05-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-05-04"><span class="fc-day-number">4</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/" style="background-color:#3c8dbc;border-color:#3c8dbc"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 126px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2019-05-05"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2019-05-06"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2019-05-07"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2019-05-08"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2019-05-09"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2019-05-10"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-05-11"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2019-05-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2019-05-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2019-05-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2019-05-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2019-05-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2019-05-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-05-11"><span class="fc-day-number">11</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /. box -->
         </div>
         <!-- /.col -->
         </div>
         <!-- /.row -->
      </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy;
            <script type = "text/javascript">
                var d = new Date();
                document.write(d.getFullYear());
            </script> <a href="https://ricardovdrakt.nl">RicardovdRakt</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- eigen script-->
<script src="js/script.js"></script>
</body>
</html>
