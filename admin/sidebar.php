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
        <a href="home.php" class="logo">
<!--            <img src="img/logo-admin-small.png" class="logo-mini"/>
            <img src="img/logo-admin.png" class="logo-lg"/>-->
            <img src="../uploads/<?php echo $logo;  ?>" class="logo-mini"/>
            <img src="../uploads/<?php echo $logo;  ?>" class="logo-lg"/>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="admin_logout.php" id="logout" style="float:right;color:#FFF;padding:5px"><h4>Logout</h4></a>
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <aside class="main-sidebar">
        <!-- sidebar -->
        <section class="sidebar">
            <ul class="sidebar-menu">
                <!-- <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'sendMessage') ? 'active open' : ''; ?>">
          <a href="">
            <i class="fa fa-send"></i>
            <span>Send Message</span>
          </a>
        </li>  -->
                <li class="treeview <?php echo (isset($active_tab) && trim($active_tab) == 'products') ? 'active open' : ''; ?>">
                    <a href="products.php">
                        <i class="fa fa-product-hunt"></i><span>Products</span>
                    </a>
                </li>

                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Western union details') ? 'active open' : ''; ?>">
                    <a href="home.php">
                        <i class="fa fa-group"></i>
                        <span>Western union details</span>
                    </a>
                </li>
                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Western union status') ? 'active open' : ''; ?>">
                    <a href="western_union_status.php">
                        <i class="fa fa-group"></i>
                        <span>Western union status</span>
                    </a>
                </li>
                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Change address') ? 'active open' : ''; ?>">
                    <a href="change_address.php">
                        <i class="fa fa-map-marker"></i>
                        <span>Change address</span>
                    </a>
                </li>
                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Change site settings') ? 'active open' : ''; ?>">
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
                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'Change dashboard contents') ? 'active open' : ''; ?>">
                    <a href="change_dashboard_contents.php">
                        <i class="fa fa-file"></i>
                        <span>Change dashboard contents</span>
                    </a>
                </li>
                <li class="<?php echo (isset($active_tab) && trim($active_tab) == 'CMS Management') ? 'active open' : ''; ?>">
                    <a href="cms_management.php">
                        <i class="fa fa-file"></i>
                        <span>CMS Management</span>
                    </a>
                </li>
        </section>
        <!-- /.sidebar -->
    </aside>




