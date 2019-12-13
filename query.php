<?php
include "connect/db.php";

function dd($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}

class QueryFire
{
    public function getAllData($table_name, $where)
    {
		if(!empty($where))
		{
			$sql = "SELECT * FROM " . $table_name . " WHERE " . $where;
		}else{
			$sql = "SELECT * FROM " . $table_name;
		}
        
		
        $p = mysqli_query($GLOBALS['connection'], $sql);
        while ($data = mysqli_fetch_array($p, MYSQLI_ASSOC)) {
            $q[] = $data;
        }
        if (!empty($q))
            return $q;
        else
            return false;
    }

    public function insertData($table_name, $data, $fields)
    {
        $da = $this->changeArrayToString($data);
        $sql = 'INSERT INTO ' . $table_name . '(' . $fields . ') VALUES (' . $da . ')';
        return mysqli_query($GLOBALS['connection'], $sql);
    }

    public function runSQL($sql)
    {
        return mysqli_query($GLOBALS['connection'], $sql);
    }

    public function runSQLNew($sql)
    {
        mysqli_query($GLOBALS['connection'], $sql);
        return mysqli_insert_id($GLOBALS['connection']);

    }

    public function upDateTable($table_name, $where, $data)
    {
        $da = $this->changeArrayToKeyValue($data);
        $sql = 'UPDATE ' . $table_name . ' SET ' . $da . ' WHERE ' . $where;

        return mysqli_query($GLOBALS['connection'], $sql);
    }

    public function deleteDataFromTable($table_name, $where, $data = 0)
    {
        //this is for multiple delete(Nilesh)
        if ($data !== 0) {
            foreach ($data as $value) {
                $where = " id = " . $value;
                $sql = 'DELETE FROM ' . $table_name . ' WHERE ' . $where;
                mysqli_query($GLOBALS['connection'], $sql);
            }
            return true;
        } else {
            $sql = 'DELETE FROM ' . $table_name . ' WHERE ' . $where;
            return mysqli_query($GLOBALS['connection'], $sql);
        }
    }

    function changeArrayToKeyValue($data)
    {
        $str = '';
        foreach ($data as $key => $value) {
            if (empty($str))
                $str = $key . ' ="' . strip_tags(trim($this->clearVariable($value))) . '"';
            else
                $str .= ' ,' . $key . ' ="' . strip_tags(trim($this->clearVariable($value))) . '"';
        }
        return $str;
    }

    function changeArrayToString($data)
    {
        $str = '';
        foreach ($data as $value) {
            if (empty($str))
                $str = '"' . strip_tags(trim($this->clearVariable($value))) . '"';
            else
                $str .= ' ,"' . strip_tags(trim($this->clearVariable($value))) . '"';
        }
        return $str;
    }

    function saveOrUpdateNew($table, $data_arr, $conds = null)
    {
        $insert_values = '';
        $cols = '';
        $sql = '';
        $update_str = '';
        foreach ($data_arr as $key => $value) {
            $cols .= $key . ",";
            $insert_values .= "'" . $this->clearVariable($value) . "',";
            $update_str .= $key . "='" . $this->clearVariable($value) . "',";
        }
        $update_str = substr($update_str, 0, strlen($update_str) - 1);
        $cols = substr($cols, 0, strlen($cols) - 1);
        $insert_values = substr($insert_values, 0, strlen($insert_values) - 1);
        if (empty($conds)) {
            $sql = "insert into $table($cols) VALUES($insert_values) ";
        } else {
            if ($this->exist($table, $conds)) {
                $condition = "";
                foreach ($conds as $col => $value) {
                    $condition .= $col . "='" . $this->clearVariable($value) . "',";
                }
                $condition = substr($condition, 0, strlen($condition) - 1);
                $sql = "update $table set $update_str where $condition";
            } else {
                $sql = "insert into $table($cols) VALUES($insert_values) ";
            }
        }
        if (!empty($conds)) {
            return $this->runSQL($sql);
        } else {
            return $this->runSQLNew($sql);
        }

    }

    function exist($table, $conds)
    {
        $condition = "";
        foreach ($conds as $col => $value) {
            $condition .= $col . "='" . $value . "',";
        }
        $condition = substr($condition, 0, strlen($condition) - 1);

        $sql = "select * from $table where $condition";
        $query = mysqli_query($GLOBALS['connection'], $sql);
        return mysqli_num_rows($query);
    }

    function clearVariable($data)
    {
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = mysqli_real_escape_string($GLOBALS['connection'], $data);
        return $data;
    }

}

if (isset($_GET['s_id'])) {
    //delete student from here
    $QueryFire = new QueryFire();
    $where = 'id =' . $_GET['s_id'];
    $QueryFire->deleteDataFromTable("pending", $where);
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
if (isset($_GET['del_id'])) {
    $QueryFire = new QueryFire();
    $data = $_POST['data'];
	//echo "<pre>";print_r($data);die();
    //echo json_encode($QueryFire->deleteDataFromTable("pending", $where = 1, $data));
	if(is_array($data) && count($data)>0){
		foreach($data as $id){
			$sql = 'DELETE FROM users WHERE user_id = '.$id;
			mysqli_query($GLOBALS['connection'], $sql);
		}
	}
}

if (isset($_GET['del_wu_data'])) {
    if ($_POST['data'] != '') {
        $wu_data_str = $_POST['data'];
        $wu_data_arr = explode(',', $_POST['data']);
        $QueryFire = new QueryFire();
        if ($wu_data_arr[0]!='') {
            $wu_post_data = array();
            $wu_post_data['is_deleted'] = 1;
            foreach ($wu_data_arr as $value) {
                $where = "id =" . $value;
                $QueryFire->upDateTable('pending', $where, $wu_post_data);
            }
            echo '1';
            exit;
        } else {
            echo '0';
            exit;
        }
    } else {
        echo '0';
        exit;
    }
}
