<?PHP 
$protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
//echo $_SERVER['HTTP_HOST'];
//echo '<br/>';http://www.
//echo $_SERVER['REQUEST_URI'];
if($_SERVER['HTTP_HOST']=='reojen.com'){
    header('Location: http://www.'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
}
/* comment by Vk
if (substr($_SERVER['HTTP_HOST'], 0, 4) !== 'www.') {
//    header('Location: www.'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
}
*/
if(isset($_SESSION['expire'])){
		 $now = time();
		if ($now > $_SESSION['expire']) {
            session_destroy();
           // echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
        }
}