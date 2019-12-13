<?php
$active_tab = "products";
require_once('base.php');
$BaseClassObject = new Base();
$BaseClassObject->loadView($active_tab);
//$where = 1;
//$pending = $BaseClassObject->getAllData('products', $where);

?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Address  Details </b></h1></span>
                            <span style="float: right;"><a href="change_home_page_content.php" class="btn btn-primary">Back</a></span>
                        </div>
                                                                        <div class="box-body ">
                            <form class="form-horizontal" action="home_page_content.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="pid" value="3">	
							   <div class="form-group">
                                    <label for="name" class="col-xs-2 col-lg-2 col-sm-4">Title:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="text" class="form-control" name="title" value="Reojen Marketing Automation Software" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-xs-2 col-lg-2 col-sm-4">Image:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <input type="file" name="con_img">
										<img src="../uploads/111735470_frontbaner3.jpg" style="width:120px; height:120px;">
										<input type="hidden" name="previous_con_img" value="111735470_frontbaner3.jpg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text" class="col-xs-2 col-lg-2 col-sm-4">Content:</label>
                                    <div class="col-xs-10 col-lg-10 col-sm-8">
                                        <div id="sample">
										<textarea name="content" style="width: 100%; height: 600px;"> </textarea>
										</div>
                                    </div>
                                </div>                            
                                <div class="form-group " style="float:right">
                                    <div class="col-xs-10 ">
                                        <span><input type="submit" class="btn btn-success" value="Save"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
$BaseClassObject->getFooterView();
?>