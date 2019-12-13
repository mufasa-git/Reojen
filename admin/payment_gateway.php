<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$active_tab = "payment_gateway";
require_once('base.php');
//if(!file_exists('functions.php'))
require_once('functions.php');

$BaseClassObject = new Base();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "UPDATE `payment_gateway` SET `status`='0' WHERE 1";
    $sql1 = "UPDATE `payment_gateway` SET `status`='1' WHERE slug='" . $_POST['payment_type']."'";

    $sql2 = "UPDATE `settings` SET `value`='".$_POST['payment_type']."' WHERE name='payment_type'";

//    $res = $BaseClassObject->saveOrUpdateNew('payment_gateway', $_POST, $where);
//    $res = $BaseClassObject->upDateTable('payment_gateway',$where,$data);
    $res1 = $BaseClassObject->runSQL($sql);
    $res = $BaseClassObject->runSQL($sql1);
    $res2 = $BaseClassObject->runSQL($sql2);
    if ($res) {
        $_SESSION['succ_msg'] = 'Record updated successfully';
        header('location:payment_gateway.php');
        exit();
    } else {
        $_SESSION['err_msg'] = 'Can not modify the record';
        header('location:payment_gateway.php');
        exit();
    }
}

$sql = "select * from payment_gateway where status='1'";
$query = $BaseClassObject->runSQL($sql);
$myrow = mysqli_fetch_array($query, MYSQLI_ASSOC);


$BaseClassObject->loadView($active_tab);
$sql = "select * from payment_gateway where 1";
$query = $BaseClassObject->runSQL($sql);
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <span><h1 class="box-title"><b> Payment Gateway </b></h1></span>
                        <span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>
                    </div>
                    <?php
                    if (isset($_SESSION['err_msg']) && $_SESSION['err_msg'] != '') {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $_SESSION['err_msg'];
                            unset($_SESSION['err_msg']);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['succ_msg']) && $_SESSION['succ_msg'] != '') {
                        ?>
                        <div class="alert alert-success">
                            <?php
                            echo $_SESSION['succ_msg'];
                            unset($_SESSION['succ_msg']);
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="box-body ">
                        <form class="form-horizontal" action="payment_gateway.php" method="post">

                            <div class="form-group">
                                <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Payment Gateway:</label>
                                <div class="col-xs-10 col-lg-10 col-sm-8">
                                    <select name="payment_type" id="payment_type" class="form-control">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <option <?= ($myrow['id'] == $row['id']) ? 'selected' : '' ?> value="<?= $row['slug'] ?>"><?= $row['gateway'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group " style="float:right">
                                <div class="col-xs-10 ">
                                    <span><input type="submit" class="btn btn-success" value="Save"></span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$BaseClassObject->getFooterView();
?>