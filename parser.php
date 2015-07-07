<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: parser.php, v1.00 2015-06-29 10:12:05
 */
//if (!defined("_VALID_PHP"))
    //die('Direct access to this location is not allowed.');
$parser = isset($_GET["p"]) ? $_GET["p"] : '1';

switch ($parser) {
    case "1":
        $q = $_SERVER['QUERY_STRING'];
        $q = str_replace("p=1&q=", "", $q);
        $q = urldecode($q);
        $q = str_replace(" ", "+", $q);
        $json = file_get_contents($q);
        //decode the string with json_decode();
        $decoded = json_decode($json);
        //loop over the decoded array and populate array with term and count only
        foreach($decoded->results as $d) $newarr[] = array('term' => $d->term, 'count' => $d->count);
        //json encode the resulting array.
        $finalJSON = json_encode($newarr);
        print $finalJSON;
    break;
    case "2":
    $q = $_SERVER['QUERY_STRING']; // Grab everything after the ?
    $q = str_replace("q=", "", $q); // Remove the q= from the beginning of the query string
    $q = urldecode($q); // This handles changing ampersands back to the non-html entity format
    $q = str_replace(" ", "+", $q); // The process was removing the plus signs as required by OpenFDA so add them back
    $json = file_get_contents($q); // Get the JSON content from the OpenFDA RESTful API
    //decode the string with json_decode();
    $decoded = json_decode($json);
    //loop over the decoded array and populate array with term and count only
    foreach($decoded->results as $d) $newarr[][] = array('term' => $d->term, 'count'=>array($d->epoch, $d->count));
        //json encode the resulting array.
        $finalJSON = json_encode($newarr);
        print $finalJSON;
    break;
    case "3":
        $search = $_GET['search'] !== '' ? $_GET['search'] : '';
        $state = $_REQUEST['state'] !== '' ? $_REQUEST['state'] : 'All';
        $start = $_REQUEST['start'] !== '' ? $_REQUEST['start'] : '2004-01-01';
        $end = $_REQUEST['end'] !== '' ? $_REQUEST['end'] : '2014-12-31';
        $limit = $_REQUEST['limit'] !== '' ? $_REQUEST['limit'] : '20';

        $search = ($search!=="" ? "+AND+reason_for_recall:$search" : '');
        $state = ($state!=="All" ? "+AND+state:$state" : '');

        $q = "https://api.fda.gov/food/enforcement.json?count=recalling_firm.exact&search=report_date:[$start+TO+$end]$search$state&limit=$limit";
        $q = urldecode($q); // This handles changing ampersands back to the non-html entity format
        $q = str_replace(" ", "+", $q); // The process was removing the plus signs as required by OpenFDA so add them back
        $json = file_get_contents($q); // Get the JSON content from the OpenFDA RESTful API

        $decoded = json_decode($json);

        //loop over the decoded array and populate array with term and count only
        if(isset($decoded->results)){
            foreach($decoded->results as $d) $newarr[] = array('term' => $d->term, 'count' => $d->count);
            //json encode the resulting array.
            $finalJSON = json_encode($newarr);

            print "return " . $finalJSON . ";";
        } else {
            echo '$("#chart4").text("No results found, please search again.");';
        }
    break;
    case "4":
        $firm = $_GET['firm'] !== '' ? $_GET['firm'] : '';
        $firm = str_replace(" ", "+", $firm);
        $firm = (strstr($firm, ',') ? substr($firm, 0, strpos($firm, ',')) : $firm);
        $search = $_GET['search'] !== '' ? $_GET['search'] : '';
        $state = $_REQUEST['state'] !== '' ? $_REQUEST['state'] : 'All';
        $start = $_REQUEST['start'] !== '' ? $_REQUEST['start'] : '2004-01-01';
        $end = $_REQUEST['end'] !== '' ? $_REQUEST['end'] : '2014-12-31';
        $limit = $_REQUEST['limit'] !== '' ? $_REQUEST['limit'] : '10';

        $firm = ($firm!=="" ? "recalling_firm:\"$firm\"" : '');
        $dates = (($start!=="" && $end!=="") ? "+AND+report_date:[$start+TO+$end]" : '');
        $search = ($search!=="" ? "+AND+reason_for_recall:$search" : '');
        $state = ($state!=="All" ? "+AND+state:$state" : '');

        $q = "https://api.fda.gov/food/enforcement.json?search=$firm&limit=$limit";
        $q = urldecode($q); // This handles changing ampersands back to the non-html entity format
        $q = str_replace(" ", "+", $q); // The process was removing the plus signs as required by OpenFDA so add them back
        $json = file_get_contents($q); // Get the JSON content from the OpenFDA RESTful API
        //decode the string with json_decode();
        $decoded = json_decode($json);
        //loop over the decoded array and populate array with term and count only
        if(isset($decoded->results)){
            $totalrecalls = $decoded->meta->results->total;

            foreach($decoded->results as $d){
                $recallingfirm = $d->recalling_firm;
                $reasonforrecall = $d->reason_for_recall;
                $productdescription = $d->product_description;
                $productquantity = $d->product_quantity;
                $reportdate = $d->report_date;
            }
            // Return the dynamic jQuery to populate the report contents
            print '$("#chart-title1").text("Viewing ' . $totalrecalls . ' Recalls for ' . $recallingfirm . '");';
            print '$("#recall-firm").text("' . $recallingfirm . '");';
            print '$("#recall-reason").text("' . $reasonforrecall . '");';
            print '$("#recall-desc").text("' . $productdescription . '");';
            print '$("#recall-qty").text("' . $productquantity . '");';
            print '$("#recall-date").text("' . $reportdate . '");';
        } else {
            echo '$("#chart4").text("No results found, please search again.");';
        }
    break;
    case "5":
        $search = $_GET['search'] !== '' ? $_GET['search'] : '';
        $state = $_REQUEST['state'] !== '' ? $_REQUEST['state'] : 'All';
        $start = $_REQUEST['start'] !== '' ? $_REQUEST['start'] : '2004-01-01';
        $end = $_REQUEST['end'] !== '' ? $_REQUEST['end'] : '2014-12-31';
        $limit = $_REQUEST['limit'] !== '' ? $_REQUEST['limit'] : '30';

        $search = ($search!=="" ? "+AND+reason_for_recall:$search" : '');
        $state = ($state!=="All" ? "+AND+state:$state" : '');

        $q = "https://api.fda.gov/food/enforcement.json?count=state.exact&search=report_date:[$start+TO+$end]$search$state&limit=$limit";
        $q = urldecode($q); // This handles changing ampersands back to the non-html entity format
        $q = str_replace(" ", "+", $q); // The process was removing the plus signs as required by OpenFDA so add them back
        $json = file_get_contents($q); // Get the JSON content from the OpenFDA RESTful API
        //decode the string with json_decode();
        $decoded = json_decode($json);
        //loop over the decoded array and populate array with term and count only
        if(isset($decoded->results)){
            foreach($decoded->results as $d) $newarr[] = array('label' => $d->term, 'value' => $d->count);
            //json encode the resulting array.
            $finalJSON = json_encode($newarr);
            print  $finalJSON ;
        } else {
            echo '$("#chart3").text("No results found, please search again.");';
        }
    break;
    case "6":
        $search = $_GET['search'] !== '' ? $_GET['search'] : '';
        $state = $_REQUEST['state'] !== '' ? $_REQUEST['state'] : 'All';
        $start = $_REQUEST['start'] !== '' ? $_REQUEST['start'] : '2004-01-01';
        $end = $_REQUEST['end'] !== '' ? $_REQUEST['end'] : '2014-12-31';
        $limit = $_REQUEST['limit'] !== '' ? $_REQUEST['limit'] : '50';
        $search = ($search!=="" ? "+AND+reason_for_recall:$search" : '');
        $state = ($state!=="All" ? "+AND+state:$state" : '');

        $q = "https://api.fda.gov/food/enforcement.json?count=state.exact&search=report_date:[$start+TO+$end]$search$state&limit=$limit";
        $q = urldecode($q); // This handles changing ampersands back to the non-html entity format
        $q = str_replace(" ", "+", $q); // The process was removing the plus signs as required by OpenFDA so add them back
        $json = file_get_contents($q); // Get the JSON content from the OpenFDA RESTful API
        //decode the string with json_decode();
        $decoded = json_decode($json);
        //loop over the decoded array and populate array with term and count only
        if(isset($decoded->results)){
            $finalJSON='';
            foreach($decoded->results as $d) {
                $severity = 'UNKNOWN';
                if($d->count >= 0 && $d->count < 100){
                    $severity = 'LOW';
                } elseif($d->count >= 100 && $d->count < 200) {
                    $severity = 'LOWMED';
                } elseif($d->count >= 200 && $d->count < 300) {
                    $severity = 'MEDIUM';
                } elseif($d->count >= 300 && $d->count < 400) {
                    $severity = 'MEDHIGH';
                } else {
                    $severity = 'HIGH';
                }
                // Build JSON output for USA map
                $finalJSON .= '"' . $d->term . '" : {';
                $finalJSON .= '"fillKey" : "' . $severity . '",';
                $finalJSON .= '"numberOfThings": ' . $d->count ;
                $finalJSON .= "},";
            }
            rtrim($finalJSON, ","); // Remove the trailing comma
            print  $finalJSON;
        } else {
            echo '$("#chart3").text("No results found, please search again.");';
        }
    break;
}