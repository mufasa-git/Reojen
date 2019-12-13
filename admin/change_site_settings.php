<?php
$active_tab = "products";
require_once('base.php');
$BaseClassObject = new Base();
$BaseClassObject->loadView($active_tab);
//$where = 1;
//$pending = $BaseClassObject->getAllData('products', $where);
if(isset($_POST['Save'])){
 $site_name = $_POST['site_name'];
 $previous_logo = $_POST['previous_logo'];
 $previous_favicon = $_POST['previous_favicon'];
 
 echo $banner=$_FILES['site_logo']['name']; 
 $expbanner=explode('.',$banner);
  $bannerexptype=$expbanner[1];
 date_default_timezone_set('Australia/Melbourne');
 $date = date('m/d/Yh:i:sa', time());
 $rand=rand(10000,99999);
 $encname=$date.$rand;
 $bannername=md5($encname).'.'.$bannerexptype;
 $bannerpath="../uploads/".$bannername;
// move_uploaded_file($_FILES["site_logo"]["tmp_name"],$bannerpath); 
 $tmp_name = $_FILES["site_logo"]["tmp_name"]; 
 move_uploaded_file($tmp_name, $bannerpath);
 echo $bannerf=$_FILES['site_favicon']['name']; 
 $expbannerf=explode('.',$bannerf);
  $bannerexptypef=$expbannerf[1];
 date_default_timezone_set('Australia/Melbourne');
 $datef = date('m/d/Yh:i:sa', time());
 $randf=rand(10000,99999);
 $encnamef=$datef.$randf;
 $bannernamef=md5($encnamef).'.'.$bannerexptypef;
 $bannerpathf="../uploads/".$bannernamef;
// move_uploaded_file($_FILES["site_logo"]["tmp_name"],$bannerpath); 
 $tmp_namef = $_FILES["site_favicon"]["tmp_name"];
 move_uploaded_file($tmp_namef, $bannerpathf);
 if($banner!=''){
     $bannernames =$bannername;
 } else {
     $bannernames =$previous_logo;
 }
 if($bannerf!=''){
     $bannernamess =$bannernamef;
 } else {
     $bannernamess =$previous_favicon;
 }
if ($bannernames!='' || $bannernamess!='') {
       $sql="delete from site_settings";
       $result=mysqli_query($connection,$sql);
       $query_create_site_setting = 'INSERT INTO site_settings(name, logo,favicon) 
			VALUES ( "'.$site_name.'","'.$bannernames.'", "'.$bannernamess.'")';
			$query_create_site_setting = mysqli_query($connection,$query_create_site_setting) or die("Error: ".mysqli_error($connection));
			echo $lstid=mysqli_insert_id($connection);
    } else {
        echo "Sorry, there was an error uploading your file.";
    } 
}
$sql="SELECT * FROM site_settings ORDER BY id DESC LIMIT 1";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $name = $row['name'];
 $logo = $row['logo'];
 $favicon = $row['favicon'];
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Site  Details </b></h1></span>
                            <!--<span style="float: right;"><a href="home.php" class="btn btn-primary">Back</a></span>-->
                        </div>
                                                                        <div class="box-body ">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 col-lg-2 col-sm-4">Site name:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="site_name" value="<?php echo $name;?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-xs-2 col-lg-2 col-sm-4">Site Logo:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                       
                                    <input type="file" name="site_logo" onchange="document.getElementById('site_logo').src = window.URL.createObjectURL(this.files[0])">
                                    <img id="site_logo" src="../uploads/<?php echo $logo;  ?>" alt="Site logo" width="100" height="100" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Site Favicon:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="file" name="site_favicon"  onchange="document.getElementById('site_favicon').src = window.URL.createObjectURL(this.files[0])"/>
					<img id="site_favicon" src="../uploads/<?php echo $favicon;  ?>" alt="Site favicon" width="100" height="100" />
									</div>
                                </div>
                                <input type="hidden" name="previous_logo" value="<?php echo $logo;  ?>">
				<input type="hidden" name="previous_favicon" value="<?php echo $favicon;  ?>">
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
    <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
</script>
<?php
$BaseClassObject->getFooterView();
?>