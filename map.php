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

<main class="gridwrap2">
    
<article class="infobox">

<!-- <p>Use the map to explore the history of natural disaster events that have occured in Australia.</p> -->

<p>Use the categories below to filter your search:</p>

<form id="start">

    <h2>Regions</h2>

    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'>    
    <p><input type="checkbox" value="New South Wales" id="NSW"> New South Wales </p>
    <p><input type="checkbox" value="Northern Territory" id="NT"> Northern Territory </p>
    <p><input type="checkbox" value="Queensland" id="QLD"> Queensland </p>
    <p><input type="checkbox" value="South Australia" id="SA"> South Australia </p>
    <p><input type="checkbox" value="Tasmania" id="TAS"> Tasmania </p>
    <p><input type="checkbox" value="Victoria" id="VIC"> Victoria </p>
    <p><input type="checkbox" value="Western Australia" id="WA"> Western Australia 

    <h2>Add type of disaster here or leave blank for all:</h2>

    <p><input type="checkbox" value="Bushfire,Urban Fire" id="fire"> Bushfire/Urban Fire </p>
    <p><input type="checkbox" value="Flood" id="flood"> Flood </p>
    <p><input type="checkbox" value="Cyclone" id="cyclone"> Cyclone </p>
    <p><input type="checkbox" value="Severe Storm/Hail" id="storm"> Severe Storm/Hail </p>
    <p><input type="checkbox" value="Environmental" id="environ"> Environmental </p>

    <h2>Or search via name of disaster:</h2>

    <input type="text" class="input" id="DisasterName" placeholder="Enter Disaster Name" width="70" height="50"> <br>
    <button type="button" class="idbutton mapsearch" onclick="insertRecordSearch()">Search</button>
</form>
</article>

<div id="mapLocation">
    <article id="map"></article>
    <button type="button" class="idbutton mapexit">Back to Search</button>
</div>

<!-- jquery -->
<!-- <script src="js/jquery-3.4.1.min.js"></script> -->

<script> var mapInit = true; </script> <!-- true = init map. -->
<script src="js/leaflet.js"></script>
<script src="js/game_ajax.js"></script>

<?php
include('includes/footer.php');
?>
