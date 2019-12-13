
<!DOCTYPE html>
<html>
<head>
	<title>dsfs</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
</head>
<body>
<?php
/*	include_once('query.php');
	$q = new QueryFire();
	$p=' user_id = 1';
	$data = array('fname' =>'niles','mname'=>'l');
	$where ='user_id = 1';
	$data = $q->upDateTable('users',$where,$data);
	print_r($data);*/
	/*$dT = file_get_contents('http://result.dghs.gov.bd/#');
	print_r($dT);exit;*/
	function getUrlContent($url)
	{
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($fields));
	  $data = curl_exec($ch);
	  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	  curl_close($ch);
	  return ($httpcode>=200 && $httpcode<300) ? $data : false;
	}

	function registerToGyaw($username,$email,$f_name,$l_name,$pass)
    {
        set_time_limit(0);
        require_once FCPATH . 'application/libraries/simple_html_dom.php';
        
        $ch = curl_init();
        $fields_string='';
        $url = 'http://gyaw.net/wp-login.php?action=register';
        $fields = array(
            'user_login' =>  $username,//username
            'user_email' => $email,
            'ws_plugin__s2member_registration' => 'e681aa5a66',
            'ws_plugin__s2member_custom_reg_field_user_pass1' => $pass,
            'ws_plugin__s2member_custom_reg_field_user_pass2' => $pass,
            'ws_plugin__s2member_custom_reg_field_first_name' => $f_name,
            'ws_plugin__s2member_custom_reg_field_last_name' => $l_name,
            'redirect_to' => '',
            'wp-submit' => 'Register'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        if(empty($result))
        {
            $emailContentForAdmin = array('subject' => 'New user registration notification','message' =>'
                Hello,<br/><br/>
                
                '.$username.' has registered with gyaw.net<br/><br/>
                
                Keep it shining,<br/>
                Team Fast Forward!');
            email('register@fastforwardapp.net', 'support@fastforwardapp.net', $emailContentForAdmin);
            
            //2nd request to login
            $ch = curl_init();
            $fields_string='';
            $url = 'http://gyaw.net/wp-login.php';
            $fields = array(
                'log' =>  'tcgbuilding',//username
                'pwd' => 'aroundtheworld',
                'wp-submit' => 'Log In',
                'redirect_to' => 'http://gyaw.net/wp-admin/',
                'testcookie' => '1'
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded; charset=UTF-8"));
            curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($fields));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            //close connection
            curl_close($ch);

            //3rd get request
            $ch = curl_init();
            $url = 'http://gyaw.net/wp-admin/users.php?s='.$username.'&action=-1&new_role&paged=1&action2=-1&new_role2';
            //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded; charset=UTF-8"));
            curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            $html = str_get_html($result);
            $ret = $html->find('input[name=users[]]',0); 
            $ret1 = $html->find('input[name=_wpnonce]',0); 
            //get users and _wpnonce values
            $users = $ret->value;
            $wpnonce = $ret1->value;


            //4th request 
            $ch = curl_init();
            $url = 'http://gyaw.net/wp-admin/users.php?s='.$username.'&_wpnonce='.$wpnonce.'&action=-1&new_role=&paged=1&users%5B%5D='.$users.'&action2=-1&new_role2=s2member_level1&changeit=Change';
            curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
            curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            curl_close($ch);
            return;
        }
    }
	echo " testing here ";
	$data = getUrlContent('http://result.dghs.gov.bd');
	echo "<pre>";
	print_r($data);
?>
</body>
</html>
