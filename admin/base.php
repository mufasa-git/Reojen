<?php
session_start();
require_once('../query.php');

class Base extends QueryFire
{
    function __construct()
    {
        if (!isset($_SESSION['user_id']) && empty(isset($_SESSION['user_id'])))
            header('Location:admin_login.php');
    }

    function loadView($active_tab)
    {
        require_once("header_admin.php");
        require_once("sidebar.php");
        /*require_once($content);
        require_once("footer.php");*/
    }

    function getFooterView()
    {
        require_once("admin_footer.php");
    }
}

?>