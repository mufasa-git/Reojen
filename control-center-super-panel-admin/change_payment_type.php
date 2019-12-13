<?php
    $active_tab = "change_payment";
    require_once('base.php');
    $BaseClassObject = new Base();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connection->query("UPDATE settings SET value='{$_POST['payment_type']}' WHERE name='payment_type'");
    }
    $nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();
    $BaseClassObject->loadView($active_tab);
    $where = "user_id = 12" ;
    $user = $BaseClassObject->getAllData('users',$where);
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Change payment type </b></h1></span>
                            <span style="float: right;"><a href="change_payment_type.php" class="btn btn-primary">Back</a></span>
                        </div>
                        <div class="box-body ">
                            <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="payment_type" class="col-xs-2 col-lg-2 col-sm-4">Change type</label>
                                        <div class="col-xs-10 col-lg-10 col-sm-8">
                                            <select name="payment_type" id="type" class="form-control">
                                                <option value="WU" <?php if ($nowType['value'] == 'WU') echo "selected"; ?>>Western union</option>
                                                <option value="WT" <?php if ($nowType['value'] == 'WT') echo "selected"; ?>>Wire transfer</option>
                                                <option value="OP" <?php if ($nowType['value'] == 'OP') echo "selected"; ?>>OKPAY</option>
                                                <!--<option value="SEPA" <?php if ($nowType['value'] == 'SEPA') echo "selected"; ?>>SEPA</option>-->
                                                <option value="BACS" <?php if ($nowType['value'] == 'BACS') echo "selected"; ?>>BACS/FPS</option>
                                                <option value="PAYPAL" <?php if ($nowType['value'] == 'PAYPAL') echo "selected"; ?>>PAYPAL</option>
												
												<option value="SKRILL" <?php if ($nowType['value'] == 'SKRILL') echo "selected"; ?>>SKRILL</option>
												
                                                <option value="ADVCASH" <?php if ($nowType['value'] == 'ADVCASH') echo "selected"; ?>>ADVCASH</option>
												
												<option value="SKRILL_ADVCASH" <?php if ($nowType['value'] == 'SKRILL_ADVCASH') echo "selected"; ?>>SKRILL+ADVCASH</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group " style="float:right">
                                        <div class="col-xs-10 ">
                                            <span><input type="submit" name="update" class="btn btn-success" value="Save" ></span>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $BaseClassObject->getFooterView(); ?>
