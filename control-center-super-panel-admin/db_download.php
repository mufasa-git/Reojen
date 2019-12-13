<?php

//~ header('Location: ../home.php');
//~ exit;
require("../connect/db.php"); //Establishing connection with our database
ob_start();
session_start();
global $connection;
?>
<?php 
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
 <?php
if(isset($_POST['explod'])){  
   $hostname = $_POST['hostname'];
   $dbname = $_POST['dbname'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $connections =new mysqli("$hostname", "$username", "$password", "$dbname"); // Establishing Connection with Server
    $db = mysqli_select_db($connections, "$dbname");
    if($db){
        EXPORT_TABLES("$hostname","$username","$password","$dbname");
    } else {
        $_SESSION['password_not_match'] = "true";
    }
    
//    $val = EXPORT_TABLES("$hostname","$username","$password","$dbname");
//    echo $val.'hi';
//    if(){
//        
//    }
}
function EXPORT_TABLES($host,$user,$pass,$name,  $tables=false, $backup_name=false ){
    $mysqli = new mysqli($host,$user,$pass,$name); $mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }   if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); }
    foreach($target_tables as $table){
        $result = $mysqli->query('SELECT * FROM '.$table);  $fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows;     $res = $mysqli->query('SHOW CREATE TABLE '.$table); $TableMLine=$res->fetch_row();
        $content = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";
        for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            while($row = $result->fetch_row())  { //when started (and every after 100 command cycle):
                if ($st_counter%100 == 0 || $st_counter == 0 )  {$content .= "\nINSERT INTO ".$table." VALUES";}
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  { $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ; }else {$content .= '""';}     if ($j<($fields_amount-1)){$content.= ',';}      }
                    $content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";} $st_counter=$st_counter+1;
            }
        } $content .="\n\n\n";
    }
     $backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
    header('Content-Type: application/octet-stream'); 
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"".$backup_name."\"");
    

 echo $content;
 exit;
}
?>
<head>
<?php date_default_timezone_set("Asia/Kolkata"); ?>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo isset($addr_data['company_name']) ? $addr_data['company_name'] : "Reojen"; ?></title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon"/>
    <link rel="icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>

    <link rel="shortcut icon" href="../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>
<!--    <link rel="icon" href="../img/favicon.ico" type="image/x-icon"/>

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>-->

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/icomoon-social.css">

    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="../css/leaflet.css" />

    <!--[if lte IE 8]>

        <link rel="stylesheet" href="css/leaflet.ie.css" />

    <![endif]-->

    <link rel="stylesheet" href="../css/main.css">

    <link href="../css/flags.css" rel="stylesheet">



    <script src="../js/jquery.flagstrap.js"></script>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/custom_validation.js"></script>

    <script src="../js/jquery.cookie.js"></script>

    <script src="../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->


    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper">
        <div class="container">

            <nav id="mainmenu" class="mainmenu">
                <ul>
                    <li class="logo-wrapper"><a href="index.php" style="border:none ! important;"><img src="../uploads/<?php echo $logo;  ?>" /></a></li>
                  </ul>
            </nav>
        </div>
    </div>

    <!-- Page Title -->
    <div class="section section-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Admin Panel Download Database</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="basic-login" style="margin: auto auto auto;width: 50%;">
                    <?php
							 	if(isset($_SESSION['password_not_match']) && $_SESSION['password_not_match']=="true")
								{
									?>
									<div class="alert alert-success" style="color: #F44336;">
										Credential not match.
									</div>
									<?php 
									$_SESSION['password_not_match']="false"; 
								} 
								?>
                         <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label for="hostname"><i class="icon-user"></i> <b>Host Name*</b></label>
                                <input name="hostname"  class="form-control" value="" id="login-username" type="text" placeholder="Host Name" autocomplete="off" required="">
                            </div>
                             <div class="form-group">
                                <label for="dbname"><i class="icon-user"></i> <b>Data Base Name*</b></label>
                                <input name="dbname"  class="form-control" value="" id="login-username" type="text" placeholder="Data Base Name" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="icon-user"></i> <b>Host User Name*</b></label>
                                <input name="username"  class="form-control" value="" id="login-username" type="text" placeholder="Host User Name" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="Password"><i class="icon-user"></i> <b>Password*</b></label>
                                <input name="password"  class="form-control" value="" id="login-username" type="password" placeholder="Password" autocomplete="off" required="">
                            </div>
                             
                            <div class="form-group">

                                <div class="clearfix"></div>
                                <button type="submit" class="btn pull-right" name="explod">Download</button>
                            </div>
                        </form>
<!-- <form class="form-horizontal" action="" method="post">
     <input type="text" name="localhost" value="" placeholder="localhost"/>
     <input type="submit" name="explod" value="download"/>
     <input type="submit" name="explod" value="download"/>
     <input type="submit" name="explod" value="download"/>
                                <input type="submit" name="explod" value="download"/>
  </form>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer -->
        
                       
<?php
require("../footer.php");
ob_end_flush();
?>
