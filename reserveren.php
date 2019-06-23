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


// Error message
$error = false;
$success = false;

$errorMessage = "";
$successMessage = "";

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


// Get all locations
// Query for the users
$sql = "SELECT * FROM rooms";
$results = $link->query($sql);



$rooms = array();
while($row = mysqli_fetch_assoc($results)){
    array_push($rooms, $row);  
}


// If form post (on submit)
$arrayMonths = array(
    'jan' => '01',
    'feb' => '02',
    'mrt' => '03',
    'apr' => '04',
    'mei' => '05',
    'jun' => '06',
    'jul' => '07',
    'aug' => '08',
    'sep' => '09',
    'okt' => '10',
    'nov' => '11',
    'dec' => '12'
);

$arrayNumbers = array(
    '0',
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '-',
    '/',
);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //print_r($_POST);
    //echo "<br>";

    // $reservationArrive = $_POST['reservationArrive'];
    // $dateReplaceArrive = str_replace($arrayNumbers,"",$reservationArrive);
    // $dateReplaceArrive =  str_replace($dateReplaceArrive, $arrayMonths[$dateReplaceArrive],$reservationArrive);
    // $newDateArrive = date("y-m-d", strtotime($dateReplaceArrive));
    // $_POST['reservationArrive'] = $newDateArrive;

    // $reservationDeparture = $_POST['reservationDeparture'];
    // $dateReplaceDeparture = str_replace($arrayNumbers,"",$reservationDeparture);
    // $dateReplaceDeparture =  str_replace($dateReplaceDeparture, $arrayMonths[$dateReplaceDeparture],$reservationDeparture);
    // $newDateDeparture = date("y-m-d", strtotime($dateReplaceDeparture));
    // echo $newDateDeparture;
    // $_POST['reservationDeparture'] = $newDateDeparture;

    // echo "<br>";
    // echo str_replace("mei","05",$dateTest);


    $reservationArrive = $_POST['reservationArrive'];
    $reservationArrive = date("y-m-d", strtotime($reservationArrive));
    $_POST['reservationArrive'] = $reservationArrive . " 00:00:00";

    $reservationDeparture = $_POST['reservationDeparture'];
    $reservationDeparture = date("y-m-d", strtotime($reservationDeparture));
    $_POST['reservationDeparture'] = $reservationDeparture . " 00:00:00";


    $error = false;
    $success = false;



    if (empty($_POST['room']) ) {

        // Show error
        $error = true;
        // Set error message
        $errorMessage = "Er is geen plaats of kamer geselecteerd, reservering niet geplaatst";
    }
    //elseif (empty($_POST['reservationArrive'] || empty($_POST['reservationDeparture']) ) {
    elseif (empty($_POST['reservationArrive']) || empty($_POST['reservationDeparture']) ) {

        // Show error
        $error = true;
        // Set error message
        $errorMessage = "Er is geen goede datum geselecteerd, reservering niet geplaatst";

    }
    elseif ($_POST['reservationArrive'] == $_POST['reservationDeparture']) {

        // Show error
        $error = true;
        // Set error message
        $errorMessage = "Je kunt alleen voor meer dan 1 dag huren, reservering niet geplaatst";

    }
    else {
        
        // Query for the users
        $sql = "INSERT INTO `reservations` (`user_id`, `arrival`, `departure`, `room_id`) VALUES ('" . $_SESSION['id'] . "', '" . $_POST['reservationArrive'] . "', '" . $_POST['reservationDeparture'] . "', '" . $_POST['room'] . "')";
        echo $sql;
        if (!mysqli_query($link,"$sql"))
        {
            // Set error message to true
            $error = true;

            // Duplicate error
            if (mysqli_errno($link) == 1062) {
                //$errorMessage = mysqli_error($link);
                $errorMessage = "Er is al een reservering voor deze datum geplaatst, neem een andere locatie of een ander tijdstip";

            }
            else {
                $errorMessage = "Error: " . mysqli_error($link);
            }
        }
        else {

            // Removes error if needed
            $error = false;

            // Show success message
            $success = true;

            // Set success message
            $successMessage = "De reservering voor plaats / kamer: " . $_POST['room'] . " is geplaatst.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DeliveryManager | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<!-- -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                Reserveren
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-paste"></i> Dashboard</a></li>
                <li class="active">Reserveren</li>
            </ol>
        </section>

        <!-- Main content -->

        <section class="content">
         <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
         <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Reserverings formulier</h3>
            </div>
            <div class="box-body">
                <form id="reservation" action="reserveren.php" method="post">
                    <div class="form-group">
                        <label>Voor en achternaam:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input id="name" type="text" name="name" class="form-control pull-right" value="<?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]); ?>">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Telefoonnummer:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;+(99) 99999999&quot;" data-mask="" value="<?php echo $_SESSION["phonenumber"]; ?>">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Email:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input type="text" name="email" class="form-control pull-right" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <!-- <div class="form-group">
                        <label>Datum aankomst:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="date" id="reservationArrive" class="form-control pull-right" name="reservationArrive" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div> -->
                    <!-- /.input group -->

                    <!-- <div class="form-group">
                        <label>Datum vertrek:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="date" id="reservationDeparture" class="form-control pull-right" name="reservationDeparture" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div> -->
                    <!-- /.input group -->

                    
                    <div class="form-group">
                        <label>Datum aankomst:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <!-- data-date-format="dd-mm-yyyy" -->
                            <input type="text" id="reservationArrive" class="datepicker form-control pull-right" name="reservationArrive" autocomplete="off" placeholder="dd-mm-yyyy">
                            <!--
                            <input type="text" id="reservationArrive" class="datepicker form-control pull-right" name="reservationArrive" autocomplete="off" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['reservationArrive'])) { echo $_POST['reservationArrive']; }?>">
                            -->
                        </div>
                    </div>

                    <!-- -->
                    <div class="form-group">
                        <label>Datum vertrek:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" id="reservationDeparture" class="datepicker form-control pull-right" name="reservationDeparture" autocomplete="off" placeholder="dd-mm-yyyy">
                            <!--
                            <input type="text" id="reservationDeparture" class="datepicker form-control pull-right" name="reservationDeparture" autocomplete="off" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['reservationDeparture'])) { echo $_POST['reservationDeparture']; }?>">
                            -->
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- -->

                    <div class="form-group">
                        <label>Plaats / kamer:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <select name="room" class="form-control">
                                
                                <?php
                                    //$rooms = array();
                                    $length = count($rooms);
                                    echo $length;
                                    if ($length <= 0) {
                                        echo "<option selected='true' disabled='disabled'>Geen kamers gevonden</option>";
                                    }
                                    else {
                                        echo "<option selected='true' disabled='disabled'>Selecteer een locatie</option>";
                                        for ($i = 0; $i < $length; $i++) {
                                            echo "<option value='" .  $rooms[$i]['room_id'] . "'>" . $rooms[$i]['number'] . "</option>";
                                            //print $rooms[$i];
                                        }
                                    }
                                    

                                ?>
                            </select>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <br>
                    
                    <button type="submit" class="btn btn-primary">Reserveren</button>
                    
                </form>
                <br>
                <?php
                // Error message
                if ($error == true) {
                    if ($errorMessage == "") {
                        echo "<div class='callout callout-danger'>";
                        echo "<h4>Foutmelding!</h4>";
    
                        echo "<p>Er is een fout opgetreden probeer het later nog een keer.</p>";    
                        echo "</div>";
                    }
                    else {
                        echo "<div class='callout callout-danger'>";
                        echo "<h4>Foutmelding!</h4>";
    
                        echo "<p>$errorMessage</p>";    
                        echo "</div>";
                    }
                }
                // Error message
                if ($success == true) {
                    if ($successMessage == "") {
                        echo "<div class='callout callout-success'>";
                        echo "<h4>Gelukt!</h4>";
    
                        echo "<p>De reservering is gelukt.</p>";    
                        echo "</div>";
                    }
                    else {
                        echo "<div class='callout callout-success'>";
                        echo "<h4>Gelukt!</h4>";
    
                        echo "<p>$successMessage</p>";    
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
         <!-- /.col -->
         </div>
         <div class="col-md-2"></div>
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
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->







<script>

$( document ).ready(function() {
    // $( "#reservation" ).submit(function( event ) {
    // alert( "Handler for .submit() called." );
    // event.preventDefault();
    // });
});

    
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    // //Date range picker
    // $('#reservations').daterangepicker()
    // //Date range picker with time picker
    // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD hh:mm A' })

    
    // //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //   {
    //     ranges   : {
    //       'Today'       : [moment(), moment()],
    //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
    //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
    //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     startDate: moment().subtract(29, 'days'),
    //     endDate  : moment()
    //   },
    //   function (start, end) {
    //     $('#daterange-btn span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'))
    //   }
    // )

    // //Date picker
    // $('#datepicker').datepicker({
    //   autoclose: true
    // })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- eigen script-->

<script src="js/script.js"></script>


<!-- Date Picker -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Date Picker -->

<script>

$( document ).ready(function() {
    // $( function() {
    //     $( "#datepicker" ).datepicker();
    // });
  
    // $( "#reservation" ).submit(function( event ) {
    // alert( "Handler for .submit() called." );
    // event.preventDefault();
    // });

    // var disableddates = ["20-05-2015", "12-11-2014", "12-25-2014", "12-20-2014"];
        
    $(function() {
        $.datepicker.regional['nl'] = {
            closeText: "Sluiten",
            prevText: "←",
            nextText: "→",
            currentText: "Vandaag",
            monthNames: [ "januari", "februari", "maart", "april", "mei", "juni",
            "juli", "augustus", "september", "oktober", "november", "december" ],
            monthNamesShort: [ "01", "02", "03", "04", "05", "06",
            "07", "08", "09", "10", "11", "12" ],
            dayNames: [ "zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag" ],
            dayNamesShort: [ "zon", "maa", "din", "woe", "don", "vri", "zat" ],
            dayNamesMin: [ "zo", "ma", "di", "wo", "do", "vr", "za" ],
            weekHeader: "Wk",
            dateFormat: "dd-mm-yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""
        };

        var disabledDates = ["2019-05-18","2015-11-14","2015-11-21"];

        $( ".datepicker" ).datepicker({
            beforeShowDay: function(date){
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [ disabledDates.indexOf(string) == -1 ]
            },
            prevText: "Vorige",
            nextText: "Volgende",

            numberOfMonths: 1, // Aantal selectors
            showOtherMonths: true, // Laat andere dagen van maanden zien
            showButtonPanel: true, // Today en Done buttons
            minDate: new Date(2007, 1 - 1, 1),
            currentText: "Vandaag", // Today button
            closeText: "Selecteer", // Done button
            dateFormat: 'dd-mm-yy',

        });
        $.datepicker.setDefaults($.datepicker.regional['nl']);
    });

    // jQuery(function($) {
    //     $('#datepicker').datepicker({
    //         dateFormat: "dd.m.yy",
    //         duration: '',
    //         changeMonth: false,
    //         changeYear: false,
    //         yearRange: '2010:2020',
    //         showTime: false,
    //         time24h: true
    //     });

    //     // $.datepicker.regional['cs'] = {
    //     //     closeText: 'Zavřít',
    //     //     prevText: '&#x3c;Dříve',
    //     //     nextText: 'Později&#x3e;',
    //     //     currentText: 'Nyní',
    //     //     monthNames: ['leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen',
    //     //     'září', 'říjen', 'listopad', 'prosinec'
    //     //     ],
    //     //     monthNamesShort: ['led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro'],
    //     //     dayNames: ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota'],
    //     //     dayNamesShort: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
    //     //     dayNamesMin: ['ne', 'po', 'út', 'st', 'čt', 'pá', 'so'],
    //     //     weekHeader: 'Týd',
    //     //     dateFormat: 'dd/mm/yy',
    //     //     firstDay: 1,
    //     //     isRTL: false,
    //     //     showMonthAfterYear: false,
    //     //     yearSuffix: ''
    //     // };

    //     $.datepicker.setDefaults({
    //         dateFormat: 'dd/mm/yy',
    //     });
    // });

    // $( function() {
        
    //     //$.datepicker.setDefaults($.datepicker.regional['it']);
    //     $( "#datepicker" ).datepicker();
    // } );
});
</script>

</body>
</html>
