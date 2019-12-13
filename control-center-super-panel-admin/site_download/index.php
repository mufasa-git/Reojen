<?php
require("../../connect/db.php"); //Establishing connection with our database
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
// Create ZIP file
//echo  $_SERVER['DOCUMENT_ROOT'];
if(isset($_POST['create'])){
	
	
	//header('Location: ../home.php');
	
	//exit;
    //~ $zip = new ZipArchive();

    //~ $filename = "./myzipfile.zip";

    //~ if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        //~ exit("cannot open <$filename>\n");
    //~ }

    //~ $dir = '/var/www/';
    //~ // Create zip
    //~ createZip($zip,$dir);

    //~ $zip->close();
    
    //Abhishek Start
    
    // Get real path for our folder
		$rootPath = realpath($_SERVER['DOCUMENT_ROOT']);

		// Initialize archive object
		$zip = new ZipArchive();
		$filename = "myzipfile.zip";

		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
			exit("cannot open <$filename>\n");
		}
		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($rootPath),
			RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file)
		{
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen($rootPath) + 1);

				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}

		// Zip archive will be created only after closing object
		$zip->close();
     
    //Abhishek End
   
    $filename = "myzipfile.zip";

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));

        flush();
        readfile($filename);
        // delete file
        unlink($filename);
    

    }
}

// Create zip
function createZip($zip,$dir){
    if (is_dir($dir)){
//echo is_dir($dir);
        if ($dh = opendir($dir)){
       //     echo readdir($dh); 
            while (($file = readdir($dh)) !== false){
//                  echo readdir($dh);
                // If file
                if (is_file($dir.$file)) {
//                    if($file != '' && $file != './' && $file != '..'){
//                       echo $dir.$file;
                        $zip->addFile($dir.$file); 
//                        $zip->addFile($dir.$file);
//                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){
                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);

                            $folder = $dir.$file.'/';
                      
                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }
                    
                }
                    
            }
            closedir($dh);
        }
    }
}

// Download Created Zip file
if(isset($_POST['download'])){
    
    $filename = "myzipfile.zip";

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));

        flush();
        readfile($filename);
        // delete file
        unlink($filename);
    

    }
}
?>
<!doctype html>
<?php date_default_timezone_set("Asia/Kolkata"); ?>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo isset($addr_data['company_name']) ? $addr_data['company_name'] : "Reojen"; ?></title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width">

    <!--<link rel="shortcut icon" href="../../img/logo.ico" type="image/x-icon"/>-->
    <!--<link rel="icon" href="../../uploads/<?php // echo $favicon;  ?>" type="image/x-icon"/>-->

    <link rel="shortcut icon" href="../../uploads/<?php echo $favicon;  ?>" type="image/x-icon"/>
<!--    <link rel="icon" href="../img/favicon.ico" type="image/x-icon"/>

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>-->

    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../css/icomoon-social.css">

    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="../../css/leaflet.css" />

    <!--[if lte IE 8]>

        <link rel="stylesheet" href="css/leaflet.ie.css" />

    <![endif]-->

    <link rel="stylesheet" href="../../css/main.css">

    <link href="../../css/flags.css" rel="stylesheet">
<!--<link href='style.css' rel='stylesheet' type='text/css'>--> 


    <script src="../../js/jquery.flagstrap.js"></script>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/custom_validation.js"></script>

    <script src="../../js/jquery.cookie.js"></script>

    <script src="../../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

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
                    <li class="logo-wrapper"><a href="index.php" style="border:none ! important;"><img src="../../uploads/<?php echo $logo;  ?>" /></a></li>
                  </ul>
            </nav>
        </div>
    </div>

    <!-- Page Title -->
    <div class="section section-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1>Download latest version (Web Site)</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="basic-login" style="margin: auto auto auto;width: 50%;">
                    
                            <!--<div class='container'>-->
                            <?php
if(isset($_POST['explod'])){  
  $username = $_POST['username'];
  $password =  md5(trim($_POST['password']));
 
   $sqls="SELECT * FROM site_db_download_config where username = '$username' and password = '$password' ORDER BY id ASC LIMIT 1";
   $results=mysqli_query($connection,$sqls);
   $rows=mysqli_fetch_array($results,MYSQLI_ASSOC);
    count($rows);
    if($rows>0){?>
                            <h3 style="text-align: center;">Create Zip and Download Zip file</h3>
                           
                            <form class="form-horizontal" method='post' action=''>
<!--
								<div class="form-group">
                                    <input style="margin-left: 20%;" class="btn " type='button' name='create' value='Website download' />&nbsp;
									<input style="" class="btn " type='button' name='create' value='DB Download' />
                                    
								</div>
-->
								
                                <div class="form-group">
                                    <input style="margin-left: 20%;" class="btn " type='submit' name='create' value='Website download' />&nbsp;
                                    <a target="_blank" class="btn " href="../db_download.php"> DB Download</a>
                                    
								</div>
                            </form>
       <?php 
    } else {
        $_SESSION['password_not_match'] = "true";
        if(isset($_SESSION['password_not_match']) && $_SESSION['password_not_match']=="true")
                            {
                                    ?>
                                    <div class="alert alert-success" style="color: #fff;background: #F44336;border: 1px solid transparent;">
                                            Credential not match.
                                    </div>
                                    <?php 
                                    $_SESSION['password_not_match']="false"; 
                            } 
        ?>
          <form class="form-horizontal" action="" method="post">
<!--                            <div class="form-group">
                                <label for="hostname"><i class="icon-user"></i> <b>Host Name*</b></label>
                                <input name="hostname"  class="form-control" value="" id="login-username" type="text" placeholder="Host Name" autocomplete="off" required="">
                            </div>-->
<!--                             <div class="form-group">
                                <label for="dbname"><i class="icon-user"></i> <b>Data Base Name*</b></label>
                                <input name="dbname"  class="form-control" value="" id="login-username" type="text" placeholder="Data Base Name" autocomplete="off" required="">
                            </div>-->
                            <div class="form-group">
                                <label for="username"><i class="icon-user"></i> <b>User Name*</b></label>
                                <input name="username"  class="form-control" value="" id="login-username" type="text" placeholder="Host User Name" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="Password"><i class="icon-user"></i> <b>Password*</b></label>
                                <input name="password"  class="form-control" value="" id="login-username" type="password" placeholder="Password" autocomplete="off" required="">
                            </div>
                             
                            <div class="form-group">

                                <div class="clearfix"></div>
                                <button type="submit" class="btn pull-right" name="explod">Submit</button>
                            </div>
                        </form>                  
    <?php }
}else { ?>
                            
                            <!--</div>-->
                            <?php
                            if(isset($_SESSION['password_not_match']) && $_SESSION['password_not_match']=="true")
                            {
                                    ?>
                                    <div class="alert alert-success" style="color: #fff;background: #F44336;border: 1px solid transparent;">
                                            Credential not match.
                                    </div>
                                    <?php 
                                    $_SESSION['password_not_match']="false"; 
                            } 
                            ?>
                         <form class="form-horizontal" action="" method="post">
<!--                            <div class="form-group">
                                <label for="hostname"><i class="icon-user"></i> <b>Host Name*</b></label>
                                <input name="hostname"  class="form-control" value="" id="login-username" type="text" placeholder="Host Name" autocomplete="off" required="">
                            </div>-->
<!--                             <div class="form-group">
                                <label for="dbname"><i class="icon-user"></i> <b>Data Base Name*</b></label>
                                <input name="dbname"  class="form-control" value="" id="login-username" type="text" placeholder="Data Base Name" autocomplete="off" required="">
                            </div>-->
                            <div class="form-group">
                                <label for="username"><i class="icon-user"></i> <b>User Name*</b></label>
                                <input name="username"  class="form-control" value="" id="login-username" type="text" placeholder="Host User Name" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="Password"><i class="icon-user"></i> <b>Password*</b></label>
                                <input name="password"  class="form-control" value="" id="login-username" type="password" placeholder="Password" autocomplete="off" required="">
                            </div>
                             
                            <div class="form-group">

                                <div class="clearfix"></div>
                                <button type="submit" class="btn pull-right" name="explod">Submit</button>
                            </div>
                        </form>
<?php }?>
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
require("../../footer.php");
ob_end_flush();
?>
