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

    <h1>LOOK UP A NATURAL DISASTER</h1>
</aside>

</section>

<section class="gridwrap2">
    
<article class="infobox">

<h1>Use the map to explore the history of natural disaster events that have occured in Australia.</h1>

<p>Search via state, name, timeframe or disaster type. Hit the search button once you've made your selection</p>


<form id="start">
    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>
    <h1><br>Regions</h1> <br>
    
    <input type="checkbox" value="New South Wales" id="NSW"> New South Wales <br>
    <input type="checkbox" value="Northern Territory" id="NT"> Northern Territory <br>
    <input type="checkbox" value="Queensland" id="QLD"> Queensland <br>
    <input type="checkbox" value="South Australia" id="SA"> South Australia <br>
    <input type="checkbox" value="Tasmania" id="TAS"> Tasmania <br>
    <input type="checkbox" value="Victoria" id="VIC"> Victoria <br>
    <input type="checkbox" value="Western Australia" id="WA"> Western Australia <br>

    <br>

    <h1>Name/Type (Optional)</h1> <br> 
    Search for multiple by seperating with a comma, e.g. <br> (Cyclone George,Black Friday) <br>
    <input type="text" class="input" id="DisasterName" placeholder="Enter disaster names" width="70" height="50"> <br>
    <input type="checkbox" value="Bushfire,Urban Fire" id="fire"> Bushfire/Urban Fire <br>
    <input type="checkbox" value="Flood" id="flood"> Flood <br>
    <input type="checkbox" value="Cyclone" id="cyclone"> Cyclone <br>
    <input type="checkbox" value="Severe Storm/Hail" id="storm"> Severe Storm/Hail <br>
    <input type="checkbox" value="Environmental" id="environ"> Environmental <br>
    <button type="button" class="idbutton" onclick="insertRecordSearch()">Search</button>
    
</form>

<div id="mapLocation"><article id="map"></article></div>

</article>

<!-- jquery -->
<script src="js/jquery-3.4.1.min.js"></script>

<script> var mapInit = true; </script> <!-- true = init map. -->
<script src="js/leaflet.js"></script>
<script src="js/game_ajax.js"></script>

<?php
include('includes/footer.php');
?>
