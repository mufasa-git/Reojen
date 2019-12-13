<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$active_tab = "pass_auth";
require_once('base.php');
//if(!file_exists('functions.php'))
require_once('functions.php');

$BaseClassObject = new Base();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check_status = $_POST['check_status'];
    $sql = "UPDATE settings SET password_check='$check_status' WHERE 1 LIMIT 1";
    $query = $BaseClassObject->runSQL($sql);
    $myrow = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if ($check_status != "") {
        $_SESSION['succ_msg'] = 'Record saved successfully';
        header('Location: pass_auth.php');
        exit();
    } else {
        $_SESSION['err_msg'] = 'Can not modify the record';
        header('Location: pass_auth.php');
        exit();
    }
}

$sql = "SELECT * FROM settings WHERE id = 1 LIMIT 1";
$query = $BaseClassObject->runSQL($sql);
$myrow = mysqli_fetch_array($query, MYSQLI_ASSOC);


$BaseClassObject->loadView($active_tab);
//$sql = "SELECT * FROM settings WHERE id = 1 LIMIT 1";
//$query = $BaseClassObject->runSQL($sql);
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <span><h1 class="box-title"><b> Password Authentication for all users </b></h1></span>
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
                    <div class="box-body">
                        <form method="POST">
                            <div class="form-group">
                                <label class="control-label col-md-3">Status <span class="required">*</span></label>
                                <div class="radio-list">                        
                                    <label class="radio-inline">
                                        <input type="radio" <?php echo ($myrow['password_check'] == '1') ? 'checked=checked' : ''; ?> name="check_status" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" <?php echo ($myrow['password_check'] == '0') ? 'checked=checked' : ''; ?> name="check_status" value="0">NO
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-10 text-center">
                                <input type="Submit" value="Save" name="save" class="btn btn-success">
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