<?php

class IUDMquery
{
	
	function __construct()
	{
		# code...
	}

	function insertData($fields,$tablename,$data)
	{
		$sql = "INSERT INTO ".$tablename." ( ".$fields.") VALUES (".$data.") ";
		echo $sql;
	}
}

?>