<?php
$active_tab = "Western union details";
require_once('base.php');
$BaseClassObject = new Base();
if (!isset($_GET['pid']))
    header('Location:' . $_SERVER['HTTP_REFERER']);
$BaseClassObject->loadView($active_tab);
$id = $_GET['pid'];
$sql = "select * from pending left join countrycode on countrycode.id=pending.originating_country where pending.id=" . $id;
$query = $BaseClassObject->runSQL($sql);
?>

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Western union details </b></h1></span>
                            <span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>
                        </div>
                        <div class="box-body table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>First Name</td>
                                    <td>Middle Name</td>
                                    <td>Last Name</td>
                                    <td>Sender Email</td>
                                    <td>Country</td>
                                    <td>Money Sent Type</td>
                                    <td>Amount</td>
                                    <td>MCTN</td>
                                    <td>Western Union receipt Doc</td>
                                    <td>Date Time</td>

                                </tr>
                                </thead>
                                <?php
                                while ($pendings = mysqli_fetch_array($query)) {
                                    $dt = '';
                                    $time = '';
                                    if (!empty($pendings['date'])) {
                                        $dt = date('d-m-Y', strtotime($pendings['date']));
                                        $time = $pendings['time'];
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $pendings['first_name'] ?> </td>
                                        <td><?= $pendings['middle_name'] ?> </td>
                                        <td><?= $pendings['last_name'] ?> </td>
                                        <td><?= $pendings['sender_email'] ?></td>
                                        <td><?= $pendings['name'] ?></td>
                                        <td><?= $pendings['money_sent_type'] == 1 ? 'Sent In Person' : 'Sent Online'; ?></td>
                                        <td><?= $pendings['amount'] ?></td>
                                        <td><?= $pendings['mtcn'] ?></td>
                                        <td><a href="\wureceipt\<?= $pendings['wureceipt'] ?>"> Download </a></td>
                                        <td><?= $dt . ' ' . $time ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
$BaseClassObject->getFooterView();
?>