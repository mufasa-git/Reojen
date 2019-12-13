<?php
session_start();
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>B2CMarketingTech</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/leaflet.css" />
        <!--[if lte IE 8]>

            <link rel="stylesheet" href="css/leaflet.ie.css" />

        <![endif]-->
        <link rel="stylesheet" href="css/main.css">   
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>
                            <li class="shopping-cart-items">
                                <i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="#"><b> Balance $0.00</b></a>
                            </li>
                            <li>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <span class="hidden-sm hidden-xs"> <?php echo (isset($_SESSION['CompanyName']) && !empty($_SESSION['CompanyName'])) ? $_SESSION['CompanyName'] : $_SESSION['user_name'] ?></span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="myaccount.php">My account</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Log out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php require_once 'nav.php'; ?>
            </div>
        </div>
        <div class="container">
            <h2>My Deposits</h2>
            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span5">
                    </div>
                    <div class="row">
                        <div class="box col-md-12 col-sm-12">
                            <div class="box-inner">              
                                <div >
                                    <div class="box-content table-responsive">
                                        <table class="col-md-12 col-sm-12 table-bordered table-striped table-condensed cf table" id="pending">
                                            <thead  class="cf">
                                                <tr>
                                                    <th class="numeric">Date & Time</th>
                                                    <th class="numeric">Email</th>
                                                    <th class="numeric">Amount (in BDT)</th>
                                                    <th class="numeric">MTCN</th>
                                                    <th class="numeric">Test Question</th>
                                                    <th class="numeric">Answer</th>
                                                    <th class="numeric">Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            require_once("connect/db.php");
                                            $result = mysqli_query($connection, "SELECT *  FROM pending WHERE mobile_no = '" . $_SESSION['mob_id'] . "' ORDER BY Date desc ");
                                            while ($row = mysqli_fetch_array($result)) {
                                                $dt = '';
                                                $time = '';
                                                if (!empty($row['date'])) {
                                                    $dt = date('d-m-Y', strtotime($row['date']));
                                                    $time = $row['time'];
                                                }
                                                echo '<tr>';
                                                $dt = explode(' ', date($row['Date']));
                                                /* date_default_timezone_set("Asia/Kolkata"); */
                                                //$ddt=date($row['Date'],strtotime($dt[0]));
                                                //echo '<td data-title="Date">' . $ddt.'<br>'.$dt[1] . '</td>';
                                                echo '<td data-title="Date">' . $dt . ' ' . $time . '</td>';
                                                echo '<td data-title="Email"><div style="word-wrap: break-word; width: 200px;font-size: 10px;">' . $row['email'] . '</div></td>';
                                                echo '<td data-title="Amount">' . $row['amount'] . '</td>';
                                                echo '<td data-title="MTCN">' . $row['mtcn'] . '</td>';
                                                echo '<td data-title="Test Question">' . (!empty($row['question']) ? $row['question'] : '  &nbsp;' ) . '</td>';
                                                echo '<td data-title="Answer">' . (!empty($row['answer']) ? $row['answer'] : '&nbsp;') . '</td>';
                                                echo '<td data-title="Status">' . $row['status'] . '</td></tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
<!-- </div> 
</div>
</div>
</div> -->
<script type="text/javascript">
    var table = document.getElementsByTagName('table')[0],
            rows = table.getElementsByTagName('tr'),
            text = 'textContent' in document ? 'textContent' : 'innerText';

    console.log(text);
</script>

<?php require("footer.php"); ?>
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script>

    $(document).ready(function () {
        $('#pending').dataTable({
            "aoColumnDefs": [{"bSortable": false, "aTargets": [0, 1, 2, 3, 4, 5, 6]}],
            iDisplayLength: 10,
            bInfo: false,
            bLengthChange: false,
            bFilter: true,
            pagingType: "simple_numbers",
            orderable: false,
            "aaSorting": []

        });
    });
</script>
