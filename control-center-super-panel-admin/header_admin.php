<!DOCTYPE html>
<?php
include '../redirection.php';
require_once '../amal-functions.php';
require_once '../functions.php';
$addr_data = getContactAddress();

?>
<?php 
require("../connect/db.php");
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($addr_data['company_name'])? $addr_data['company_name']:"Reojen"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>

    <link rel="shortcut icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>
  <!--<link rel="icon" href="../img/favicon.ico" type="image/x-icon"/>-->
        
        <!--<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>-->
  <link rel="stylesheet" href="../assets/css/demo.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
   --><!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/css/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/css/all-skins.css">
  <link rel="stylesheet" href="../assets/css/DT_bootstrap.css">
  <link rel="stylesheet" href="../assets/css/token-input-facebook.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/token-input.css"/>
  <!-- Date picker-->
  <link rel="stylesheet" href="../assets/css/datepicker.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../assets/js/jquery.js"></script> 
  <script src="../assets/js/jqueryMul.js"></script> 
  <script src="../assets/js/validate.js"></script>
  <script src="../assets/js/add-min.js"></script>
  <script src="../assets/js/j-validate.js"></script>
  <script src="../assets/js/a.js"></script>
  <script src="../assets/js/jqueryUi.js"></script> 
  <!--<script src="../../assets/js/nil.js"></script>-->
<style type="text/css">
  @media (min-device-width: 100px) and (max-device-width: 200px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }

  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
  }
  
  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 5px; 
    white-space: nowrap;
  }
}
@media screen and (max-width: 320px) {
     .table{border:none;padding:none;margin:none;word-spacing: none} 
}
.table { width: 100%; }
@media print {
  .container {
    width: auto;
    nav:none;
  }
}
 th{
    font-size: 15px !important;
  }
  #sample_1_filter{
    float: right !important;
  }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">