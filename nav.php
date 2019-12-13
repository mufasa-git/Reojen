<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
require_once 'functions.php';
?>
<?php
$link = $_SERVER['PHP_SELF'];
$page_name = basename($link);
$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();
$gateway = $connection->query('SELECT * FROM payment_gateway WHERE status="1" LIMIT 1')->fetch_assoc();

$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
<nav id="mainmenu" class="mainmenu">
    <ul>
        <li class="logo-wrapper" <?php select($page_name, 'index.php'); ?> >
            <a href="index.php"  >
                <img src="uploads/<?php echo $logo;  ?>" />
            </a>
        </li>
        <li <?php select($page_name, 'home.php'); ?> >
            <a href="home.php"  >Home</a>
        </li>

        <?php if (isLoggedIn()) {
            ?>
            <?php //if(isWesternUnionEnabled()) {  ?>
            <?php if ($nowType['value'] == 'WU') { ?>

                <li <?php select($page_name, 'addmoney.php'); ?> >
                    <a href="addmoney.php">Add money</a>
                </li>
                <li <?php select($page_name, 'deposits.php'); ?> >
                    <a href="deposits.php">Deposits</a>
                </li>

            <?php } elseif ($nowType['value'] == 'WT') { ?>
                <li  <?php select($page_name, 'add-money-via-wire-transfer.php'); ?>>
                    <a href="add-money-via-wire-transfer.php">Add money</a>
                </li>
                <li <?php select($page_name, 'western-union-deposits.php'); ?>>
                    <a href="western-union-deposits.php">Deposits</a>
                </li>

            <?php } elseif ($nowType['value'] == 'OP') { ?>
                <li  <?php select($page_name, 'okpay_money.php'); ?>>
                    <a href="okpay_money.php">Add money</a>
                </li>
                <li <?php select($page_name, 'western-union-deposits.php'); ?>>
                    <a href="western-union-deposits.php">Deposits</a>
                </li>            
            <?php } elseif ($nowType['value'] == 'SEPA') { ?>
                <li  <?php select($page_name, 'sepa-country.php'); ?>>
                    <a href="sepa-country.php">Add money</a>
                </li>
                <li <?php select($page_name, 'sepa-deposits.php'); ?>>
                    <a href="sepa-deposits.php">Deposits</a>
                </li> 
            <?php
            } else {
                $page = "";
                if ($gateway['slug'] == "BACS") {
                    $page = "add-money.php";
                } else if ($gateway['slug'] == "WU") {
                    $page = "addmoney.php";
                }else if ($gateway['slug'] == "WT") {
                    $page = "add-money-via-wire-transfer.php";
                }else if ($gateway['slug'] == "OP") {
                    $page = "okpay_money.php";
                }else if ($gateway['slug'] == "SEPA") {
                    $page = "sepa-country.php";
                }
                ?>
                <li  <?php select($page_name, $page); ?>>
				<?php if(isset($_SESSION['email']) && $_SESSION['email']!=""){?>
                    <a href="add-money.php">Add money</a>
                <?php }else{?>
					<a href="javascript:void(0);" onClick="div_show2();">Add money</a>
				<?php }?>
				</li>
            <?php } ?>

				
				 <li <?php select($page_name, 'support.php'); ?>>
            
					<?php if(isset($_SESSION['email']) && $_SESSION['email']!=""){?>
						<a href="support.php">Support</a>
					<?php }else{?>
						<a href="javascript:void(0);" onClick="div_show2();">Support</a>
					<?php }?>

				</li>
				
				
        <?php } else { ?>

        <!--<li <?php // select($page_name, 'insupport.php'); ?>>-->
            <?php // if (isLoggedIn()) { ?>
                <!--<a href="insupport.php">Support</a>-->
            <?php // } else { ?>
            <li <?php select($page_name, 'support.php'); ?>>
				<a href="support.php">Support</a>
            <?php // } ?>
        </li>
        <?php  } ?>
<!--         <li <?php //select($page_name, 'terms_condition.php'); ?> >
            <a href="terms_condition.php"  >Terms & Conditions</a>
        </li>-->
    </ul>
</nav>
