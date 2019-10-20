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

<form id="start">

    <p>Regions:</p>

    <input type="hidden" name="oldGame" value='<?php echo $oldGameJson; ?>'>
    <input type="hidden" name="info" value='<?php echo $jsonInfo; ?>'> 

    <label class="chbxcontainer">New South Wales
        <input type="checkbox" value="New South Wales" id="NSW">  
        <span class="mapcustchkbx"></span> 
    </label>

    <label class="chbxcontainer">Northern Territory
        <input type="checkbox" value="Northern Territory" id="NT">  
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">Queensland 
        <input type="checkbox" value="Queensland" id="QLD"> 
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">South Australia
        <input type="checkbox" value="South Australia" id="SA">  
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">Tasmania
        <input type="checkbox" value="Tasmania" id="TAS">  
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">Victoria
        <input type="checkbox" value="Victoria" id="VIC">  
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">Western Australia 
        <input type="checkbox" value="Western Australia" id="WA"> 
        <span class="mapcustchkbx"></span>
    </label>

    <p>Select Type or Leave Blank For All:</p>

    <label class="chbxcontainer">Bushfire/Urban Fire 
        <input type="checkbox" value="Bushfire,Urban Fire" id="fire"> 
        <span class="mapcustchkbx"></span>
    </label>

    <label class="chbxcontainer">Flood
        <input type="checkbox" value="Flood" id="flood">  
        <span class="mapcustchkbx"></span>
    </label>
    <label class="chbxcontainer">Cyclone
        <input type="checkbox" value="Cyclone" id="cyclone">  
        <span class="mapcustchkbx"></span>
    </label>
    <label class="chbxcontainer">Severe Storm/Hail
        <input type="checkbox" value="Severe Storm/Hail" id="storm">  
        <span class="mapcustchkbx"></span>
    </label>
    <label class="chbxcontainer">Environmental
        <input type="checkbox" value="Environmental" id="environ">  
        <span class="mapcustchkbx"></span>
    </label>

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
