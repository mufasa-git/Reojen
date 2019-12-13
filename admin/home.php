<?php


/*$date = date_create('2000-01-01', timezone_open('Europe/Kiev'));
echo date_format($date, 'Y-m-d H:i:sP') . "\n";

exit;*/

$active_tab = "Western union details";
require_once('base.php');
$BaseClassObject = new Base();
$content = "home.php";

$BaseClassObject->loadView($active_tab);
$where = 1;
$query = $BaseClassObject->runSQL("select *,pending.id as pid from pending left join countrycode on countrycode.id=pending.originating_country WHERE is_deleted!=1 order by pid desc");
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Western union details </b></h1></span>
                        </div>

                        <div class="box-body">
                            <table class="col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="chkAll"></th>
                                    <th>Date and Time</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Amount (in USD)</th>
                                    <th>MTCN</th>
                                    <th>Status</th>									
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($pendings = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><input class="chkVal" type="checkbox" value="<?= $pendings['pid'] ?>"><label
                                                    for="option"></label>
                                        </td>
                                        <?php
                                        $dt = '';
                                        $time = '';
                                        if (!empty($pendings['date'])) {
                                            $dt = date("d-m-Y", strtotime($pendings['date']));
                                            $time = $pendings['time'];
                                        }
                                        echo '<td data-title="Date">' . $dt . ' ' . $time . '</td>';

                                        ?>
                                        <td><?= $pendings['first_name'] . ' ' . $pendings['middle_name'] . ' ' . $pendings['last_name'] ?></td>
                                        <td><?= $pendings['name'] ?></td>
                                        <td><?= $pendings['amount'] ?></td>
                                        <td><?= $pendings['mtcn'] ?></td>
                                        <td><?= $pendings['status'] == 0 ? 'Pending' : 'Complete'; ?></td>								
                                        <td>
                                            <a href="western_union_details.php?pid=<?= $pendings['pid'] ?>"
                                               type="button"
                                               class="btn btn-xs btn-primary" style="margin: 2px;">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Please select atleast one row</p>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="change-txt">Are you sure you want to delete selected records?</p>
                    <input type="hidden" id="wu_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary del_all">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            // to delete multiple files
            $("#delAll").click(function () {
                var id = [];
                var count = 0;
                $('.chkVal').each(function (index) {
                    if ($(this).prop('checked')) {
                        id[count] = $(this).val();
                        count++;
                    }
                });
                if (id.length == 0) {
                    $('#myModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    return false;
                }
                else {
                    $('#myModal2').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#wu_id').val(id);
                }
                // if (confirm("Are you sure you want to delete selected records?")) 
                // {
                //     if (id.length !== 0) 
                //     {
                //         $.ajax({
                //             type: "POST",
                //             url: "../query.php?del_id=1",
                //             data: {data: id},
                //             success: function (result) {
                //                 if (result);
                //                 {
                //                     alert('Deleted successfully');
                //                     window.location.reload();
                //                 }
                //             }
                //         });
                //     }
                // }
                // else 
                // {
                //     return false;
                // }
            });
            $(".del_all").click(function (e) {
                e.preventDefault();
                if ($('#wu_id').val() != '') {
                    $.ajax({
                        type: "POST",
                        url: "../query.php?del_wu_data=1",
                        data: {data: $('#wu_id').val()},
                        cache: false
                    }).success(function (result) {
                        if (result != 0) {
                            $('.change-txt').removeClass('alert alert-danger');
                            $('.change-txt').addClass('alert alert-success');
                            $('.change-txt').html('Record deleted successfully');
                            $('#wu_id').val('');
                            setTimeout(function () {
                                window.location.reload();
                            }, 400);
                        }
                        else {
                            $('.change-txt').removeClass('alert alert-success');
                            $('.change-txt').addClass('alert alert-danger');
                            $('.change-txt').html('Record can not deleted');
                        }
                    });
                }

            });
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