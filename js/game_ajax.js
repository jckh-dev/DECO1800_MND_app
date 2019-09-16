// following is from the workshop wk 5, edited.
// Week 5 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-5-Workshop-Outline-168d2f221ced4065a5b066336e5a948c
// Images layers-2x.png, layers.png, marker-ocon-2x.png, marker-icon.png, marker-shadow.png. leaflet.js, leaflet.css
// Leaflet. (n.d.). Retrieved from https://leafletjs.com/

function iterateRecords(results) {

	console.log(results);


	var myMap = L.map("map").setView([-21, 148], 4);

	L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox.streets"
	}).addTo(myMap);

	// Iterate over each record and add a marker using the Latitude field (also containing longitude)
	$.each(results, function(recordID, recordValue) {

		var lat = recordValue["lat"];
		var long = recordValue["lon"];


		// Position the marker and add to map
		var marker = L.marker([lat, long]).addTo(myMap);

		// Associate a popup with the record's information
		popupText = "<strong>" + recordValue["title"] + "</strong><br>";
		marker.bindPopup(popupText).openPopup();

		
	});

}

function insertRecords() {
	$(document).ready(function() {
		$.ajax({
			url: "api.php",
			dataType: "json",
			success: function(results) {
				iterateRecords(results);
			}
		});
	});
}


$(document).ready(function() {
	if (map) {
		console.log(id);
		insertRecords();
	}
});
