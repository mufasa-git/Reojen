<?php

require("../connect/db.php");

global $connection;

$active_tab = "user";
require_once('base.php');
$BaseClassObject = new Base();
$content = "home.php";


if(isset($_POST['update']) && !empty($_POST['update']))
	{
		//update data
		//users_paypal_status
		//paypal_status
		$data=array();
		if(!empty($_POST["enable_paypal"])){
			
			unset($_POST['update']);
			//~ $where = "enable_paypal =0";
			$wh = "name ='paypal_status'";
			
			$data['status']=1;
			//~ $res = $BaseClassObject->upDateTable('users',$where,$_POST);
			$response = $BaseClassObject->upDateTable('payment_option_status',$wh,$data);
			if($response)
			{
				$success = "Record updated successfully.";
			}
			else
			{
				$error = "Can not modify the record.";
			}
		} else {
			
			$_POST["enable_paypal"]=0;
			unset($_POST['update']);
			//~ $where = "enable_paypal =1";
			
			$wh = "name ='paypal_status'";
			
			$data['status']=0;
			//~ $res = $BaseClassObject->upDateTable('users',$where,$_POST);
			$response = $BaseClassObject->upDateTable('payment_option_status',$wh,$data);
			if($response)
			{
				$success = "Record updated successfully.";
			}
			else
			{
				$error = "Can not modify the record.";
			}
			
			
			
		}
	}
	
	
	if(isset($_POST['update_spo']) && !empty($_POST['update_spo']))
	{
		//update data
		//users_paypal_status
		//paypal_status
		$data=array();
		if(!empty($_POST["enable_spo"])){
			
			unset($_POST['update_spo']);
			//~ $where = "enable_paypal =0";
			$wh = "name ='skrill_status'";
			
			$data['status']=1;
			//~ $res = $BaseClassObject->upDateTable('users',$where,$_POST);
			$response = $BaseClassObject->upDateTable('payment_option_status',$wh,$data);
			if($response)
			{
				$success = "Record updated successfully.";
			}
			else
			{
				$error = "Can not modify the record.";
			}
		} else {
			
			
			unset($_POST['update_spo']);
			//~ $where = "enable_paypal =1";
			
			$wh = "name ='skrill_status'";
			
			$data['status']=0;
			//~ $res = $BaseClassObject->upDateTable('users',$where,$_POST);
			$response = $BaseClassObject->upDateTable('payment_option_status',$wh,$data);
			if($response)
			{
				$success = "Record updated successfully.";
			}
			else
			{
				$error = "Can not modify the record.";
			}
			
			
			
		}
	}



$BaseClassObject->loadView($active_tab);
$where = 1;
//$users = $BaseClassObject->getAllData('users',$where);

$usr = $connection->query("select * from users order by date_of_creation desc");

while($rows = $usr->fetch_assoc()){
	$users[] = $rows;
}


$users_paypal_status = $connection->query("select * from payment_option_status where name='paypal_status'");
$paypal_status = $users_paypal_status->fetch_assoc();


$users_skrill_status = $connection->query("select * from payment_option_status where name='skrill_status'");
$skrill_status = $users_skrill_status->fetch_assoc();
//}

?>
<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header"> 
                <span><h1 class="box-title"><b> Users </b></h1></span>
                <!-- <span>
                    <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right" style="margin: -3px 0px 0px 0px;">Add
                    </a>
                </span> -->
                
                
                <?php 
				  if(isset($error))
				  {
					?>
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?=$error?>
					</div>
					
					
					
					<?php
				  }
				?>
				<?php 
				  if(isset($success))
				  {
					?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?=$success?>
					</div>
					<?php
				  }
				?>
                
                
                
            </div>
            <div class="box-body ">
				<form class="form-horizontal" action="user.php" method="post">
					<div class="form-group">
						<label for="enable_paypal" class="col-xs-3 col-lg-3 col-sm-5">Enable PayPal for all users <span style="margin-top: 0px !important;position: absolute;padding-left: 10px;"><input type="checkbox" name="enable_paypal" id="enable_paypal" value="1" <?php if(!empty($paypal_status['status'])) { echo "checked='checked'" ;}?>></span></label>
						<div class="col-xs-9 col-lg-9 col-sm-7">
						<span><input  type="submit" name="update" class="btn btn-success" value="Save" ></span> 		
						</div>
					</div>
					
				</form>		
			</div>
			<div class="box-body ">
				<form class="form-horizontal" action="user.php" method="post">
					<div class="form-group">
						<label for="enable_paypal" class="col-xs-3 col-lg-3 col-sm-5">Skrill payment option for all users <span style="margin-top: 0px !important;position: absolute;padding-left: 10px;"><input type="checkbox" name="enable_spo" id="enable_spo" value="1" <?php if(!empty($skrill_status['status'])) { echo "checked='checked'" ;}?>></span></label>
						<div class="col-xs-9 col-lg-9 col-sm-7">
						<span><input  type="submit" name="update_spo" class="btn btn-success" value="Save" ></span> 		
						</div>
					</div>
					
				</form>		
			</div>
        
            <div class="box-body">
                <table class="col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered" id="sample_1">
                    <thead>
                      <tr>
                        <th>
						<div style="float:left; width:35px;">
						<div style="float:left;margin-top:2px;margin-right:5px;">
						<img id="delAll" style="width:15px; height:15px; cursor:pointer; float:left;" src="../img/delete.png"> 
						</div>
						<div style="float:left;">
						<input style="float:left;" type="checkbox" id="chkAll">
						</div>
						</div>
						</th>
                        <th>Mobile <br>number </th>
                        <th>Name </th>
                        <th>Country </th>
                        <th>Company<br>Name </th>
						<th>Email</th>												
<!--
						<th>Reference number</th>	
-->
						<th>Date Of Creation</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!empty($users))
                        {
                          foreach ($users as $key => $value) 
                          {							 $email_address = $value['Email'];							  if($email_address==""){								  $email_address = '-';							  }							  $reference_number = $value['reference_number'];							  if($reference_number==""){								  $reference_number = '-';							  }
                      ?>
                            <tr>
                                <td><input class="chkVal" type="checkbox" value="<?=$value['user_id']?>"><label for="option"></label></td>
                                <td><?=$value['mobile_no']?></td>
                                <td><?=$value['fname'].' '.$value['mname'].' '.$value['lname']?></td>
                                <td><?=$value['Country']?></td>
                                <td><?=$value['CompanyName']?></td>					
                                <td><?php echo $email_address;?></td>	
<!--
                                <td><?php // echo $reference_number;?></td>								
-->
								<td><?=($value['date_of_creation'] != 0) ? date("Y-m-d H:i:s",$value['date_of_creation']) : "" ?></td>								
                                <td>
                                <a href="edit_user.php?pid=<?=$value['user_id']?>" type="button" class="btn btn-xs btn-primary" style="margin: 2px;">
                                Edit
                                </a>
                            <!--     <a href="" onclick="return confirmDelete('../query.php?s_id=<?=$value['id']?>');" data-toggle="modal" type="button" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;" data-id="<?php echo $value['id']; ?>">
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
                <!--<button id="delAll" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;" >
                Delete
                </button>-->
            </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal -->
<script type="text/javascript">
function confirmDelete(url) 
  {
    if (confirm("Are you sure you want to delete this?")) 
    {
        window.location.href=url;
    } 
    else 
    {
      return false;
    }
  }  
$(document).ready(function(){
   // to delete multiple files
   $("#delAll").click(function()
   {
    if (confirm("Are you sure you want to delete selected records?")) 
    {
      var id=[];
      var count = 0;
      $('.chkVal').each(function(index){
            if($(this).prop('checked'))
            {
              id[count] = $(this).val();
              count++;
            }
         });
      if(id.length !== 0)
      {
        $.ajax({
              type: "POST",
              url: "../query.php?del_id=1",
              data: {data:id},
              success: function(result) 
              { 
                if(result);
                {
                  alert('Deleted successfully'); 
                  window.location.reload();
                }
              }       
        });
      }
      else
      {
        alert('Please select atleast one row');
      } 
    } 
    else 
    {
      return false;
    }            
   });           //for check all
   $('#chkAll').click(function(){
     if($(this).prop('checked'))
     {
        $('.chkVal').prop('checked', true);
     }
     else
     {
        $('.chkVal').prop('checked',false);
     }    
   });
 });
</script>
<?php
$BaseClassObject->getFooterView();
?>
