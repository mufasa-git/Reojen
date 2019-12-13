<?php
	$error = "";		//error holder
	if(isset($_POST['createpdf'])){
		$post = $_POST;		
		$file_folder = "files/";	// folder to load files
		if(extension_loaded('zip')){	// Checking ZIP extension is available
			if(isset($post['files']) and count($post['files']) > 0){	// Checking files are selected
				$zip = new ZipArchive();			// Load zip library	
				$zip_name = time().".zip";			// Zip name
				if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){		// Opening zip file to load files
					$error .=  "* Sorry ZIP creation failed at this time<br/>";
				}
				foreach($post['files'] as $file){				
					$zip->addFile($file_folder.$file);			// Adding files into zip
				}
				$zip->close();
				if(file_exists($zip_name)){
					// push to download the zip
					header('Content-type: application/zip');
					header('Content-Disposition: attachment; filename="'.$zip_name.'"');
					readfile($zip_name);
					// remove zip file is exists in temp path
					unlink($zip_name);
				}
				
			}else
				$error .= "* Please select file to zip <br/>";
		}else
			$error .= "* You dont have ZIP extension<br/>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Download As Zip</title>
</head>
<body>
<center><h1>Create Zip</h1></center>
<form name="zips" method="post">
<?php if(!empty($error)) { ?>
<p style=" border:#C10000 1px solid; background-color:#FFA8A8; color:#B00000;padding:8px; width:588px; margin:0 auto 10px;"><?php echo $error; ?></p>
<?php } ?>
<table width="600" border="1" align="center" cellpadding="10" cellspacing="0" style="border-collapse:collapse; border:#ccc 1px solid;">
  <tr>
    <td width="33" align="center">*</td>
    <td width="117" align="center">File Type</td>
    <td width="382">File Name</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" name="files[]" value="flowers.jpg" /></td>
    <td align="center"><img src="files/image.png" title="Image" width="16" height="16" /></td>
    <td>flowers.jpg</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" name="files[]" value="fun.jpg" /></td>
    <td align="center"><img src="files/image.png" title="Image" width="16" height="16" /></td>
    <td>fun.jpg</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" name="files[]" value="9lessons.docx" /></td>
    <td align="center"><img src="files/doc.png" title="Document" width="16" height="16" /></td>
    <td>9lessons.docx</td>
  </tr>
  <tr>
    <td align="center"><input type="checkbox" name="files[]" value="9lessons.pdf" /></td>
    <td align="center"><img src="files/pdf.png" title="pdf" width="16" height="16" /></td>
    <td>9lessons.pdf</td>
  </tr>
  <tr>
    <td colspan="3" align="center">
    	<input type="submit" name="createpdf" style="border:0px; background-color:#800040; color:#FFF; padding:10px; cursor:pointer; font-weight:bold; border-radius:5px;" value="Download as ZIP" />&nbsp;
        <input type="reset" name="reset" style="border:0px; background-color:#D3D3D3; color:#000; font-weight:bold; padding:10px; cursor:pointer; border-radius:5px;" value="Reset" />
    </td>
    </tr>
</table>

</form>
</body>
</html>
