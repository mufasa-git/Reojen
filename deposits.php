<?php require_once("libraries/helper.php");
session_start();
if (!isset($_SESSION['mob_id']) || !isset($_SESSION['user_name'])) {
    header('location:login.php');
}
require_once("header.php");
require_once("connect/db.php");
require_once ('query.php');
require_once("functions.php");
?>
<body>
    <div class="mainmenu-wrapper">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>
                        <li class="shopping-cart-items">
                            <i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="#"><b> Balance $<?php echo wallet();?></b></a>
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
    <div class="container custom-height">
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
                                                <th class="numeric">Amount (in USD)</th>
                                                <th class="numeric">MTCN</th>

                                                <th class="numeric">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        require_once("connect/db.php");
                                        global $connection;
                                        $sql = "SELECT *  FROM pending WHERE user_id = '" . $_SESSION['user_id'] . "' ORDER BY created_at desc ";
                                        $result = mysqli_query($connection, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            //$dt=explode(' ',date($row['created_at']));
                                            $dt = '';
                                            $time = '';
                                            if (!empty($row['date'])) {
                                                $dt = date("d-m-Y", strtotime($row['date']));
                                                $time = $row['time'];
                                            }
                                            echo '<td data-title="Date">' . $dt . ' ' . $time . '</td>';
                                            echo '<td data-title="Email"><div style="word-wrap: break-word; width: 200px;font-size: 10px;">' . $row['sender_email'] . '</div></td>';
                                            echo '<td data-title="Amount">' . $row['amount'] . '</td>';
                                            echo '<td data-title="MTCN">' . $row['mtcn'] . '</td>';
                                            $status = $row['status'] == 0 ? 'Pending' : 'Completed';
                                            echo '<td data-title="Status">' . $status . '</td></tr>';
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
//    $('#pending').dataTable( {
//	 "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0,1,2,3,4,5,6] }],
//		iDisplayLength: 10,
//		 bInfo: false,
//		  bLengthChange: false,
//		 bFilter: true,
//       pagingType: "simple_numbers",
//	    orderable: false,
//		"aaSorting": [  ]
//
//    } );


        $('#pending').dataTable();


    });
</script>