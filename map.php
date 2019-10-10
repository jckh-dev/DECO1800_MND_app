<?php
include('includes/maplogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<aside class="box txtbox">
<h1>USE THE MAP TO EXPLORE <br>AUSTRALIAS NATURAL DISASTERS</h1>
</aside>

</section>

<section class="gridwrap2">
    
<article class="infobox">

<h1>Map w/ Options</h1>

<form id="start">
    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
    <h1>Regions</h1> <br>
    
    <input type="checkbox" value="New South Wales" id="NSW"> New South Wales <br>
    <input type="checkbox" value="Northern Territory" id="NT"> Northern Territory <br>
    <input type="checkbox" value="Queensland" id="QLD"> Queensland <br>
    <input type="checkbox" value="South Australia" id="SA"> South Australia <br>
    <input type="checkbox" value="Tasmania" id="TAS"> Tasmania <br>
    <input type="checkbox" value="Victoria" id="VIC"> Victoria <br>
    <input type="checkbox" value="Western Australia" id="WA"> Western Australia <br>

    <br>

    <h1>Name/Type (Optional)</h1> <br> 
    Search for multiple by seperating with a comma, e.g. (Cyclone,Flood)
    <input type="text" class="input" id="DisasterName" placeholder="Enter disaster types or names" width="70" height="50">
    <button type="button" class="idbutton" onclick="insertRecordSearch()">Search</button>
    
</form>

<div id="mapLocation"><article id="map"></article></div>

</article>

<script>
    var mapInit = true; // true = init map.
</script>

<?php
include('includes/footer.php');
?>

<script src="js/leaflet.js"></script>
<script src="js/game_ajax.js"></script>