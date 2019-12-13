<?php
function getContactAddress()
{
    global $connection;
    $sql="select * from site_address where id=1";
    $query = mysqli_query($connection,$sql);
    $addr_data = mysqli_fetch_array($query,MYSQLI_ASSOC);
    return $addr_data;
}

function getCountryDropdownWithoutIP($location='')
{
    global $connection;
    $sql="SELECT Code,Country FROM countrycode";
    $result=mysqli_query($connection,$sql);

    while ($row = mysqli_fetch_assoc($result))
    {
        if(isset($_REQUEST['country_res']))
            $ss=($row['Code']==$_REQUEST['country_res'])?'selected':'';
        else
            $ss='';
        if($ss=="")
        {
            $ss=($row['Code']==$location)? 'selected':'';
        }
        echo "<option value='".$row['Code']."' $ss >" . $row['Country']  ."</option>";
    }
}
function get_csrf_token_name()
{
    return 'reojen_csrf_token';
}
function get_random_bytes($length)
{
    if (empty($length) OR ! ctype_digit((string) $length))
    {
        return FALSE;
    }

    if (function_exists('random_bytes'))
    {
        try
        {
            return random_bytes((int) $length);
        }
        catch (Exception $e)
        {
            return FALSE;
        }
    }

    // Unfortunately, none of the following PRNGs is guaranteed to exist ...
    if (defined('MCRYPT_DEV_URANDOM') && ($output = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM)) !== FALSE)
    {
        return $output;
    }

    if (function_exists('openssl_random_pseudo_bytes'))
    {
        return openssl_random_pseudo_bytes($length);
    }

    return FALSE;
}
function get_csrf_hash()
{
    $rand =get_random_bytes(16);

    $csrf_hash = ($rand === FALSE)
                ? md5(uniqid(mt_rand(), TRUE))
                : bin2hex($rand);
    $token_name=get_csrf_token_name();

    $_SESSION[$token_name]=$csrf_hash;

    return $csrf_hash;
}

function csrf_verify()
{
    $token_name=get_csrf_token_name();
    if (! isset($_POST[$token_name], $_SESSION[$token_name])
            OR $_POST[$token_name] !== $_SESSION[$token_name]) // Do the tokens match?
    {
        return FALSE; 
    }
    else
    {
        unset($_POST[$token_name]);
        get_csrf_hash();
        print_r($_POST[$token_name]);
        return TRUE;
    }
}