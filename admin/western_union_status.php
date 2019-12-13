<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


$active_tab = "Western union status";
require_once('base.php');
$BaseClassObject = new Base();

$BaseClassObject->loadView($active_tab);
$where = 'id = 1';

if ($_POST) {
    $post_arr = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $status = 0;
    $res = 1;
    foreach ($post_arr['transfer_type_id'] as $id) {

        $status = isset($post_arr['status'][$id]) ? 1 : 0;
        $condition = ['transfer_type_id' => $id];
        $data_arr = ['status' => $status, 'transfer_type_id' => $id];
        $r = $BaseClassObject->saveOrUpdateNew('western_union_status', $data_arr, $condition);
        $res = $res && $r;
    }

}
$all_status_query = $BaseClassObject->runSQL("select transfer_types.id as transfer_type_id, transfer_type_name, western_union_status.status
 from transfer_types left join western_union_status on transfer_types.id=western_union_status.transfer_type_id");

?>

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <?php
                        if (!empty($res)) {
                            echo '<div class="alert alert-success"> Western union status changed successfully </div>';
                        }
                        ?>
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Western union status </b></h1></span>
                            <span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post">

                                <table width="45%">
                                    <thead>
                                    <tr>
                                        <th>
                                            Transfer Type
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($status = mysqli_fetch_array($all_status_query)) { ?>
                                        <tr>
                                            <td>

                                                <?php echo @$status['transfer_type_name']; ?>

                                            </td>
                                            <?php
                                            @$selected = $status['status'];
                                            @$id = $status['transfer_type_id'];
                                            ?>
                                            <input type="hidden" name="transfer_type_id[]" value="<?php echo $id; ?>"/>
                                            <td>
                                                <input type="checkbox" <?php echo !empty($selected) ? 'checked=checked' : ''; ?>
                                                       name="status[<?php echo $id; ?>]"></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>
                                            <input type="Submit" value="Update Status" name="updt_status"
                                                   class="btn btn-success">
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
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