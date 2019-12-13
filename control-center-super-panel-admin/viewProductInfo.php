<?php
$active_tab = "Deposites";
require_once('base.php');
$BaseClassObject = new Base();
//$content = "home.php";
if(!isset($_GET['pid']))
	header('Location:'.$_SERVER['HTTP_REFERER']);

$BaseClassObject->loadView($active_tab);
$where = 'id = '.$_GET['pid'];
$pending = $BaseClassObject->getAllData('products',$where);
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
			<div class="box-body table-responsive">
				<table class="table">
				    
				      <?php
				      	foreach ($pending as $key => $value) 
				      	{?>
				      		
			      			<tr><th>Id</th><td><?=$value['id']?></td></tr>
			      			<tr><th>Name </th><td><?=$value['name']?></td></tr>
			      			<tr><th>Price</th><td><?=$value['price']?></td></tr>
			      			<tr><th>Currency</th><td><?=$value['currency']?></td></tr>
			      			<tr><th>Text </th><td><?=$value['text']?></td></tr>			      			
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
