<?php
$active_tab = "products";
require_once('base.php');
$BaseClassObject = new Base();
$BaseClassObject->loadView($active_tab);
$where = 1;
$pending = $BaseClassObject->getAllData('products',$where);

?>
<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header"> 
                <span><h1 class="box-title"><b> Products </b></h1></span>
                <!-- <span>
                    <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right" style="margin: -3px 0px 0px 0px;">Add
                    </a>
                </span> -->
            </div>
            
            <div class="box-body">
                <table class="col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered" id="sample_1">
                    <thead>
                      <tr>
                        <th>Sr.No. </th>
                        <th>Name </th>
                        <th>Price </th>
<!--
                        <th>Currency </th>
-->
                        <th>Text </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!empty($pending))
                        {
                        foreach ($pending as $key => $value) 
                        {?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?=$value['name']?></td>
                                <td><?=$value['price']?></td>
<!--
                                <td><?php //$value['currency']?></td>
-->
                                <td><?=$value['text']?></td>
                                <td>
        <a href="viewProductInfo.php?pid=<?=$value['id']?>" type="button" class="btn btn-xs btn-success" style="margin: 2px;">View</a>
        <a href="editProductInfo.php?pid=<?=$value['id']?>" type="button" class="btn btn-xs btn-primary" style="margin: 2px;">
        Edit
        </a>
        <!-- <a href="" onclick="return confirmDelete('../query.php?s_id=<?=$value['id']?>');" data-toggle="modal" type="button" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;" data-id="<?php echo $value['id']; ?>">
        Delete
        </a> -->
        </td>
                            </tr>                           
                        <?php } }
                      ?>
                    </tbody>
                </table>
				<table>
					<tr>
						<td>Go to page: <input type="text" id="pageSearch_text" style="width:30px;border: 1px solid rgb(164, 156, 156);"></input> <button class="btn bg-info" id="page_search">GO</button></td>
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
