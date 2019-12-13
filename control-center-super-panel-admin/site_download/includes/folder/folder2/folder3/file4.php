<!doctype html>
<html>
<head>
    <title>PHP numeric pagination</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <?php
    include("config.php");

    $rowperpage = 5;
    $row = 0;

    ?>
</head>
<body>
<div id="content">
    <table width="100%" id="emp_table" border="0">
        <tr class="tr_header">
            <th>S.no</th>
            <th>Name</th>
            <th>Salary</th>
        </tr>
        <?php
        // count total number of rows
        $sql = "SELECT COUNT(*) AS cntrows FROM employee";
        $result = mysql_query($sql);
        $fetchresult = mysql_fetch_array($result);
        $allcount = $fetchresult['cntrows'];

        $total_num = 0;
        $total_num = $allcount/$rowperpage;


        $li_options = "";
        for($i = 0,$j = 0; $i < $total_num; $i++, $j++){
            $li_options .= "<li><a href='?pid=".$j."'>".($i+1)."</a></li>";
        }

        if(isset($_GET['pid'])){
            $row = $rowperpage * $_GET['pid'];
        }

        // selecting rows
        $sql = "SELECT * FROM employee  ORDER BY ID ASC limit $row,".$rowperpage;
        $result = mysql_query($sql);
        $sno = $row + 1;
        while($fetch = mysql_fetch_array($result)){
            $name = $fetch['emp_name'];
            $salary = $fetch['salary'];
            ?>
            <tr>
                <td align='center'><?php echo $sno; ?></td>
                <td align='center'><?php echo $name; ?></td>
                <td align='center'><?php echo $salary; ?></td>
            </tr>
            <?php
            $sno ++;
        }
        ?>
    </table>
    <ul class="pagination">
        <li><a href="?pid=0">0</a></li>
        <?php echo $li_options; ?>
    </ul>
    <form method="post" action="">
        <div id="div_pagination">
            <input type="hidden" name="row" value="<?php echo $row; ?>">
            <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">

        </div>
    </form>
</div>
</body>
</html>
