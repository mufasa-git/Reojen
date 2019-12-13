<?php 
require("../connect/db.php");
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="javascript:void(0)" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="../uploads/<?php echo $logo;  ?>" /></span>
            <!-- logo for regular state and mobile devices -->
           <span class="logo-lg"><img src="../uploads/<?php echo $logo;  ?>" /></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="admin_logout.php" id="logout" style="float:right;color:#FFF;padding:5px"><h4>Logout</h4></a>
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"><?php // echo $active_tab;
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
//        echo $uri_segments[2]; 
        ?>
            <!-- Sidebar user panel -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <!-- <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'sendMessage') ? 'active open' : ''; ?>">
          <a href="">
            <i class="fa fa-send"></i>
            <span>Send Message</span>            
          </a>          
        </li>  -->				
                <li class="<?php if($uri_segments[2]=='settings.php'){echo 'active open'; }else{ } ?>">
                    <a href="settings.php">  
                        <i class="fa fa-cog"></i>  
                        <span>Settings</span>    
                    </a>       
                </li>
                <li class="<?php if($uri_segments[2]=='home.php'){echo 'active open'; }else{ }  ?>">
                    <a href="home.php">
                        <i class="fa fa-group"></i>
                        <span>Deposits</span>
                    </a>
                </li>
                <li class="treeview <?php if($uri_segments[2]=='products.php'){echo 'active open'; }else{ } ?>">
                    <a href="products.php">
                        <i class="fa fa-product-hunt"></i><span>Change price</span>
                    </a>
                </li>

                <li class="treeview <?php if($uri_segments[2]=='user.php'){echo 'active open'; }else{ } ?>">
                    <a href="user.php">
                        <i class="fa fa-user"></i><span>Users</span>
                    </a>
                </li>
                 <li class="treeview <?php if($uri_segments[2]=='user_payment.php'){echo 'active open'; }else{ } ?>">
                    <a href="user_payment.php">
                        <i class="fa fa-user"></i><span>Users Payment Details</span>
                    </a>
                </li>
                <li class="treeview <?php if($uri_segments[2]=='change_pwd.php'){echo 'active open'; }else{ } ?>">
                    <a href="change_pwd.php">
                        <i class="fa fa-key"></i><span>Change Password</span>
                    </a>
                </li>

                <li class="treeview <?php if($uri_segments[2]=='change_payment_type.php'){echo 'active open'; }else{ } ?>">
                    <a href="change_payment_type.php">
                        <i class="fa fa-paypal"></i><span>Change Payment Method</span>
                    </a>
                </li>
                <li class="<?php if($uri_segments[2]=='pass_auth.php'){echo 'active open'; }else{ } ?>">
                    <a href="pass_auth.php">
                        <i class="fa fa-lock"></i>
                        <span>Password Authentication</span>
                    </a>
                </li>
				<li class="<?php if($uri_segments[2]=='change_address.php'){echo 'active open'; }else{ } ?>">
                    <a href="change_address.php">
                        <i class="fa fa-map-marker"></i>
                        <span>Change address</span>
                    </a>
                </li>
                <li class="<?php if($uri_segments[2]=='change_site_settings.php'){echo 'active open'; }else{ }  ?>">
                    <a href="change_site_settings.php">
                        <i class="fa fa-file"></i>
                        <span>Change site settings</span>
                    </a>
                </li>
<!--                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Change home page content') ? 'active open' : ''; ?>">
                    <a href="change_home_page_content.php">
                        <i class="fa fa-file"></i>
                        <span>Change home page content</span>
                    </a>
                </li>-->
                <li class="<?php if($uri_segments[2]=='change_dashboard_contents.php'){echo 'active open'; }else{ }  ?>">
                    <a href="change_dashboard_contents.php">
                        <i class="fa fa-file"></i>
                        <span>Change Pages contents</span>
                    </a>
                </li>
                <li class="<?php if($uri_segments[2]=='change_pwd_site_db_downlod.php'){echo 'active open'; }else{ } ?>">
                    <a href="change_pwd_site_db_downlod.php">
                        <i class="fa fa-key"></i>
                        <span>Change Password Site & DB <br/><p style="margin-left: 10%;">Download</p></span>
                    </a>
                </li>
                <li class="<?php if($uri_segments[2]==''){echo 'active open'; }else{ }  ?>">
                    <a href="http://139.59.163.223/control-center-super-panel-admin/site_download/" target="_blank">
                        <i class="fa fa-database"></i>
                        <span>Download Site & DB</span>
                    </a>
                </li>
        </section>
        <!-- /.sidebar -->
    </aside>

  


