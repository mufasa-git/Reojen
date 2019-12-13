<?php
    $active_tab = "change_currency";
    require_once('base.php');
    $BaseClassObject = new Base();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		if($_POST['currency_type']=="GBP"){
			$currency_symb='<i class="fa fa-gbp"></i>';
		}elseif($_POST['currency_type']=="USD"){
			$currency_symb='<i class="fa fa-usd"></i>';
		}elseif($_POST['currency_type']=="EUR"){
			$currency_symb='<i class="fa fa-eur"></i>';
		}
        $connection->query("UPDATE change_currency SET value='{$_POST['currency_type']}', currency_symbol='{$currency_symb}' WHERE name='currency_type'");
    
    }
    $nowType = $connection->query('SELECT * FROM change_currency WHERE name="currency_type" LIMIT 1')->fetch_assoc();
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
                            <span><h1 class="box-title"><b> Change currency type </b></h1></span>
                            <span style="float: right;"><a href="change_currency.php" class="btn btn-primary">Back</a></span>
                        </div>
                        <div class="box-body ">
                            <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="payment_type" class="col-xs-2 col-lg-2 col-sm-4">Change Currency</label>
                                        <div class="col-xs-10 col-lg-10 col-sm-8">
                                            <select name="currency_type" id="type" class="form-control">
												<option value="USD" <?php if ($nowType['value'] == 'USD') echo "selected"; ?>>USD</option>
                                                <option value="GBP" <?php if ($nowType['value'] == 'GBP') echo "selected"; ?>>GBP</option>
                                                <option value="EUR" <?php if ($nowType['value'] == 'EUR') echo "selected"; ?>>EUR</option>
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
