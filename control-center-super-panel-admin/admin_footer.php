<?php
require_once '../amal-functions.php';
require_once '../functions.php';
$addr_data = getContactAddress();
if (isset($addr_data) && count($addr_data) > 0) {
    $country_name = getCountryNameById($addr_data['country']);
}require_once("../libraries/helper_admin.php");
?>
<footer class="main-footer text-center" style="padding:5px;"> 
                <h3>Contacts</h3>
                
                <p>
                    <b>Address:</b> 
                    <?php if (isset($country_name) && count($country_name) > 0) { ?>
                       		
                        <?php echo isset($addr_data['company_name']) ? html_entity_decode(stripcslashes($addr_data['company_name'])) : "" ?><br>
                        <?php echo isset($addr_data['address_line1']) ? html_entity_decode(stripcslashes($addr_data['address_line1'])) : "" ?>,<br>

                        <?php
                        if (isset($addr_data['address_line2']) && $addr_data['address_line2'] != '') {
                            ?>
                            <?php echo html_entity_decode(stripcslashes($addr_data['address_line2'])) . ',<br>'; ?>
                        <?php } ?>

                        <?php echo isset($addr_data['city']) ? html_entity_decode(stripcslashes($addr_data['city'])) : "" ?>,

                        <?php
                        if (isset($addr_data['state']) && $addr_data['state'] != '') {
                            ?>
                            <?php echo html_entity_decode(stripcslashes($addr_data['state'])) . ','; ?>
                        <?php } ?>

                        <?php echo isset($addr_data['post_code']) ? html_entity_decode(stripcslashes($addr_data['post_code'])) : "" ?>,<br>
                    <?php } ?>
                    <?php echo isset($country_name) ? $country_name : "" ?>.                    <br/>					<?php if(config("support_message_status")==1){?>
                    Email: <a href="mailto:support@reojen.com">support@reojen.com</a>					<?php }?>
                </p>
            
                <strong>Copyright &copy; <?php echo date("Y")?> Reojen Co. All rights reserved.</strong>
  </footer>
<!-- Bootstrap 3.3.5 -->


<script src="../assets/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../assets/js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../assets/js/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../assets/js/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../assets/js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../assets/js/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../assets/js/demo.js"></script>
<script src="../assets/js/custom_validation.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/DT_bootstrap.js"></script>
<script src="../assets/js/table-data.js"></script>
<script type="text/javascript" src="../assets/js/datatable_extension/dataTables.scroller.js"></script>
<!-- <script src="../assets/js/main.js"></script>
<script src="../assets/js/main-front-end.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
<script>
	$(document).ready(function() {
		
		//jumpToData plugin code start
		jQuery.fn.dataTable.Api.register( 'page.jumpToData()', function ( data, column ) {
		var pos = this.column(column, {order:'current'}).data().indexOf( data );

		if ( pos >= 0 ) {
			var page = Math.floor( pos / this.page.info().length );
			this.page( page ).draw( false );
		}

		return this;
		} );
		//jumpToData plugin code end
		
		var x = null;
		
		if(x == null || x==""){
			x = 10;
		}else{
			x = localStorage.getItem("getVal");
		}
		
	    var tabl = $('#sample_1').DataTable({
	        "order": [[0, "desc" ]],
			"iDisplayLength": 10,
			"language":{
				"info": "Page _PAGE_ of _PAGES_ pages"
			},
			"stateSave": true,
	    });
		
		
		//tabl.page.jumpToData("India",3);
		
		/*$("#sample_1_length select").on("change",function(){
			  localStorage.setItem("getVal",$(this).val());
		});*/
		
		
		$("#pageSearch_text").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 
                 return;
        }
        
        if ((e.shiftKey || (e.keyCode < 49 || e.keyCode > 57)) && (e.keyCode < 97 || e.keyCode > 105)) {
            e.preventDefault();
        }
		});
		
		
		$("#page_search").on("click",function(){
			var pg = $("#pageSearch_text").val();
			if(pg == ""){
				alert("Please insert some data");
			}else{
				
				var pag_numb = parseInt(pg)-1;
				
				var pageInfo = tabl.page.info();
					
				if(pag_numb > pageInfo.pages)	
				{
					alert("Page is not available");
				}else{
					tabl.page(pag_numb).draw('page');
				}
			}	
		});
		
	});
</script>
</body>
</html>