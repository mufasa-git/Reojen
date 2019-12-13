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
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <span><h1 class="box-title"><b> Change Home page content </b></h1></span>
                            <!-- <span>
                                <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs pull-right" style="margin: -3px 0px 0px 0px;">Add
                                </a>
                            </span> -->
                        </div>

                        <div class="box-body">
                            <table class="col-md-12 col-xs-12 col-sm-12 table table-striped table-condensed table-bordered"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Text</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
<!--                                                <a href="viewProductInfo.php?pid=" type="button"
                                                   class="btn btn-xs btn-success" style="margin: 2px;">View</a>-->
                                                <a href="home_page_content.php?pid=" type="button"
                                                   class="btn btn-xs btn-primary" style="margin: 2px;">
                                                    Edit
                                                </a>
                                                <!-- <a href="" onclick="return confirmDelete('../query.php?s_id=<?= $value['id'] ?>');" data-toggle="modal" type="button" class="btn btn-xs btn-danger deleteEventButton" style="margin: 2px;" data-id="<?php echo $value['id']; ?>">
        Delete
        </a> -->
                                            </td>
                                        </tr>
                                </tbody>
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