<?php
/**
 * Site Map
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: sitemap.php, v1.00 2015-06-29 10:12:05
 */

include("inc/header.php");
?>
<!-- Main Content -->
<section class="content-wrap">

    <!-- Breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l12">
                <h1>Site Map</h1>
                <!--<p><i class="fa fa-angle-right"></i> The food recalls report page displays a list of recalls by a specific manufacturer. The list can be instantly filtered by typing in the search field.</p>-->
                    <ul>
                        <li><i class="mdi-alert-warning title-icon"></i> Welcome to the Food Recalls Dashboard. </li>
                    </ul>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <div class="row">
        <!--  Search  -->
        <div class="col s12 l12">
            <div class="card">
                <?php include "inc/search.php"; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!--  Line Chart  -->
        <div class="col s12 l12">
            <div class="card">
                <div class="title">
                    <h5>Site Map</h5>
                    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a> </div>
                <div class="content">
                    <a href="index.php">Food Recalls Dashboard</a><br>
                    <a href="report.php">Food Recalls Reports Page</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Main Content -->
<script type="text/javascript" src="assets/vendor/jquery/jquery.min.js"></script>

<?php include("inc/footer.php"); ?>