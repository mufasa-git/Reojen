<?php
$active_tab = "products";
require_once('base.php');
$BaseClassObject = new Base();
//$content = "home.php";
if (!isset($_GET['pid']) && !isset($_POST['update']))
    header('Location:' . $_SERVER['HTTP_REFERER']);
if (isset($_POST['update'])) {
    //update data
   
    unset($_POST['update']);
    $where = "id =" . $_POST['id'];
    $res = $BaseClassObject->upDateTable('products', $where, $_POST);
    if ($res) {
        $success = "Record updated successfully.";
    } else {
        $error = "Can not modify the record.";
    }
}
$BaseClassObject->loadView($active_tab);
if (isset($_GET['pid']))
    $where = 'id = ' . $_GET['pid'];
else
    $where = "id =" . $_POST['id'];
$pending = $BaseClassObject->getAllData('products', $where);
?>

<div class="content-wrapper">        
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header"> 
                        <span><h1 class="box-title"><b> Product  Details </b></h1></span>
                        <span style="float: right;"><a href="products.php" class="btn btn-primary">Back</a></span>
                    </div>
                    <?php
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($success)) {
                        ?>
                        <div class="alert alert-success">
                            <?= $success ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="box-body ">
                        
                        <form class="form-horizontal" action="editProductInfo.php?<?= urldecode($_SERVER['QUERY_STRING'])?>" method="post">

                            <?php
                            foreach ($pending as $key => $value) {
                                ?>

                                <div class="form-group">
                                    <label for="name" class="col-xs-2 col-lg-2 col-sm-4">Name</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="name" value="<?= $value['name'] ?>" required>
                                        <input type="hidden" class="form-control" name="id" value="<?= $value['id'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-xs-2 col-lg-2 col-sm-4">Price </label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="price"  value="<?php echo isset($value['price']) ? $value['price'] : "" ?>" required>
                                    </div>
                                </div>
<!--
                                <div class="form-group">
                                    <label for="currency" class="col-xs-2 col-lg-2 col-sm-4">Currency </label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
										<select name ="currency" class="form-control" required>
											<option  value="">Select Currency</option>
											<option value="GBP" <?php // if($value['currency'] == "GBP"){ echo "selected='selected'"; } ?>>GBP</option>
											<option value="USD" <?php // if($value['currency'] == "USD"){ echo "selected='selected'"; } ?>>USD</option>
										</select>
                                        
                                    </div>
                                </div>
-->
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Text </label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="text" value="<?= $value['text'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group " style="float:right">					
                                    <div class="col-xs-10 ">
                                        <span><input type="submit" name="update" class="btn btn-success" value="Save" ></span> 							
                                    </div>			
                                </div>	
                            <?php }
                            ?>
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
