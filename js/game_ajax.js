// following is from the workshop wk 5, edited.
// Week 5 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-5-Workshop-Outline-168d2f221ced4065a5b066336e5a948c
// Images layers-2x.png, layers.png, marker-ocon-2x.png, marker-icon.png, marker-shadow.png. leaflet.js, leaflet.css
// Leaflet. (n.d.). Retrieved from https://leafletjs.com/


// initialise map && get reference to map.
var mapReference;
$( document ).ready(function() {
    mapReference = initMap();
});

function iterateRecords(results) {

	console.log(results);
	// get reference
	var myMap = mapReference;

	var layerCount = 0;
	myMap.eachLayer(function (layer) {
		// don't remove first layer (map layer)
		if (layerCount != 0) {
			myMap.removeLayer(layer);
		}
		layerCount++;
	});

	//make new layer group for markers
	var newLayer = L.layerGroup().addTo(myMap);

	// Iterate over each record and add a marker using the Latitude field (also containing longitude)
	$.each(results, function(recordID, recordValue) {

		var lat = recordValue["lat"];
		var long = recordValue["lon"];


		// Position the marker and add to map
		var marker = L.marker([lat, long]).addTo(newLayer);

		// Associate a popup with the record's information
		popupText = "<strong>" + recordValue["title"] + "</strong><br>";
		marker.bindPopup(popupText).openPopup();

		
	});

}

function getRegions() {
	var searchList = [];

	var NSW = document.getElementById("NSW");
	var NT = document.getElementById("NT");
	var QLD = document.getElementById("QLD");
	var SA = document.getElementById("SA");
	var TAS = document.getElementById("TAS");
	var VIC = document.getElementById("VIC");
	var WA = document.getElementById("WA");
	

	// queries regions
	if (NSW.checked) {searchList[searchList.length] = NSW.value;}
	if (NT.checked) {searchList[searchList.length] = NT.value;}
	if (QLD.checked) {searchList[searchList.length] = QLD.value;}
	if (SA.checked) {searchList[searchList.length] = SA.value;}
	if (TAS.checked) {searchList[searchList.length] = TAS.value;}
	if (VIC.checked) {searchList[searchList.length] = VIC.value;}
	if (WA.checked) {searchList[searchList.length] = WA.value;}

	// empty return false
	if (searchList.length == 0) {
		return false;
	}

	searchList = JSON.stringify(searchList);

	return searchList;
}

function getDisasterNames() {
	var DisasterName = document.getElementById("DisasterName").value;


	// if empty return false
	if (DisasterName) {
		// seperate by comma && stringify
		DisasterName = DisasterName.split(",");
		DisasterName = JSON.stringify(DisasterName);
		return DisasterName;
	}
	return false;
}

function initMap () {
	var myMap = L.map("map").setView([-21, 148], 4);

	L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox.streets"
	}).addTo(myMap);

	return myMap;
}

function insertRecords() {
	// must have at least 1 region, names are optional
	if (!getRegions()) {return false;}
	sendData = {regions : getRegions()};
	// if not false (has something) add to object
	if (getDisasterNames()) {sendData.names = getDisasterNames();}
	$.ajax({
		type: "POST",
		url: "includes/api.php",
		dataType: "json",
		data: sendData,
		error: function(xhr, status, error) {
			alert(xhr.responseText);
		},
		success: function(results) {
			iterateRecords(results);
		}
	});
}