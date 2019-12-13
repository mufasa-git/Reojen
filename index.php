<?php

session_start();
if (isset($_SESSION['mob_id']) && $_SESSION['mob_id'] != "") {

    header("location: home.php"); // Redirecting To Other Page
    return;
}

if (isset($_COOKIE['slrememberme']) && $_COOKIE['slrememberme'] != null) {
    header("location: home.php");
}

//change the below code please change the passwd in query .php to
require_once('query.php');
$QueryFire = new QueryFire();
$products = $QueryFire->getAllData('products', $where = 'id=2');
$nowType = $connection->query('SELECT * FROM settings WHERE name="payment_type" LIMIT 1')->fetch_assoc();

if ($nowType['value'] == 'BACS') {
    $currency_symbol = '&#163;';
} else {
    //$currency_symbol = '&#x24;';	
}$currency_symbol = '<i class="fa fa-gbp"></i>';
require("header.php");
?>
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
                                    <a href="#"><b>Balance: <?= $currency_symb?>0.00</b></a></li>

                                <li><div class="btn-group pull-right">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['user_name'] ?></span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="home.php">Dashboard</a></li>
                                            <li><a href="myaccount.php">My Account</a></li>
                                            <li class="divider"></li>
                                            <li><a href="logout.php">Log out</a></li>
                                        </ul>
                                    </div></li>
                            </ul>

                        <?php } ?>


                    </ul>
                </div>
            </div>
            <?php require_once 'nav.php'; ?>
        </div>
    </div>



    <!-- Homepage Slider -->
    <div class="homepage-slider">
        <div id="sequence">
            <ul class="sequence-canvas">
                <!-- Slide 1 -->
                <li class="bg4">

                    <img class="slide-img"   />
                </li>
                <!-- End Slide 1 -->
                <!-- Slide 2 -->
                <li class="bg3"> 

                    <img class="slide-img"   />
                </li>
                <!-- End Slide 2 -->
                <!-- Slide 3 -->
                <li class="bg1"> 

                    <img class="slide-img"  />
                </li>
                <!-- End Slide 3 -->
            </ul>
            <div class="sequence-pagination-wrapper">
                <ul class="sequence-pagination">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Homepage Slider -->
    <p ><h4 align="center" style=" font-size: 35px;">Our products</h4></p>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">

                <div class="service-wrapper">

                    <h3>1. Reojen Newsletter Sending And Email Marketing Software</h3>

                    <!--<h5 align="center">About the plan</h5>-->

<!--<p>You can purchase the license for 3 months to 5 years. You can renew the license anytime after it expires
                Comes packaged with Reojen Email Marketing and Newsletter Software.
                Supports up to 1000000 subscribers of your newsletters.
                Log in to your Reojen Email Marketing and Newsletter Software
                with your Reojen login credential and start using this service.
                </p>-->

                    <h4 align="center">Features</h4>
                    <ol>1. Intuitive template editor</ol>
                    <p>Meet the revolutionary Reojen Designer. Create beautiful and effective newsletters without any coding skills.
                        Access your Reojen account from anywhere. Your files and data, as well as Reojen's tools, are secure in a 
                        dedicated cloud and are always ready to meet your needs.
                    </p>
                    <ol>2. Stunning and effective email templates</ol>
                    <p>Dozens of free, industry-specific newsletters and emails created specifically for your business. Our templates have 										been created and designed by award-winning artists, passed our marketing effectiveness tests and are ready to be 
                        customised, personalised, shared and sent.
                    </p>
                    <ol>3. Clever autoresponders</ol>
                    <p>Automate your communication with subscribers. Create lead nurturing programs, e-learning courses or take advantage
                        of easy-to-use cyclical messages. Let Reojen respond to all of your customers actions for you.
                    </p>
                    <ol>4. Real-time email tracking</ol>
                    <p>Mass mailing is the most effective advertising form on the Internet. Find out who is opening your newsletters and
                        clicking on the links in your email messages.
                    </p>
                    <ol>5. Achieve more from your email marketing</ol>
                    <p>Reojen has many useful functions, which will optimise your mass email communication. You will save a lot of
                        time and increase the effectiveness of your deliveries. Our advanced technologies are as easy as 1, 2, 3.
                    </p>

                    <ol>6. Free Inbox Inspector</ol>
                    <p>Test how your message will look in 24 different email clients without actually sending out your test campaign.</p>

                    <ol>7. Free Spam Test</ol>
                    <p>Release your email from content which may be considered as spam.</p>

                    <ol>8. Send Time Optimization</ol>
                    <p>Deliver your messages when the click ratio is the highest.</p>

                    <ol>9. Automatic A/B testing</ol>
                    <p>Explore the most effective solutions by testing alternative subject lines, email content and template designs.</p>

                    <ol>10. Targeting</ol>
                    <p>
                        Aim for people ready to buy using geolocation, behavioural and declarative data.
                    </p>

                    <ol>11. Personalisation and dynamic content</ol>
                    <p>Boost engagement of your subscribers using all available elements to personalise your emails. Use auto-responders
                        to automate campaigns.</p>

                    <ol>12. Multiple awards</ol>
                    <p>We have received multiple awards in email marketing category for the highest ROI and the creativity of our
                        solutions.</p>

                    <ol>13. Hundreds of happy clients</ol>
                    <p>A regular newsletter is the best way to build your brand and drive sales and Reojen has ticked all the right
                        boxes for me - solid system, reliable delivery and fair price.
                    </p>
                   <!-- <p><b>Price: $30/3 months</b></p>-->
                    <img class="img-responsive baner_one" src="img/frontbaner1.jpg">
                    <a href="signup.php" class="btn">Get Started</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">

                    <h3>2. Reojen Geographic Location Based Targeted Email Lists</h3>

                    <h5 align="center">About Reojen Geographic Location Based Targeted Email Lists</h5>
                    <p>Get a list of 1000000 targeted email addresses for only <?= $currency_symb?><?= $products[0]['price'] ?>. We have many different geographic location based targeted email lists. You can choose and purchase the email list of the geographic location you like. We use hundreds of different sources to aggregate our consumer email database. We gather raw data from our own marketing and publication offers, third party offers,online surveys, data acquisition,
                        behavioral data and other accurate sources before we integrate proprietary enrichment sources. All email leads are 100% permission based, Can Spam compliant and updated weekly. We provide online marketers the ability to reach US local
                        targeted audiences using quality direct email and postal marketing data.<br><br>
                        Every data order passes through our email hygiene process to ensure that emails have a 95%+ delivery rate.<br><br>
                        DON'T GET BLOCKED!<br>
                        GET SUPERIOR EMAIL DELIVERY and have successful email campaigns.
                    </p>
<!-- <p><b>Price: $50</b></p>-->
                    <img class="img-responsive baner_one" src="img/frontbaner2.jpg">
                    <a href="signup.php" class="btn">Get Started</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">

                    <h3>3. Reojen Marketing Automation Software</h3>

                    <h4 align="center">Features</h4>
                    <div>
                        <h3>CRM for Small Business</h3>
                        <h5>Turn contacts into customers with <span class="in-block">Contact Management</span></h5>
                        <p>Import and organize the contacts that come to your business (both online and offline) with tagging and segmentation.
                            Collect data about your leads' behaviors, score them based on marketing interactions, and prioritize the leads that are 
                            hottest and ready to buy. Track engagement and customize follow-up messages based on unique customer profiles.</p>
                        <p>Basically, organize contacts so you can get to know them better and speak directly to their needs. It's everything you
                            need to know about your leads and customers in one place, so nothing falls through the cracks. CRM for small business has
                            never been more powerful.
                        </p>
                    </div>                           
                    <div>
                        <h3>Marketing Automation</h3>
                        <div class="green-hr"></div>  
                        <h5>Maximize customer engagement</h5>
                        <p>Never worry about missing an opportunity to generate leads again. Build relationships and engage your audience with
                            personalized, automated follow-up that helps you market smarter, not harder.</p>
                        <p>Reojen helps streamline the way you market to new customers by automating lead capture and follow-up. Trigger
                            personalized communications based on email sends, opens, clicks, form submissions, and payment history, so you know 
                            messages will be timely and relevant to customers' needs.
                        </p>
                    </div>

                    <div>
                        <h3 class="txt-white">Sales Automation</h3>
                        <h5 class="txt-white">Grow sales faster</h5>
                        <p>Spend less time working deals and more time closing them by having all of your sales activities, tasks and appointments in
                            one place. Reojen will automatically kick off follow-up emails, tasks, appointments and more. Whether sales is just one
                            of the many hats you wear or you have a whole sales team behind you, sales funnel automation is the fastest way to sell more.
                        </p>
                    </div>
                    <div>
                        <h3>Sell Online</h3>
                        <h5>Keep the cash flowing with online <span class="in-block">storefronts and payments</span></h5>
                        <p>Introducing your upgraded digital storefront. Easy to sell. Easy for customers to buy. </p>
                        <p>Set up online shopping carts and manage your online store, inventory, fulfillment and billing from a single system. Plus,
                            create discounts, subscription plans, and promo offers to sell home or services.</p>
                        <p>Best of all, your shopping cart and CRM are integrated in one system. When someone makes a
                            purchase, it will trigger a personalized, automated sequence of communication. Youll be able to keep track of customer
                            interactions and create the most seamless experience possible. </p>
                    </div>

                    <div>
                        <h3 class="txt-white">View Reports</h3>
                        <div class="green-hr"></div>  
                        <h5 class="txt-white">Want to know how your business is performing? Well show you.</h5>
                        <p>Powerful reporting makes it easy to quickly assess whats working and what isn't. The days of guessing are behind you. Make
                            data-driven decisions to improve your marketing and business. </p>
                    </div>

                    <div>
                        <h3>Integrate Systems</h3>
                        <div class="green-hr"></div>  
                        <h5>Accelerate your success and do more with an ecosystem of Apps and Partners</h5>
                        <p>No two small businesses are exactly alike. If you use multiple software systems in your business, you'll find hundreds of
                            integrations in the Reojen Marketplace. It's a growing platform of service and technology partners that will help you
                            extend the value of Reojen and streamline your business.
                        </p>
                        <p>With apps, writers, programs, designers, developers, partners and consultants certified by Reojen to provide in-depth
                            training, the possibilities are truly limitless.
                        </p>
                    </div>
                    <!-- <p><b>Price: $40/3 months</b></p>-->
                    <img class="img-responsive baner_one" src="img/frontbaner3.jpg">
                    <a href="signup.php" class="btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services -->


<?php require("footer.php"); ?>
