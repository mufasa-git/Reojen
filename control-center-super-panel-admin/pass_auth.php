<?php
    $active_tab = "pass_auth";
require_once('base.php');
$BaseClassObject = new Base();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection->query("UPDATE settings SET value='{$_POST['check_status']}' WHERE name='password_check'");
    $_SESSION['succ_msg'] = 'Record saved successfully';
        header('Location: pass_auth.php');
        exit();
}
$myrow = $connection->query('SELECT * FROM settings WHERE name="password_check" LIMIT 1')->fetch_assoc();


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
                                <label class="control-label col-md-3">Password Check <span class="required">*</span></label>
                                <div class="radio-list">                        
                                    <label class="radio-inline">
                                        <input type="radio" <?php echo ($myrow['value'] == '1') ? 'checked=checked' : ''; ?> name="check_status" value="1">YES
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" <?php echo ($myrow['value'] == '0') ? 'checked=checked' : ''; ?> name="check_status" value="0">NO
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