<?php
$active_tab = "students";
require_once('base.php');
$BaseClassObject = new Base();
//$content = "home.php";
if(!isset($_GET['pid']))
	header('Location:'.$_SERVER['HTTP_REFERER']);

$BaseClassObject->loadView($active_tab);
$where = 'id = '.$_GET['pid'];
$pending = $BaseClassObject->getAllData('pending',$where);

require_once("../connect/db.php");

?>

<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
			<div class="box-header"> 
				<span><h1 class="box-title"><b> Deposit Details </b></h1></span>
				<span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>
			</div>
			<div class="box-body table-responsive">
				<table class="table">
				    
				      <?php
				      	foreach ($pending as $key => $value) 
				      	{
							$contr = $connection->query("select Country from countrycode where Code='".$value['originating_country']."'");
							
							$country = $contr->fetch_assoc();
						?>
				      		
			      			<tr><th>Date Time</th><td><?=$value['created_at']?></td></tr>
			      			<tr><th>Name </th><td><?=$value['first_name']." ".$value['last_name']?></td></tr>
			      			<tr><th>Mobile No </th><td><?=$value['mobile_no']?></td></tr>
			      			<tr><th>Email </th><td><?=$value['sender_email']?></td></tr>
			      			<tr><th>Country </th><td><?=$country['Country']?></td></tr>
			      			<tr><th>Amount </th><td><?=$value['amount']?></td></tr>
			      			<tr><th>MTCN </th><td><?=$value['mtcn']?></td></tr>
			      			<tr><th>Security Question </th><td><?=$value['question']?></td></tr>
			      			<tr><th>Answer </th><td><?=$value['answer']?></td></tr>
			      			<tr><th>Status </th><td><?=$value['status']?></td></tr>
				      	<?php }
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