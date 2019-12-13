<?php $zip = new ZipArchive();

echo $DelFilePath="first.zip";

if(file_exists($_SERVER['DOCUMENT_ROOT']."/connect/".$DelFilePath)) {

        unlink ($_SERVER['DOCUMENT_ROOT']."/connect/".$DelFilePath); 

}
if ($zip->open($_SERVER['DOCUMENT_ROOT']."/connect/".$DelFilePath, ZIPARCHIVE::CREATE) != TRUE) {
        die ("Could not open archive");
}
   echo $zip->addFile("file_path","file_name");

// close and save archive

$zip->close(); 