<?php
require("header.php");
ob_start();
@session_start();
if (isset($_SESSION['user_name'])) {
    ?>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>
                            <li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="#"><b> Current Balance $0.00</b></a></li>

                            <li><div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['user_name'] ?></span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout">Log Out</a></li>
                                    </ul>
                                </div></li>
                        </ul>
                    </div>
                </div>
                <nav id="mainmenu" class="mainmenu">
                    <ul>
                        <li class="logo-wrapper"><a href="index">B2CMarketingTech</li>
                        <li class="active">
                            <a href="myaccount">Home</a>
                        </li>


                        <li >
                            <a href="addmoney">Add Money</a>
                        </li>
                        <li >
                            <a href="pending">Pending Deposits</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Homepage Slider -->
        <div class="eshop-section section">
            <div class="container">
                <h2>Our products</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="shop-item">

                            <div class="title">
                                <h3><a href="#"> B2CMarketingTech Email Marketing and Newsletter Plan</a></h3>
                            </div>
                            <div class="description">

                                <h5 align="center">About the plan</h5>
                                <p>You can purchase a license for 1 year to 10 years.
                                    Comes packaged with B2CMarketingTech Email Marketing and Newsletter Software.
                                    Supports Up to 1 million subscribers of your newsletters.
                                    Log in to your B2CMarketingTech Email Marketing and Newsletter Software
                                    with your B2CMarketingTech login credential and start using the software.
                                </p>

                                <h4 align="center">Features</h4>
                                <ol>1. Intuitive template editor</ol>

                                <ol>2. Stunning and effective email templates</ol>
                                <ol>3. Clever autoresponders</ol>
                                <ol>4. Real-time email tracking</ol>
                                <ol>5. Achieve more from your email marketing</ol>
                                <ol>6. Free Inbox Inspector</ol>
                                <ol>7. Free Spam Test</ol>
                                <ol>8. Send Time optimization</ol>
                                <ol>9. Automatic A/B testing</ol>
                                <ol>10. Targeting</ol>
                                <ol>11. Personalisation and dynamic content</ol>
                                <ol>12. Multiple awards</ol>
                                <ol>13. Hundreds of happy clients</ol>



                            </div>
                            <div class="price">
                                Price: $30
                            </div>


                            <div class="actions">
                                <a href="addmoney" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Purchase</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="shop-item">

                            <div class="title">
                                <h3><a href="addmoney"><!--B2CMarketingTech Marketing Automation Software-->B2CMarketingTech US Email List</a></h3>
                            </div>
                            <div class="description">

                                <h5 align="center"><!--About B2CMarketingTech Mailing List-->About B2CMarketingTech US Email List</h5>
                                <!--<p> Easily reach your prospects with business email lists.
                                        Send professional, effective email campaigns to a targeted list of
                                        prospects.


                                </p>
                                
                                <h5 align="center">Features</h5>
                                <ol>1. Targeted Email List with 1 lakh email addresses</ol>
                                <ol>2. Privacy Protection</ol>
                                <ol>3. Superior Deliverability</ol>
                                <ol>4. Mobile-ptimized</ol>
                                <ol>5. Social Integration</ol>
                                <ol>6. Full Customization</ol>
                                <ol>7. CRM for your business.Turns contacts to customers with contact management.</ol>
                                <ol>8. Market Automation.Automates customer leads and follow up on customers.</ol>
                                <ol>9. Sales Automation.Helps your sales grow faster.</ol>
                                <ol>10. Sell online.upgrade your business to a digital storefront.Convinient for your business and customers.</ol>
                                <ol>11. Track your business progress through reports</ol>
                                <ol>12. Intergrate systems.Helps you accelerate your business.</ol>-->

                                <p>Get a list of 1000000 US email addresses. We use hundreds of different
                                    sources to aggregate our consumer email database. We gather raw data
                                    from our own marketing and publication offers, third party offers,
                                    online surveys, data acquisition, behavioral data and other accurate
                                    sources before we integrate proprietary enrichment sources.
                                    All email leads are 100% permission based, Can Spam compliant and
                                    updated weekly. We provide online marketers the ability to reach US
                                    local targeted audiences using quality direct email and postal
                                    marketing data.<br><br>
                                    Every data order passes through our email hygiene process to ensure
                                    that emails have a 95%+ delivery rate.<br><br>
                                    DON'T GET BLOCKED!<br>
                                    GET SUPERIOR EMAIL DELIVERY and have successful email campaigns.
                                </p>




                            </div>

                            <div class="price">
                                Price: $50
                            </div>

                            <div class="actions">
                                <a href="addmoney" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i> Purchase</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="shop-item">

                            <div class="title">
                                <h3><a href="addmoney">B2CMarketingTech Marketing Automation Software</a></h3>
                            </div>
                            <div class="description">

                                <h5 align="center">About the software</h5>
                                <p> B2CMarketingTech Marketing Automation Software enables
                                    businesses to create a sales and marketing strategy and map out each
                                    step; centralize customer interactions and daily activities; capture
                                    new leads and automate follow-up based on preferences and needs;
                                    follow-up, contact management all from one place. You can purchase the
                                    license for 1 year to 10 years. License is renewable. Log in to your
                                    B2CMarketingTech Marketing Automation Software with your B2CMarketingTech login
                                    credentials and start using this service.

                                </p>

                                <h5 align="center">Features</h5>
                                <ol>1. Analytics / ROI Tracking</ol>
                                <ol>2. Campaign Segmentation</ol>

                                <ol>3. Contact Management</ol>
                                <ol>4. Content / Blogging Platform</ol>
                                <ol>5. Direct Mail Management</ol>
                                <ol>6. Email Drip Campaigns</ol>
                                <ol>7. Landing Pages / Web Forms</ol>
                                <ol>8. Lead Management</ol>
                                <ol>9. Lead Nurturing</ol>
                                <ol>10. Lead Scoring</ol>
                                <ol>11. Multi Channel Management</ol>
                                <ol>12. Multivariate Testing</ol>
                                <ol>13. Referrals / Affiliates</ol>
                                <ol>14. Search Marketing</ol>
                                <ol>15. Social Marketing</ol>
                                <ol>16. Web Visitor Tracking</ol>





                            </div>
                            <div class="price">
                                Price: $40
                            </div>
                            <div class="actions">
                                <a href="addmoney" class="btn btn-small"><i class="icon-shopping-cart icon-white"></i>Purchase</a> 
                            </div>

                        </div>



                    </div>

                </div>
            </div>

        </div>
        <!-- End Homepage Slider -->


    <?php
} else {
    
}

require("footer.php");
ob_end_flush();
?>