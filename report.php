<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: report.php, v1.00 2015-06-29 10:12:05
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
                <h1>Reports Page</h1>
                <!--<p><i class="fa fa-angle-right"></i> The food recalls report page displays a list of recalls by a specific manufacturer. The list can be instantly filtered by typing in the search field.</p>-->
                    <ul>
                        <li><i class="mdi-alert-warning title-icon"></i> The food recalls report page displays a list of recalls by a specific manufacturer. The list can be instantly filtered by typing in the Filter Results field inside each module. </li>
                    </ul>
            </div>
            <!--<div class="col s12 m3 l2 right-align">
                <a href="#" class="btn grey lighten-3 grey-text z-depth-0 chat-toggle"><i class="fa fa-comments"></i></a>
            </div>-->
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
        <div class="col s12 l7">
            <div class="card">
                <div class="title">
                    <h5 id="chart-title1"><div class="hide">Chart 1</div></h5>
                    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a> </div>
                <div class="content">
                    <!--<div id="chart1" style="height: 300px;"></div>
                              <div id="chart4" style="height: 600px;"></div>-->

                    <!--<h3 id="recall-firm"></h3>-->

                    <table id="listreport" class="display table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Recall Data</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>


                </div>
            </div>
        </div>
        <!--  /Line Chart  -->

        <!--  Manufacturer List  -->
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
        <!--  /Manufacturer List  -->
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
    function fetchReportsByFirm() {
        $.ajax({
            //url: 'http://api.fda.gov/food/enforcement.json?search=recalling_firm:"<?php //echo urlencode($firm); ?>"&limit=100',
            url: 'http://api.fda.gov/food/enforcement.json?search=recalling_firm:"<?php echo urlencode($firm); ?>"&limit=100',
            dataType: 'json'
        })
            .fail(function () {
                alert("There was a problem connecting to the API, please try a different manufacturer or try again.");
            })
            .done(function (data) {

                $("#chart-title1").text("Viewing  " + data.meta.results.total + " Recalls for <?php echo urldecode($firm) ; ?>");
                var dynamicTable = '';
                var thedate = '';
                for (var j in data.results) {
                    thedate = data.results[j].report_date;
                    thedate = thedate.slice(4) + thedate.slice(0, 4);
                    dynamicTable +='<tr><td> \
                        <h4><i class="fa fa-exclamation-circle"></i> Reason For Recall <a href=\"http://www.accessdata.fda.gov/scripts/enforcement/enforce_rpt-Product-Tabs.cfm?action=select&recall_number=' + data.results[j].recall_number + '\&w=' + thedate + '&lang=eng" target=\"_blank\">#' + data.results[j].recall_number + '</a></h4>\
                        <p id="recall-reason"><i class="fa fa-indent"></i> ' + data.results[j].reason_for_recall + '</p>\
                        <h4><i class="fa fa-info-circle"></i> Product Description</h4>\
                        <p id="recall-desc"><i class="fa fa-indent"></i> ' + data.results[j].product_description + '</p>\
                        <div class="col s12 l6 padb0"><h4><i class="fa fa-calendar"></i> Initiation Date</h4>\
                        <p id="recall-date"><i class="fa fa-indent"></i> ' + data.results[j].report_date + '</p></div>\
                        <div class="col s12 l6 padb0"><h4><i class="fa fa-pie-chart"></i> Quantity</h4>\
                        <p id="recall-qty"><i class="fa fa-indent"></i> ' + data.results[j].product_quantity + '</p></div>\
                        <div class="col s12 l6 padb0"><h4><i class="fa fa-list"></i> Classification</h4>\
                        <p id="recall-date"><i class="fa fa-indent"></i> ' + data.results[j].classification + '</p></div>\
                        <div class="col s12 l6 padb0"><h4><i class="fa fa-location-arrow"></i> City, State</h4>\
                        <p id="recall-qty"><i class="fa fa-indent"></i> ' + data.results[j].city + ', '  + data.results[j].state + '</p></div>\
                        </td></tr>';
                }
                $('#listreport tbody').append(dynamicTable);
            });
    }
    fetchReportsByFirm();
    setDynamicHeaders();
</script>
<?php include("inc/footer.php"); ?>