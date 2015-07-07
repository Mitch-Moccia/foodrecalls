<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: index.php, v1.00 2015-06-29 10:12:05
 */
$firm = isset($_GET['firm']) ? urlencode($_GET['firm']) : '';
$search = isset($_GET['search']) ? urlencode($_GET['search']) : '';
$state = isset($_GET['state']) ? $_GET['state'] : 'All';
$start = isset($_GET['start']) ? $_GET['start'] : '';
$end = isset($_GET['end']) ? $_GET['end'] : '';
include("inc/header.php");
?>
<!-- Main Content -->
<section class="content-wrap">
    <!-- Breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col s12 m9 l12">
                <h1>Food Recalls Dashboard</h1>
                <ul>
                    <li><i class="mdi-alert-warning title-icon"></i> Welcome to the Food Recalls Dashboard. Enter a search term, search by state, or even set a date range to learn about food recalls that interest you. If no date range is specified, the default date range of January 1, 2004 through today will be used.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <div class="row">
        <!--  Line Chart  -->
        <div class="col s12 l12">
            <div class="card">
                <?php include "inc/search.php"; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!--  Line Chart  -->
        <div class="col s12 l7">
            <div class="card">
                <div class="title">
                    <h5 id="chart-title1"><div class="hide">Chart 1</div></h5>
                    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a> </div>
                <div class="content">
                    <div id="chart4" style="height: 540px;"></div>
                </div>
            </div>
        </div>
        <!--  /Line Chart  -->

        <!--  Manufacturer List -->
        <div class="col s12 l5">
            <div class="card">
                <div class="title">
                    <h5 id="chart-title2"><div class="hide">Chart 2</div></h5>
                    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a> </div>
                <div class="content">
                    <table id="listmanufacturers" class="display table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Manufacturer Name</th>
                            <th>Recall Count</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!--  /Manufacturer List -->
    </div>
    <div class="row">
        <!--  Discrete Bar Chart  -->
        <div class="col s12 l7">
            <div class="card">
                <div class="title">
                    <h5 id="chart-title3"><div class="hide">Chart 3</div></h5>
                    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a> </div>
                <div class="content">
                    <div id="chart3" style="height: 350px;"></div>
                </div>
            </div>
        </div>
        <!--  /Discrete Bar Chart  -->

        <!--  Pie Chart  -->
        <div class="col s12 l5">
                <div class="card">
                    <div class="title">
                        <h5 id="chart-title4"><div class="hide">Chart 4</div></h5>
                        <a class="close" href="#"><div class="hide">Close</div>
                            <i class="mdi-content-clear"></i>
                        </a>
                        <a class="minimize" href="#"><div class="hide">Minimize</div>
                            <i class="mdi-navigation-expand-less"></i>
                        </a>
                    </div>
                    <div class="content">
                        <div class="map" id="map_election" style="margin:-30px -20px 30px -30px; width: 112%; height: 350px;"></div>
                    </div>
                </div>
            </div>
        <!--  /Pie Chart  -->
    </div>
</section>
<!-- /Main Content -->
<script type="text/javascript" src="assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">

    function setDynamicHeaders() {
        $("#chart-title1").text(chartheader);
        $("#chart-title2").text(manlistheader);
        $("#chart-title3").text(barchartheader);
        $("#chart-title4").text(usmapheader);
    }
    setDynamicHeaders();
</script>

<?php include("inc/footer.php"); ?>