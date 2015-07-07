<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/30/15
 * Time: 1:00 AM
 */
$firm = isset($_GET['firm']) ? urlencode($_GET['firm']) : '';
$search = isset($_GET['search']) ? urlencode($_GET['search']) : '';
$state = isset($_GET['state']) ? $_GET['state'] : 'All';
$start = isset($_GET['start']) ? $_GET['start'] : '';
$end = isset($_GET['end']) ? $_GET['end'] : '';
?>
<div class="title">
    <h5>Search for Food Recalls</h5>
    <a class="close" href="#"><div class="hide">Close</div><i class="mdi-content-clear"></i> </a> <a class="minimize" href="#"><div class="hide">Minimize</div><i class="mdi-navigation-expand-less"></i> </a></div>
<div class="content">
    <form class="form-inline" method="get" action="index.php">
        <div class="col s12 l6 no-pad-bot">
            <h5>Search</h5>

            <div class="col s12 l8 no-pad-bot">
                <input class="input" type="text" name="search" id="search"
                       value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" title="Enter a Search Term to Search for Food Recalls">
            </div>
            <div class="col s12 l4 no-pad-bot">
                <select name="state" id="state" title="Select a State to search for Food Recalls">
                    <option value="All" <?php echo $state == "All" ? 'selected="selected"' : ''; ?>>All States</option>
                    <option value="AL" <?php echo $state == "AL" ? 'selected="selected"' : ''; ?>>Alabama</option>
                    <option value="AK" <?php echo $state == "AK" ? 'selected="selected"' : ''; ?>>Alaska</option>
                    <option value="AZ" <?php echo $state == "AZ" ? 'selected="selected"' : ''; ?>>Arizona</option>
                    <option value="AR" <?php echo $state == "AR" ? 'selected="selected"' : ''; ?>>Arkansas</option>
                    <option value="CA" <?php echo $state == "CA" ? 'selected="selected"' : ''; ?>>California</option>
                    <option value="CO" <?php echo $state == "CO" ? 'selected="selected"' : ''; ?>>Colorado</option>
                    <option value="CT" <?php echo $state == "CT" ? 'selected="selected"' : ''; ?>>Connecticut</option>
                    <option value="DE" <?php echo $state == "DE" ? 'selected="selected"' : ''; ?>>Delaware</option>
                    <option value="DC" <?php echo $state == "DC" ? 'selected="selected"' : ''; ?>>District Of Columbia</option>
                    <option value="FL" <?php echo $state == "FL" ? 'selected="selected"' : ''; ?>>Florida</option>
                    <option value="GA" <?php echo $state == "GA" ? 'selected="selected"' : ''; ?>>Georgia</option>
                    <option value="HI" <?php echo $state == "HI" ? 'selected="selected"' : ''; ?>>Hawaii</option>
                    <option value="ID" <?php echo $state == "ID" ? 'selected="selected"' : ''; ?>>Idaho</option>
                    <option value="IL" <?php echo $state == "IL" ? 'selected="selected"' : ''; ?>>Illinois</option>
                    <option value="IN" <?php echo $state == "IN" ? 'selected="selected"' : ''; ?>>Indiana</option>
                    <option value="IA" <?php echo $state == "IA" ? 'selected="selected"' : ''; ?>>Iowa</option>
                    <option value="KS" <?php echo $state == "KS" ? 'selected="selected"' : ''; ?>>Kansas</option>
                    <option value="KY" <?php echo $state == "KY" ? 'selected="selected"' : ''; ?>>Kentucky</option>
                    <option value="LA" <?php echo $state == "LA" ? 'selected="selected"' : ''; ?>>Louisiana</option>
                    <option value="ME" <?php echo $state == "ME" ? 'selected="selected"' : ''; ?>>Maine</option>
                    <option value="MD" <?php echo $state == "MD" ? 'selected="selected"' : ''; ?>>Maryland</option>
                    <option value="MA" <?php echo $state == "MA" ? 'selected="selected"' : ''; ?>>Massachusetts</option>
                    <option value="MI" <?php echo $state == "MI" ? 'selected="selected"' : ''; ?>>Michigan</option>
                    <option value="MN" <?php echo $state == "MN" ? 'selected="selected"' : ''; ?>>Minnesota</option>
                    <option value="MS" <?php echo $state == "MS" ? 'selected="selected"' : ''; ?>>Mississippi</option>
                    <option value="MO" <?php echo $state == "MO" ? 'selected="selected"' : ''; ?>>Missouri</option>
                    <option value="MT" <?php echo $state == "MT" ? 'selected="selected"' : ''; ?>>Montana</option>
                    <option value="NE" <?php echo $state == "NE" ? 'selected="selected"' : ''; ?>>Nebraska</option>
                    <option value="NV" <?php echo $state == "NV" ? 'selected="selected"' : ''; ?>>Nevada</option>
                    <option value="NH" <?php echo $state == "NH" ? 'selected="selected"' : ''; ?>>New Hampshire</option>
                    <option value="NJ" <?php echo $state == "NJ" ? 'selected="selected"' : ''; ?>>New Jersey</option>
                    <option value="NM" <?php echo $state == "NM" ? 'selected="selected"' : ''; ?>>New Mexico</option>
                    <option value="NY" <?php echo $state == "NY" ? 'selected="selected"' : ''; ?>>New York</option>
                    <option value="NC" <?php echo $state == "NC" ? 'selected="selected"' : ''; ?>>North Carolina</option>
                    <option value="ND" <?php echo $state == "ND" ? 'selected="selected"' : ''; ?>>North Dakota</option>
                    <option value="OH" <?php echo $state == "OH" ? 'selected="selected"' : ''; ?>>Ohio</option>
                    <option value="OK" <?php echo $state == "OK" ? 'selected="selected"' : ''; ?>>Oklahoma</option>
                    <option value="OR" <?php echo $state == "OR" ? 'selected="selected"' : ''; ?>>Oregon</option>
                    <option value="PA" <?php echo $state == "PA" ? 'selected="selected"' : ''; ?>>Pennsylvania</option>
                    <option value="RI" <?php echo $state == "RI" ? 'selected="selected"' : ''; ?>>Rhode Island</option>
                    <option value="SC" <?php echo $state == "SC" ? 'selected="selected"' : ''; ?>>South Carolina</option>
                    <option value="SD" <?php echo $state == "SD" ? 'selected="selected"' : ''; ?>>South Dakota</option>
                    <option value="TN" <?php echo $state == "TN" ? 'selected="selected"' : ''; ?>>Tennessee</option>
                    <option value="TX" <?php echo $state == "TX" ? 'selected="selected"' : ''; ?>>Texas</option>
                    <option value="UT" <?php echo $state == "UT" ? 'selected="selected"' : ''; ?>>Utah</option>
                    <option value="VT" <?php echo $state == "VT" ? 'selected="selected"' : ''; ?>>Vermont</option>
                    <option value="VA" <?php echo $state == "VA" ? 'selected="selected"' : ''; ?>>Virginia</option>
                    <option value="WA" <?php echo $state == "WA" ? 'selected="selected"' : ''; ?>>Washington</option>
                    <option value="WV" <?php echo $state == "WV" ? 'selected="selected"' : ''; ?>>West Virginia</option>
                    <option value="WI" <?php echo $state == "WI" ? 'selected="selected"' : ''; ?>>Wisconsin</option>
                    <option value="WY" <?php echo $state == "WY" ? 'selected="selected"' : ''; ?>>Wyoming</option>
                </select>
            </div>
        </div>
        <div class="col s12 l6 no-pad-bot">
            <h5>Date Range</h5>

            <div class="col s12 l10 no-pad-bot">
                <div class="col s12 l5">
                    <input class="pikaday" name="start" id="start" type="text"
                           value="<?php echo isset($_GET['start']) ? $_GET['start'] : ''; ?>" title="Enter a Start Date to Search for Food Recalls">
                </div>
                <div class="col s12 l5">
                    <input class="pikaday" name="end" id="end" type="text"
                           value="<?php echo isset($_GET['end']) ? $_GET['end'] : ''; ?>" title="Enter an End Date to Search for Food Recalls">
                </div>
            </div>
            <div class="col s12 l2">
                <button class="btn">Search</button>
            </div>
        </div>
    </form>
    <div class="clear"></div>
</div>