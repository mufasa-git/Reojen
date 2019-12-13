<?php
$active_tab = "products";
require_once('base.php');
$BaseClassObject = new Base();
$BaseClassObject->loadView($active_tab);
//$where = 1;
//$pending = $BaseClassObject->getAllData('products', $where);
$show_div=false;
if(isset($_POST['Save'])){
  $pid = $_POST['pid'];
  $title = $_POST['title'];
  $contentss = $_POST['contents'];
  $previous_con_img = $_POST['previous_con_img'];
 $contents = addslashes($contentss);
 $banner=$_FILES['image']['name']; 
 $expbanner=explode('.',$banner);
  $bannerexptype=$expbanner[1];
 date_default_timezone_set('Australia/Melbourne');
 $date = date('m/d/Yh:i:sa', time());
 $rand=rand(10000,99999);
 $encname=$date.$rand;
 $bannername=md5($encname).'.'.$bannerexptype;
 $bannerpath="../uploads/".$bannername;
// move_uploaded_file($_FILES["site_logo"]["tmp_name"],$bannerpath); 
 $tmp_name = $_FILES["image"]["tmp_name"]; 
 move_uploaded_file($tmp_name, $bannerpath);
 if($banner!=''){
     $bannernames =$bannername;
 } else {
     $bannernames =$previous_con_img;
 }
if ($pid!='') {
       $query_create_site_setting = 'UPDATE dashboard SET title="'.$title.'", contents="'.$contents.'",image="'.$bannernames.'" WHERE id="'.$pid.'"';
       $querys= mysqli_query($connection,$query_create_site_setting);
       $show_div=true;
       $_SESSION['update_dashboard'] = "true";
    } else {
        echo "Sorry, there was an error uploading your file.";
    } 
}
$epid = $_GET['pid'];
$sql="SELECT * FROM dashboard where id='$epid'";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $id = $row['id'];
 $title = $row['title'];
 $image = $row['image'];
 $contents = $row['contents'];
// echo '<pre>';
// print_r($row);
// die;
 $QueryFire = new QueryFire();
$products = $QueryFire->getAllData('products', $where = 1);
// echo '<pre>';
// print_r($products);
// echo '<br>';
//echo $products[1]['price'] ; die;
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Dashboard page contnet </b></h1></span>
                            <span style="float: right;"><a href="change_dashboard_contents.php" class="btn btn-primary">Back</a></span>
                        </div>
                             <?php
							 	if(isset($_SESSION['update_dashboard']) && $_SESSION['update_dashboard']=="true")
								{
									?>
									<div class="alert alert-success">
                                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										You have changed your dashboard contents successfully. 
									</div>
									<?php 
									$_SESSION['update_dashboard']="false"; 
								} 
								?>                                           <div class="box-body ">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="pid" value="<?php echo $id;?>">	
							   <div class="form-group">
                                    <label for="name" class="col-xs-2 col-lg-2 col-sm-4">Title:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="title" value="<?php echo $title;?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-xs-2 col-lg-2 col-sm-4">Image:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <!--<input type="file" name="con_img">-->
					<input type="file" name="image"  onchange="document.getElementById('con_img').src = window.URL.createObjectURL(this.files[0])"/>
                                        <img id="con_img" src="../uploads/<?php echo $image; ?>" alt="Banner img" width="100" height="100" />
                                        <input type="hidden" name="previous_con_img" value="<?php echo $image; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Content:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <div id="sample">
                                        <textarea name="contents" style="width: 100%; height: 600px;">
                                                <?php 
                                                
                                               // $contents =  str_replace('product_price',$products[1]['price'],$contents);
                                                echo $contents;
                                                //echo $products[1]['price'] ;?>									
                                        </textarea>
				        </div>
                                    </div>
                                </div>                            
                                <div class="form-group " style="float:right">
                                    <div class="col-xs-10 ">
                                        <span><input type="submit" class="btn btn-success" name="Save" value="Save"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  
  $(document).ready(function(){
     var prod_pr = $('#pr_prd_id').val();
     if(prod_pr != ''){
         $('#bmmm').text(prod_pr);
     }
     
  });
  
</script>
<?php
$BaseClassObject->getFooterView();
?>