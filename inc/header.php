<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: header.php, v1.00 2015-06-29 10:12:05
 */
define("_VALID_PHP", true);
require_once("config.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" dir="ltr">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Food Recalls Dashboard by OneSpring.net</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/vendor/nanoScroller/nanoscroller.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/material-design-icons/css/material-design-icons.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/ionicons/css/ionicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/nvd3/nv.d3.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/jquery-tags-input/jquery.tagsinput.css"/>
    <link rel="stylesheet" type="text/css" href="assets/vendor/pikaday/pikaday.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/google-code-prettify/prettify.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>

    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<script type="text/javascript">
    var query_string = "https://api.fda.gov/food/enforcement.json?search=report_date:[<?php echo $start; ?>+TO+<?php echo $end; ?>]+AND+<?php echo $search; ?>";
    var start = "<?php echo $start; ?>";
    var end = "<?php echo $end; ?>";
    var search = "<?php echo $search; ?>";
    var state = "<?php echo $state; ?>";
    var reporttype = "food";
    var classification = "";
    //"Food Recalls By Manufacturer - " + search + " (" + start + " - " + end + ")"

    var chartheader = " Food Recalls By Manufacturer ";
    if(state != "All"){ chartheader += " in "+state}
    if(search != ""){ chartheader += " containing the term "+search}
    if(classification != ""){ chartheader += " classification of "+classification}

    var manlistheader = " Recall List of Manufacturers ";
    if(state != "All"){ manlistheader += " for "+state}
    if(search != ""){ manlistheader += " containing the term "+search}
    if(classification != ""){ manlistheader += " classification of "+classification}

    var barchartheader = " Top 10 Recall Reports By State ";
    if(state != "All"){ barchartheader += " for "+state}
    if(search != ""){ barchartheader += " containing the term "+search}
    if(classification != ""){ barchartheader += " classification of "+classification}

    var usmapheader = " Recall By State Map ";
    if(state != "All"){ usmapheader += " for "+state}
    if(search != ""){ usmapheader += " containing the term "+search}
    if(classification != ""){ usmapheader += " classification of "+classification}

    var querymanufacturers = "&search=";
    if(start == "" ){ querymanufacturers += "report_date:[20040101+TO+20150501]"} else { querymanufacturers += "report_date:["+start+"+TO+"+end+"]"} // Set the max date range in the query string if no other options are selected
    if(state != "All"){ querymanufacturers += "+AND+state:"+state}
    if(search != ""){ querymanufacturers += "+AND+reason_for_recall:"+search}

    var querylink = "&search=";
    if(search != ""){ querylink += search}
    if(start != ""){ querylink += "&start="+start + "&end="+end}
    if(state != "All"){ querylink += "&state="+state}
</script>
<nav class="navbar-top">
    <div class="nav-wrapper">

        <!-- Sidebar toggle -->
        <a href="#" class="yay-toggle"><div class="hide">Toggle Sidebar</div>
            <div class="burg1"></div>
            <div class="burg2"></div>
            <div class="burg3"></div>
        </a>
        <!-- Sidebar toggle -->

        <!-- Logo -->
        <a href="#" class="brand-logo"> <img src="assets/images/logo.png" alt="Food Recalls Dashboard" width="300" height="79"> </a>
        <!-- /Logo -->

        <!-- Menu -->
        <ul>
            <li class="user"> <a class="dropdown-button" href="#" data-activates="user-dropdown"> <img src="assets/images/user.jpg" alt="User Icon for Concerned Consumer" class="circle" width="35" height="35">Concerned Consumer<i
                        class="mdi-navigation-expand-more right"></i> </a>
                <ul id="user-dropdown" class="dropdown-content">
                    <li><a href="https://open.fda.gov/" target="_blank"><i class="fa fa-external-link-square"></i> OpenFDA</a> </li>
                    <li><a href="http://www.fda.gov/" target="_blank"><i class="fa fa-external-link-square"></i> FDA</a> </li>
                    <li><a href="https://18f.gsa.gov/" target="_blank"><i class="fa fa-external-link-square"></i> 18F</a> </li>
                    <li><a href="http://onespring.net/" target="_blank"><i class="fa fa-external-link-square"></i> OneSpring</a> </li>
                    <li class="divider"></li>
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a> </li>
                </ul>
            </li>
        </ul>
        <!-- /Menu -->

    </div>
</nav>
<aside class="yaybar yay-shrink yay-hide-to-small yay-gestures">
    <div class="top">
        <div>
            <!-- Sidebar toggle -->
            <a href="#" class="yay-toggle"><div class="hide">Toggle Sidebar</div>
                <div class="burg1"></div>
                <div class="burg2"></div>
                <div class="burg3"></div>
            </a>
            <!-- Sidebar toggle -->

            <!-- Logo -->
            <a href="#" class="brand-logo"> <img src="assets/images/logo.png" alt="Food Recalls Dashboard" width="300" height="79"> </a>
            <!-- /Logo -->
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Menu</li>
                <li> <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
                <li class="label">Threat Levels</li>
                <li class="content"> <span><i class="fa fa-spinner"></i> Life Threatening</span>
                    <div class="progress small">
                        <div class="red accent-5" style="width: 70%"></div>
                    </div>
                    <span><i class="fa fa-spinner"></i> Adverse Health Effects</span>
                    <div class="progress small">
                        <div class="light-blue accent-5" style="width: 87%"></div>
                    </div>
                    <span><i class="fa fa-spinner"></i> Labeling Issues</span>
                    <div class="progress small">
                        <div class="light-green accent-5" style="width: 37%"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
<!-- /Sidebar -->