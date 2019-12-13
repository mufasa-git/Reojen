<?php

require("../connect/db.php");

global $connection;

$active_tab = "students";
require_once('base.php');
$BaseClassObject = new Base();
$content = "home.php";

$BaseClassObject->loadView($active_tab);
$where = 1;
//$pending = $BaseClassObject->getAllData('pending', $where);

$pnd = $connection->query("select * from pending order by date desc");

while($rows = $pnd->fetch_assoc()){
	$pending[] = $rows;
}

?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Deposits </b></h1></span>
                            <!-- <span>
                                <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right" style="margin: -3px 0px 0px 0px;">Add
                                </a>
                            </span> -->
                        </div>

                        <div class="box-body">
                            <table class="col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="chkAll"></th>
                                    <th>Date Time</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Amount</th>
                                    <th>MTCN</th>
                                    <th>T/Q</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //                      dd($pending);
                                if (!empty($pending)) {
                                    foreach ($pending as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><input class="chkVal" type="checkbox" value="<?= $value['id'] ?>"><label
                                                        for="option"></label></td>
                                            <td><?= $value['date'] ?></td>
                                            <td><?= $value['first_name'] ?></td>
                                            <td><?= $value['originating_country'] ?></td>
                                            <td><?= $value['amount'] ?></td>
                                            <td><?= $value['mtcn'] ?></td>
                                            <td><?= ((isset($value['question']) && isset($value['answer'])) && (!empty($value['question']) && !empty($value['answer']))) ? 'Yes' : 'No' ?></td>
                                            <td>
                                                <a href="view_deposite.php?pid=<?= $value['id'] ?>" type="button"
                                                   class="btn btn-xs btn-primary" style="margin: 2px;">
                                                    View
                                                </a>
                                                <a href=""
                                                   onclick="return confirmDelete('../query.php?s_id=<?= $value['id'] ?>');"
                                                   data-toggle="modal" type="button"
                                                   class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;"
                                                   data-id="<?php echo $value['id']; ?>">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                                </tbody>
                            </table>
							<table>
								<tr>
									<td>Go to page: <input type="text" id="pageSearch_text" style="width:30px;border: 1px solid rgb(164, 156, 156);"></input> <button class="btn bg-info" id="page_search">GO</button></td>
								</tr>
							</table>
                            <button id="delAll" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <script type="text/javascript">
        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this?")) {
                window.location.href = url;
            }
            else {
                return false;
            }
        }
        $(document).ready(function () {
            // to delete multiple files
            $("#delAll").click(function () {
                if (confirm("Are you sure you want to delete selected records?")) {
                    var id = [];
                    var count = 0;
                    $('.chkVal').each(function (index) {
                        if ($(this).prop('checked')) {
                            id[count] = $(this).val();
                            count++;
                        }
                    });
                    if (id.length !== 0) {
                        $.ajax({
                            type: "POST",
                            url: "../query.php?del_id=1",
                            data: {data: id},
                            success: function (result) {
                                if (result);
                                {
                                    alert('Deleted successfully');
                                    window.location.reload();
                                }
                            }
                        });
                    }
                    else {
                        alert('Please select atleast one row');
                    }
                }
                else {
                    return false;
                }
            });           //for check all
            $('#chkAll').click(function () {
                if ($(this).prop('checked')) {
                    $('.chkVal').prop('checked', true);
                }
                else {
                    $('.chkVal').prop('checked', false);
                }
            });
        });
    </script>
<?php
$BaseClassObject->getFooterView();
?>