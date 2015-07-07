<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: footer.php, v1.00 2015-06-29 10:12:05
 */
?>

<footer>&copy; 2015 Designed & Developed by <a href="http://www.onespring.net" target="_blank">OneSpring.net</a> | <a href="sitemap.php">Site Map</a></footer>
<script type="text/javascript" src="assets/js/settings.js"></script>
<script type="text/javascript" src="assets/vendor/jqueryRAF/jquery.requestAnimationFrame.min.js"></script>
<script type="text/javascript" src="assets/vendor/nanoScroller/jquery.nanoscroller.min.js"></script>
<script type="text/javascript" src="assets/vendor/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/vendor/jquery-tags-input/jquery.tagsinput.js"></script>
<script type="text/javascript" src="assets/vendor/pikaday/moment.js"></script>
<script type="text/javascript" src="assets/vendor/pikaday/pikaday.js"></script>
<script type="text/javascript" src="assets/vendor/pikaday/pikaday.jquery.js"></script>
<script type="text/javascript" src="assets/vendor/dataTables/js/dataTablesmin.js"></script>
<script type="text/javascript" src="assets/vendor/d3/d3.min.js"></script>
<script type="text/javascript" src="assets/vendor/nvd3/nv.d3.min.js"></script>
<script type="text/javascript" src="assets/vendor/d3/topojson.js"></script>
<script type="text/javascript" src="assets/vendor/d3/datamaps.usa.min.js"></script>
<script type="text/javascript" src="assets/vendor/sortable/Sortable.min.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/vendor/google-code-prettify/prettify.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {

        var listmanufacturers = $('#listmanufacturers');

        // Build table by API call
        listmanufacturers.dataTable({
            "scrollY": "450px",
            "scrollCollapse": true,
            "aaSorting": [[ 1, "desc" ]],
            "paging": false,
            "dom": '<"top"i>rft',
            "ajax": {
                "url": "<?php echo BASEURL ;?>parser.php?p=1&q=http://api.fda.gov/food/enforcement.json?count=recalling_firm.exact" + querymanufacturers + "&limit=100",
                "dataSrc": "",
                "cache": true
            },
            "oLanguage": {
                "sSearch": "Filter Results: ",
                "sInfo": 'Showing _END_ results ',
                "sInfoEmpty": 'No results to show',
                "sEmptyTable": "No results found, please try again.",
                "sInfoFiltered": "out of _MAX_"
            },
            "columns": [
                { "data": "term" },
                { "data": "count" }
            ]

        }); // dataTables

        // Create clickable table rows by grabing the text content in the first column of the row clicked

        listmanufacturers.on("click","tr", function() {
            var firsttext = $(this).children(":first").text();
            firsttext = firsttext.split(",")[0];
            firsttext = firsttext.replace(/'/g,"");
            //firsttext = encodeURIComponent(firsttext);
            //firsttext = encodeURIComponent(str).replace(/[!'()]/g, escape).replace(/\*/g, "%2A");
            //alert(firsttext);
            var link;
            link = '<?php echo BASEURL ;?>report.php?firm=' + firsttext + ''+ querylink;
            //alert(link);
            window.location = link;

        });

        // Build the reports list table
        setTimeout(function(){
            $('#listreport').dataTable({
                "bProcessing": true,
                "bDeferRender": true,
                "scrollY": "450px",
                "scrollCollapse": true,
                "paging": false,
                "dom": '<"top"i>rft',
                "oLanguage": {
                    "sSearch": "Filter Results: ",
                    "sInfo": 'Showing _END_ results ',
                    "sInfoEmpty": 'No results to show',
                    "sEmptyTable": "No results found, please try again.",
                    "sInfoFiltered": "out of _MAX_"
                },
                "fnPreDrawCallback":function(){
                },
                "fnInitComplete":function(){
                    //this.fnAdjustColumnSizing();
                }
            }); // dataTables
        },500);
    }); //doc ready

    /*
     * Discrete Bar Chart
     */
    (function () {
        nv.addGraph(function () {
            var chart = nv.models.discreteBarChart()
                    .margin({right: 10, left: 40})
                    .x(function (d) {
                        return d.label
                    })    //Specify the data accessors.
                    .y(function (d) {
                        return d.value
                    })
                    .staggerLabels(false)
                    .tooltips(false)
                    .showValues(true)
                ;
            chart.valueFormat(d3.format('f')); // Format the numbers to exclude the decimal point
            chart.yAxis.tickFormat(d3.format(',f'));
            //chart.labelFormat(d3.format('f'));
            d3.select('#chart3').append('svg')
                .datum(exampleData1())
                .call(chart);
            nv.utils.windowResize(chart.update);
            return chart;
        });

        function exampleData1() {
            return [
                {
                    key: "Cumulative Return",
                    <?php $query_string = API_BASEURL . "count=recalling_firm.exact&search=$search&state=$state&start=$start&end=$end&limit=10";
                   $theJSON = file_get_contents(BASEURL . "parser.php?p=5&q=". $query_string);
                   echo "values:" . $theJSON;
                   ?>
                }
            ]


        }
    }()); // Bar Chart

    /*
     * Pie Chart
     */
    var query_string = "<?php echo API_BASEURL ; ?>count=recalling_firm.exact&limit=9";
    (function () {
        //Donut chart example
        nv.addGraph(function () {
            var chart = nv.models.pieChart().margin({top: -30, left: 0, bottom: -60})
                .x(function (d) {
                    return d.term
                })
                .y(function (d) {
                    return d.count
                })
                .showLabels(true)
                .labelThreshold(.05)
                .labelType("percent")
                .donut(true)
                .donutRatio(0.35);

            d3.select('#chart4').append('svg')
                .datum(exampleData())
                .transition().duration(350)
                .call(chart);
            /*d3.select(".nv-legendWrap")
             .attr("transform", "translate(0,0)");*/
            return chart;
        });

        function exampleData() {
            <?php
            $query_string = API_BASEURL . "count=recalling_firm.exact&search=$search&state=$state&start=$start&end=$end&limit=10";
            $theJSON = file_get_contents(BASEURL . "parser.php?p=3&q=". $query_string);
            echo $theJSON;
            ?>
        }
    }()); // Pie Chart


    /*
     * USA Chart
     */
    var map = new Datamap({
        scope: 'usa',
        element: document.getElementById('map_election'),
        //responsive: true,
        fills: {
            HIGH: '#2578b2',
            MEDHIGH: '#afc8e7',
            MEDIUM: '#fd7f28',
            LOWMED: '#fdba7d',
            LOW: '#329f34',
            UNKNOWN: '#c7c7c7',
            defaultFill: '#c7c7c7'
        },
        data: {

            <?php $query_string = API_BASEURL . "count=recalling_firm.exact&search=$search&state=$state&start=$start&end=$end&limit=50";
           $theJSON = file_get_contents(BASEURL . "parser.php?p=6&q=". $query_string);
           echo $theJSON;
           ?>

        },
        geographyConfig: {
            popupTemplate: function(geo, data) {
                return '<div class="hoverinfo"><strong>Number of recalls in ' + geo.properties.name + ': ' +  data.numberOfThings + '</strong></div>';
            },
            highlightFillColor: '#f9f9f9',
            highlightBorderColor: '#e0e0e0',
            highlightBorderWidth: 1
        }
    });

    //draw a legend for this map
    map.legend();

    $(window).on('resize', function() {
        map.resize();
    });


</script>
</body>
</html>