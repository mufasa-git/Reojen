<?php

require("../connect/db.php");

global $connection;

$active_tab = "user";
require_once('base.php');
$BaseClassObject = new Base();
$content = "home.php";

$BaseClassObject->loadView($active_tab);
$where = 1;
//$users = $BaseClassObject->getAllData('users',$where);

$usr = $connection->query("select users.*,app_payment_transactions.* from users INNER JOIN app_payment_transactions ON app_payment_transactions.user_id=users.user_id order by app_payment_transactions.id DESC");

while($rows = $usr->fetch_assoc()){
	$users[] = $rows;
}
if(isset($_POST['submit'])){   
 if(!empty($_POST['check_list'])){
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
$sql = 'DELETE FROM app_payment_transactions WHERE id="'.$selected.'"' ;
mysqli_query($connection, $sql);
//header("Refresh:3; url=user.php");
header("Refresh:3;");
}
}
}

?>
<style>
    #example_filter{
        margin-left: 54%;
    }
</style>
<div class="content-wrapper">        
  <section class="content">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header"> 
                <span><h1 class="box-title"><b> User Payment Details </b></h1></span>
                <!-- <span>
                    <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right" style="margin: -3px 0px 0px 0px;">Add
                    </a>
                </span> -->
            </div>
            <!------------------------>
            <div class="box-body">
                <form action="" method="post">
            <table id="example" class="display col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="sorting_desc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;" aria-sort="descending">
                <input type="checkbox" id="chkAll">
            </th>
            <th>Mobile <br>number</th>
            <th>Name </th>
            <th>Amount(<i class="fa fa-gbp"></i>) </th>
            <th>Status</th>
            <th>Skrill: Transaction ID/Account email</th>
            <th>Date Of Creation</th>
            <th>Actions</th>
        </tr>
        <tr id="filters">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
                        if(!empty($users))
                        {
                          foreach ($users as $key => $value) 
                          { 
                      ?>
        <tr>
            <td class="sorting_1">
                <input class="chkVal" type="checkbox" name="check_list[]" value="<?=$value['id']?>">
                <label for="option"></label>
            </td>
            <td><?=$value['mobile_no']?></td>
            <td><?=$value['fname'].' '.$value['mname'].' '.$value['lname']?></td>
            <td><?=$value['amount']?></td>
            <td><?=$value['status']?></td>
            <td><?=$value['transaction_id_account_email']?></td>
            <td><?=$value['added_on']; ?></td>
            <td><a href="user_payment_edit.php?pid=<?=$value['id']?>" type="button" class="btn btn-xs btn-primary" style="margin: 2px;"> Edit </a></td>
        </tr>
                          <?php } }?>
    </tbody>
</table>
                    <input type="submit" id="" value="Delete" name="submit" onclick="return confirm('Are you sure you want to delete this user ?');" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;"/>
</form>
            <!------------------------------>
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
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        initComplete: function () {



            this.api().columns().every(function () {
                var column = this;

//                if (column.index() == 1) {
//                    
//                    input = $('<input type="text" />').appendTo($(column.header())).on('keyup change', function () {
//                        if (column.search() !== this.value) {
//                            column.search(this.value)
//                                .draw();
//                        }
//                    });
//                    return;
//                }
//                alert(column.index());
if (column.index() == 4) {
                var select = $('<select><option value="">Search Status</option><option value="">All</option></select>')
                    .appendTo($("#filters").find("th").eq(column.index()))
                    .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val());                                     

                    column.search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });
            
                console.log(select);

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            }
            });
            
        }
    });

    console.log()
});
</script>
<?php
$BaseClassObject->getFooterView();
?>
