<?php
session_start();
require_once("libraries/helper.php");
ob_start();
@session_start();
global $connection;

require("header.php");

$sql = "SELECT * FROM cms_pages where id=1";
//$sql = "SELECT * FROM cms_pages where id='$epid'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$id = $row['id'];
$title = $row['title'];
$contents = $row['description'];
?>

<style>
    .term_title{
        padding-top:10px;
        padding-bottom:10px;
    }
    .term_sec{
        min-height: 500px;
    }

</style>
<STYLE type="text/css">
/*body {margin-top: 0px;margin-left: 0px;}*/
/*#page_1 {position:relative; overflow: hidden;margin: 97px 0px 109px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_2 {position:relative; overflow: hidden;margin: 94px 0px 128px 168px;padding: 0px;border: none;width: 648px;}*/
/*#page_3 {position:relative; overflow: hidden;margin: 96px 0px 128px 120px;padding: 0px;border: none;width: 696px;}*/
/*#page_4 {position:relative; overflow: hidden;margin: 96px 0px 146px 120px;padding: 0px;border: none;width: 696px;}*/
/*#page_5 {position:relative; overflow: hidden;margin: 95px 0px 332px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_6 {position:relative; overflow: hidden;margin: 96px 0px 166px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_7 {position:relative; overflow: hidden;margin: 99px 0px 184px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_8 {position:relative; overflow: hidden;margin: 99px 0px 134px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_9 {position:relative; overflow: hidden;margin: 99px 0px 102px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_10 {position:relative; overflow: hidden;margin: 96px 0px 142px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_11 {position:relative; overflow: hidden;margin: 96px 0px 104px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_12 {position:relative; overflow: hidden;margin: 96px 0px 137px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_13 {position:relative; overflow: hidden;margin: 96px 0px 114px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_14 {position:relative; overflow: hidden;margin: 96px 0px 149px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_15 {position:relative; overflow: hidden;margin: 100px 0px 142px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_16 {position:relative; overflow: hidden;margin: 94px 0px 139px 96px;padding: 0px;border: none;width: 720px;}*/
/*#page_17 {position:relative; overflow: hidden;margin: 96px 0px 123px 96px;padding: 0px;border: none;width: 621px;}*/
hr {
    margin-top: 10px !important;
    margin-bottom: 20px;
    border: 0;
    border-top: 2px solid #0a0a0a;
}
.ft0{font: bold 32px 'Times New Roman';line-height: 36px;}
.ft1{font: 16px 'Times New Roman';line-height: 19px;}
.ft2{font: bold 16px 'Times New Roman';text-decoration: underline;margin-left: 12px;line-height: 19px;}
.ft3{font: bold 16px 'Times New Roman';line-height: 19px;}
.ft4{font: 16px 'Times New Roman';text-decoration: underline;margin-left: 13px;line-height: 19px;}
.ft5{font: 16px 'Times New Roman';margin-left: 12px;line-height: 19px;}
.ft6{font: 16px 'Times New Roman';line-height: 18px;}
.ft7{font: 16px 'Times New Roman';margin-left: 12px;line-height: 18px;}
.ft8{font: bold 16px 'Times New Roman';line-height: 18px;}
.ft9{font: 16px 'Times New Roman';text-decoration: underline;margin-left: 12px;line-height: 19px;}
.ft10{font: 16px 'Times New Roman';text-decoration: underline;margin-left: 15px;line-height: 19px;}
.ft11{font: 16px 'Times New Roman';text-decoration: underline;line-height: 19px;}
.ft12{font: 16px 'Times New Roman';text-decoration: underline;color: #0000ff;line-height: 18px;}
.ft13{font: italic 16px 'Times New Roman';line-height: 19px;}
.ft14{font: bold 16px 'Times New Roman';text-decoration: underline;line-height: 19px;}
.ft15{font: 13px 'Wingdings';line-height: 15px;}
.ft16{font: 16px 'Times New Roman';margin-left: 18px;line-height: 19px;}
.ft17{font: 16px 'Times New Roman';margin-left: 18px;line-height: 18px;}
.ft18{font: 16px 'Times New Roman';color: #2e74b5;line-height: 19px;}
.ft19{font: bold 32px 'Times New Roman';color: #2e74b5;line-height: 36px;}
.ft20{font: 16px 'Calibri Light';color: #2e74b5;line-height: 19px;}
.ft21{font: 26px 'Times New Roman';line-height: 15px;font-weight: bold;}
.ft22{font: 16px 'Verdana';margin-left: 18px;line-height: 19px;}
.ft23{font: 16px 'Verdana';line-height: 19px;}
.ft24{font: 15px 'Verdana';margin-left: 18px;line-height: 19px;}
.ft25{font: 15px 'Verdana';line-height: 19px;}
.ft26{font: 16px 'Verdana';margin-left: 18px;line-height: 18px;}
.ft27{font: 16px 'Verdana';line-height: 18px;}
.ft28{font: 16px 'Verdana';margin-left: 18px;line-height: 20px;}
.ft29{font: 16px 'Verdana';line-height: 20px;}
.ft30{font: 15px 'Verdana';line-height: 20px;}
.ft31{font: 17px 'Calibri Light';color: #2e74b5;line-height: 21px;}
.ft32{font: bold 16px 'Times New Roman';margin-left: 4px;line-height: 19px;}
.ft33{font: 16px 'Times New Roman';text-decoration: underline;color: #0000ff;line-height: 19px;}
.ft34{font: bold 16px 'Times New Roman';margin-left: 4px;line-height: 18px;}
.p0{text-align: center;margin-top: 0px;margin-bottom: 0px;}
/*.p1{text-align: left;padding-right: 105px;margin-top: 55px;margin-bottom: 0px;}*/
/*.p2{text-align: left;padding-right: 142px;margin-top: 35px;margin-bottom: 0px;}*/
.p3{text-align: left;padding-left: 24px;margin-top: 17px;margin-bottom: 0px;}
.p4{text-align: justify;padding-left: 48px;margin-top: 18px;}
.p5{text-align: left;padding-left: 48px;margin-top: 18px;}
.p6{text-align: left;padding-left: 72px;margin-top: 17px;margin-bottom: 0px;}
.p7{text-align: left;padding-left: 96px;margin-top: 18px;margin-bottom: 0px;}
.p8{text-align: justify;padding-left: 144px;margin-top: 17px;margin-bottom: 0px;text-indent: -24px;}
.p9{text-align: left;padding-left: 144px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p10{text-align: left;padding-left: 144px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p11{text-align: justify;padding-left: 192px;margin-top: 2px;margin-bottom: 0px;text-indent: -24px;}
.p12{text-align: left;padding-left: 144px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p13{text-align: left;padding-left: 72px;margin-top: 0px;margin-bottom: 0px;}
.p14{text-align: left;padding-left: 72px;margin-top: 3px;margin-bottom: 0px;text-indent: -24px;}
.p15{text-align: left;padding-left: 72px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p16{text-align: left;padding-left: 120px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p17{text-align: left;padding-left: 48px;margin-top: 3px;margin-bottom: 0px;}
.p18{text-align: justify;padding-left: 24px;margin-top: 17px;margin-bottom: 0px;}
.p19{text-align: left;padding-left: 24px;margin-top: 2px;margin-bottom: 0px;}
.p20{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p21{text-align: left;padding-left: 24px;margin-top: 19px;margin-bottom: 0px;}
.p22{text-align: left;padding-left: 72px;margin-top: 15px;margin-bottom: 0px;text-indent: -24px;}
.p23{text-align: left;margin-top: 3px;margin-bottom: 0px;}
.p24{text-align: left;padding-left: 24px;margin-top: 18px;margin-bottom: 0px;}
.p25{text-align: left;margin-top: 34px;margin-bottom: 0px;}
.p26{text-align: left;padding-left: 24px;margin-top: 18px;margin-bottom: 0px;}
.p27{text-align: left;padding-left: 48px;margin-top: 0px;margin-bottom: 0px;}
.p28{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p29{text-align: left;margin-top: 15px;margin-bottom: 0px;}
.p30{text-align: left;padding-left: 24px;margin-top: 18px;margin-bottom: 0px;}
.p31{text-align: left;padding-left: 48px;margin-top: 36px;margin-bottom: 0px;}
.p32{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p33{text-align: left;padding-left: 120px;margin-top: 15px;margin-bottom: 0px;text-indent: -24px;}
.p34{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p35{text-align: justify;padding-left: 120px;margin-top: 15px;margin-bottom: 0px;text-indent: -24px;}
.p36{text-align: left;padding-left: 48px;margin-top: 2px;margin-bottom: 0px;}
.p37{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p38{text-align: left;padding-left: 120px;margin-top: 17px;margin-bottom: 0px;text-indent: -24px;}
.p39{text-align: left;padding-left: 120px;margin-top: 0px;margin-bottom: 0px;}
.p40{text-align: left;padding-left: 72px;margin-top: 17px;margin-bottom: 0px;}
.p41{text-align: left;padding-left: 120px;margin-top: 16px;margin-bottom: 0px;text-indent: -24px;}
.p42{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p43{text-align: left;padding-left: 96px;margin-top: 16px;margin-bottom: 0px;}
.p44{text-align: left;padding-left: 120px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p45{text-align: left;padding-left: 120px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p46{text-align: left;padding-left: 24px;margin-top: 17px;margin-bottom: 0px;}
.p47{text-align: left;padding-left: 24px;margin-top: 18px;margin-bottom: 0px;}
.p48{text-align: left;padding-left: 48px;margin-top: 18px;margin-bottom: 0px;}
.p49{text-align: left;padding-left: 72px;margin-top: 18px;margin-bottom: 0px;}
.p50{text-align: left;padding-left: 96px;margin-top: 34px;margin-bottom: 0px;}
.p51{text-align: left;padding-left: 120px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p52{text-align: left;padding-left: 144px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p53{text-align: left;padding-left: 144px;margin-top: 2px;margin-bottom: 0px;text-indent: -24px;}
.p54{text-align: left;padding-left: 192px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p55{text-align: left;padding-left: 168px;margin-top: 0px;margin-bottom: 0px;}
.p56{text-align: left;padding-left: 192px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p57{text-align: left;padding-left: 192px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p58{text-align: left;padding-left: 168px;margin-top: 1px;margin-bottom: 0px;}
.p59{text-align: left;padding-left: 192px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p60{text-align: left;padding-left: 192px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
.p61{text-align: left;padding-left: 72px;margin-top: 1px;margin-bottom: 0px;}
.p62{text-align: left;padding-left: 96px;margin-top: 18px;margin-bottom: 0px;}
.p63{text-align: left;padding-left: 144px;margin-top: 17px;margin-bottom: 0px;text-indent: -24px;}
.p64{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p65{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p66{text-align: left;margin-top: 30px;margin-bottom: 0px;border: 1px #2e74b5 solid;text-align: center;}
.p67{text-align: left;margin-top: 30px;margin-bottom: 0px;}
.p68{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p69{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p70{text-align: left;padding-left: 48px;margin-top: 16px;margin-bottom: 0px;text-indent: -24px;}
.p71{text-align: left;padding-left: 48px;margin-top: 3px;margin-bottom: 0px;text-indent: -24px;}
.p72{text-align: left;padding-left: 48px;margin-top: 2px;margin-bottom: 0px;text-indent: -24px;}
.p73{text-align: left;padding-left: 48px;margin-top: 3px;margin-bottom: 0px;text-indent: -24px;}
.p74{text-align: left;padding-left: 48px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p75{text-align: left;padding-left: 48px;margin-top: 18px;margin-bottom: 0px;text-indent: -24px;}
.p76{text-align: left;padding-left: 24px;margin-top: 1px;margin-bottom: 0px;}
.p77{text-align: left;padding-left: 48px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p78{text-align: left;padding-left: 48px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p79{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p80{text-align: left;padding-left: 48px;margin-top: 18px;margin-bottom: 0px;text-indent: -24px;}
.p81{text-align: left;padding-left: 48px;margin-top: 1px;margin-bottom: 0px;text-indent: -24px;}
.p82{text-align: justify;padding-left: 48px;margin-top: 2px;margin-bottom: 0px;}
.p83{text-align: left;margin-top: 21px;margin-bottom: 0px;}
.p84{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p85{text-align: left;margin-top: 20px;margin-bottom: 0px;}
.p86{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p87{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p88{text-align: left;margin-top: 37px;margin-bottom: 0px;}
.p89{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p90{text-align: left;margin-top: 15px;margin-bottom: 0px;}
.p91{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p92{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p93{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p94{text-align: left;margin-top: 26px;margin-bottom: 0px;}
.p95{text-align: center;margin-top: 30px;margin-bottom: 0px;}
.p96{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p97{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p98{text-align: left;margin-top: 15px;margin-bottom: 0px;}
.p99{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p100{text-align: justify;margin-top: 18px;margin-bottom: 0px;}
.p101{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p102{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p103{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p104{text-align: justify;margin-top: 15px;margin-bottom: 0px;}
.p105{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p106{text-align: left;;margin-top: 15px;margin-bottom: 0px;}
.p107{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p108{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p109{text-align: justify;margin-top: 0px;margin-bottom: 0px;}
.p110{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p111{text-align: left;margin-top: 23px;margin-bottom: 0px;}
.p112{text-align: left;margin-top: 14px;margin-bottom: 0px;}
.p113{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p114{text-align: justify;margin-top: 0px;margin-bottom: 0px;}
.p115{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p116{text-align: left;margin-top: 32px;margin-bottom: 0px;}
.p117{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p118{text-align: left;margin-top: 35px;margin-bottom: 0px;}
.p119{text-align: left;margin-top: 31px;margin-bottom: 0px;}
.p120{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p121{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p122{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p123{text-align: left;margin-top: 14px;margin-bottom: 0px;}
.p124{text-align: left;margin-top: 28px;margin-bottom: 0px;}
.p125{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p126{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p127{text-align: left;margin-top: 15px;margin-bottom: 0px;}
.p128{text-align: left;margin-top: 13px;margin-bottom: 0px;}
.p129{text-align: left;margin-top: 25px;margin-bottom: 0px;}
.p130{text-align: left;margin-top: 24px;margin-bottom: 0px;}
.p131{text-align: left;margin-top: 24px;margin-bottom: 0px;}
.p132{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p133{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p134{text-align: left;margin-top: 32px;margin-bottom: 0px;}
.p135{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p136{text-align: left;margin-top: 15px;margin-bottom: 0px;}
.p137{text-align: left;margin-top: 0px;margin-bottom: 0px;}
.p138{text-align: left;margin-top: 16px;margin-bottom: 0px;}
.p139{text-align: left;margin-top: 33px;margin-bottom: 0px;}
.p140{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p141{text-align: left;margin-top: 18px;margin-bottom: 0px;}
.p142{text-align: left;margin-top: 17px;margin-bottom: 0px;}
.p143{text-align: left;margin-top: 14px;margin-bottom: 0px;}
.section {padding: 15px 0 !important;}
</STYLE>
<body>
    <!-- Navigation & Logo-->
    <div class="mainmenu-wrapper indexpage">
        <div class="container">
            <div class="menuextras">
                <div class="extras">
                    <ul>
                        <?php if (!isset($_SESSION['mob_id'])) { ?>
                            <a href="login.php" title="Already A Member? Log In" data-toggle="tooltip" class="btn btn-warning">Log in</a>
                            <a href="signup.php" title="Not A Member? Register Now" data-toggle="tooltip" class="btn btn-warning">Sign up</a>
                        <?php } else { ?>
                            <ul>
                                <li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i>
                                    <a href="#"><b>Balance: <?php echo $currency_symb; ?> <?php echo wallet(); ?></b></a></li>
                                <li>
                                    <div class="btn-group pull-right">									
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">										
                                            <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo (isset($_SESSION['CompanyName']) && !empty($_SESSION['CompanyName'])) ? $_SESSION['CompanyName'] : $_SESSION['user_name'] ?></span>										
                                            <span class="caret"></span>										
                                        </button>									
                                        <ul class="dropdown-menu">										
                                            <li><a href="myaccount.php">My account</a></li>										
                                            <li class="divider"></li>										
                                            <li><a href="logout.php">Log out</a></li>										
                                        </ul>									
                                    </div>	
                                </li>
                            </ul>

                        <?php } ?>

                    </ul>
                </div>
            </div>
            <?php require_once 'nav.php'; ?>
        </div>
    </div>
    <br>
    <div class="section term_sec">
        <div class="container" style="box-shadow: 0px 0px 1px 1px;padding: 10px 32px 20px 40px;">
            <div class="row">
                <?php
               $sql="SELECT * FROM dashboard where id=5";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
//                                    print_r($result);
                 foreach ($result as $value) {
                   
                 
                ?>
                <div class="extras">
                    <!--<h1 class="term_title"> <?php // echo $value['title']; ?></h1>-->
                    <div class="description"> 
                        <p>
                            <?php echo $value['contents']; ?>
                        </p> 
                    </div>
                </div>
                 <?php }?>
            </div>
        </div>
    </div>
</body>
<?php
require('footer.php');
?>
