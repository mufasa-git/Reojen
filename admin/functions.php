<?php
function getCountryDropdownAdmin($country = '')
{
    global $connection;
    $sql = "SELECT id,Country FROM countrycode";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($_REQUEST['country']))
            $ss = ($row['id'] == $_REQUEST['country']) ? 'selected' : '';
        else
            $ss = '';
        if ($ss == "") {
            $ss = ($row['id'] == $country) ? 'selected' : '';
        }
        echo "<option value='" . $row['id'] . "' $ss >" . $row['Country'] . "</option>";
    }
}

?>