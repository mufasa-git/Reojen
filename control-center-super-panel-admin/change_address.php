<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$active_tab = "Change address";
require_once('base.php');
//if(!file_exists('functions.php'))
require_once('functions.php');

$BaseClassObject = new Base();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['company_name'] == '') {
        $_SESSION['err_msg'] = 'Please enter company name';
        header('location:change_address.php');
        exit();
    }
    if ($_POST['address_line1'] == '') {
        $_SESSION['err_msg'] = 'Please enter address line1';
        header('location:change_address.php');
        exit();
    }
    if ($_POST['city'] == '') {
        $_SESSION['err_msg'] = 'Please enter city';
        header('location:change_address.php');
        exit();
    }
    if ($_POST['post_code'] == '') {
        $_SESSION['err_msg'] = 'Please enter postal code';
        header('location:change_address.php');
        exit();
    }
    if ($_POST['country'] == '') {
        $_SESSION['err_msg'] = 'Please select country';
        header('location:change_address.php');
        exit();
    }
    //update data
    // $data=array();
    // foreach ($_POST as $key => $value)
    // {
    // 	$data[$key]=trim(mysqli_escape_string($connection,$value));
    // }

    //$where = "id =1";
    $where = array('id' => 1);
    $res = $BaseClassObject->saveOrUpdateNew('site_address', $_POST, $where);
    //$res = $BaseClassObject->upDateTable('site_address',$where,$data);
    if ($res) {
        $_SESSION['succ_msg'] = 'Record updated successfully';
        header('location:change_address.php');
        exit();
    } else {
        $_SESSION['err_msg'] = 'Can not modify the record';
        header('location:change_address.php');
        exit();
    }
}

$BaseClassObject->loadView($active_tab);
$id = 1;
$sql = "select * from site_address where id=" . $id;
$query = $BaseClassObject->runSQL($sql);
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Address  Details </b></h1></span>
                            <!--<span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>-->
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
                            <form class="form-horizontal" action="change_address.php" method="post">
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 col-lg-2 col-sm-4">Company name:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="company_name"
                                               value="<?php echo isset($data['company_name']) ? html_entity_decode(stripcslashes($data['company_name'])) : "" ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-xs-2 col-lg-2 col-sm-4">Street address:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="address_line1"
                                               value="<?php echo isset($data['address_line1']) ? html_entity_decode(stripcslashes($data['address_line1'])) : "" ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">City:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="city"
                                               value="<?php echo isset($data['city']) ? html_entity_decode(stripcslashes($data['city'])) : "" ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">State:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="state"
                                               value="<?php echo isset($data['state']) ? html_entity_decode(stripcslashes($data['state'])) : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Postal code:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="post_code"
                                               value="<?php echo isset($data['post_code']) ? html_entity_decode(stripcslashes($data['post_code'])) : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Country:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <select name="country" id="country" class="form-control">
                                            <option value="Select Country">Select Country</option>
                                            <?php
                                            getCountryDropdownAdmin(isset($data['country']) ? $data['country'] : "");
                                            ?>
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