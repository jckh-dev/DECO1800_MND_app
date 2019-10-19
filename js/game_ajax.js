// Week 5 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-5-Workshop-Outline-168d2f221ced4065a5b066336e5a948c
// Images layers-2x.png, layers.png, marker-ocon-2x.png, marker-icon.png, marker-shadow.png. leaflet.js, leaflet.css
// Leaflet. (n.d.). Retrieved from https://leafletjs.com/


// initialise map && get reference to map.
var mapReference = false; // reference to map, is filled when initMap() called

$( document ).ready(function() {
	if (mapInit) { // located in page
		initMap();
	}
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
	var keys = Object.keys(results);
	var length = keys.length; // length records
	var eachCount = 0; // counts
	$.each(results, function(recordID, recordValue) {
		eachCount++;
		// for doClue so that it does not try to iterate over the type and create an error.
		if (recordID == "type") {return false;}

		var lat = recordValue["lat"];
		var long = recordValue["lon"];


		// Position the marker and add to map
		var marker = L.marker([lat, long]).addTo(newLayer);

		// Associate a popup with the record's information
		popupText = "<strong>" + recordValue["title"] + "</strong><br>";
		marker.bindPopup(popupText).openPopup();

		// set view of second last then last records, (second last to accomodate doClue)
		if (eachCount == length || eachCount == (length - 1)) {
			myMap.setView([lat, long], 4);
		}
	});

}

function doClue(results) {
	if (results.type == "description") {
		$(".cluebox").show("blind")
		$("#clueContent").empty();
		$("#clueContent").append("<h1> Description Clue (numbers removed) </h1>");
		$("#clueContent").append("<p>" + results.description + "</p>");
	} else if (results.type == "map") {
		$(".cluebox").show("blind")
		$("#clueContent").empty();
		$("#clueContent").append("<h1> Map Clue (location of disaster) </h1>");
		$("#clueContent").append('<article id="map"></article>');
		
		// init map
		initMap();

		// put records in
		iterateRecords(results);
	}
}

function doEnd(results) {
	if (results.result == "empty") {
		$(".quizend").html(`
		<h1>Insert your score into the leaderboard!</h1>
		<h1>You scored: ` + score + `</h1>
		<h1>Please enter a name first!</h1>
		<form id="start" action="ending.php" method="POST">
		<input type="text" class="input" id="newName" placeholder="Enter Your Name" width="100px" height="50px" required>
		<button type="button" class="button" onclick="insertScore();">INSERT HIGH SCORE!</button>
		</form>
		`);
	}
	if (results.result == "found name") {
		if (results.nameRequest) {
			// backticks allow for multilines without newline.
			$(".quizend").append(`
			<h1>Insert your score into the leaderboard!</h1>
			<h1>You scored: ` + score + `</h1>
			<form id="start" action="ending.php" method="POST">
			<input type="text" class="input" id="newName" placeholder="Enter Your Name" width="100px" height="50px" required>
			<button type="button" class="button" onclick="insertScore();">INSERT HIGH SCORE!</button>
			</form>
			`);
		} else {
			// if they already have a name , remove name input.
			$(".quizend").append(`
			<h1>Insert your score into the leaderboard!</h1>
			<h1>You scored: ` + score + `</h1>
			<form id="start" action="ending.php" method="POST">
			<button type="button" class="button" onclick="insertScore();">INSERT HIGH SCORE!</button>
			</form>
			`);
		}
	}
	if (results.result == "inserted") {
		$(".quizfinal").append(`
		<h1>CONGRATULATIONS!</h1>
		<p>We hope you learnt something new and gained a better appreciation of the destructive power of mother nature on the Australian continent</p>
	
		<aside class = "txtbox">
			<form id="start" action="scoreboard.php" method="POST">
			<button a href="scoreboard.php" type="submit" class="button">Leaderboard</button>
			</form>
		</aside>
	
		<aside class = "txtbox">
			<form id="start" action="journey.php" method="POST">
			<button a href="scoreboard.php" type="submit" class="button">Home</button>
			</form>
		</aside>

		<aside class = "txtbox">
			<form id="start" action="finish.php" method="POST">
			<button a href="finish.php" type="submit" class="button">Finish Exhibit Tour</button>
			</form>
		</aside>
		`);
	}
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

function getClueCode() {
	return document.getElementById("clueCode").value;
}

function getName() {
	if (document.getElementById("newName")) {
		return document.getElementById("newName").value;
	}
	return false;
}

function getDisasterNames() {
	var DisasterNames = [];

	// if empty return false
	if (document.getElementById("DisasterName").value) {
		console.log("boom");
		DisasterNames[0] = document.getElementById("DisasterName").value;
		// seperate by comma && stringify
		DisasterNames = DisasterNames[0].split(",");
	}

	var fire = document.getElementById("fire");
	var flood = document.getElementById("flood");
	var cyclone = document.getElementById("cyclone");
	var storm = document.getElementById("storm");
	var environ = document.getElementById("environ");

	// queries 5 to search.
	if (fire.checked) {
		DisasterNames[DisasterNames.length] = "Bushfire";
		DisasterNames[DisasterNames.length] = "Urban Fire";
	}
	if (flood.checked) {DisasterNames[DisasterNames.length] = flood.value;}
	if (cyclone.checked) {DisasterNames[DisasterNames.length] = cyclone.value;}
	if (storm.checked) {
		DisasterNames[DisasterNames.length] = "Severe Storm";
		DisasterNames[DisasterNames.length] = "Hail";
	}
	if (environ.checked) {DisasterNames[DisasterNames.length] = environ.value;}

	if (DisasterNames[0]) {
		DisasterNames = JSON.stringify(DisasterNames);
		return DisasterNames;
	} else {
		return false;
	}
}

function initMap() {
	mapReference = L.map("map").setView([-21, 148], 4);

	L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoibm96bmF1ZyIsImEiOiJjazFpdjNnaHMxdTV0M2ptdjB1Nm1iMzFwIn0.X3Ic_YsO8VXsyrzp7meIUA", {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox.streets"
	}).addTo(mapReference);
}

function insertRecordSearch() {
	// must have at least 1 region, names are optional
	if (!getRegions()) {
		return false;
	}
	sendData = {regions : getRegions()};
	// if not false (has something) add to object
	if (getDisasterNames()) {
		sendData.names = getDisasterNames();
	}
	$.ajax({
		type: "POST",
		url: "includes/mapsearch_api.php",
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

function insertRecordClue() {
	// must have code and disaster ID
	sendData = {clueCode : getClueCode(), disasterID : ID}; // echo 5 "ID" (ID of current disaster)
	$.ajax({
		type: "POST",
		url: "includes/mapclue_api.php",
		dataType: "json",
		data: sendData,
		error: function(xhr, status, error) {
			alert(xhr.responseText);
		},
		success: function(results) {
			doClue(results);
		}
	});
}

function findName() {
	// must have code and disaster ID
	sendData = {ID : userID, getName : 1}; // echo 6 "userID" (userID of player)
	if (getName()) {
		sendData.name = getName();
	}
	$.ajax({
		type: "POST",
		url: "includes/insert_api.php",
		dataType: "json",
		data: sendData,
		error: function(xhr, status, error) {
			alert(xhr.responseText);
		},
		success: function(results) {
			doEnd(results);
		}
	});
}

function insertScore() {
	// must have code and disaster ID
	var newNameElement = document.getElementById("newName");
	if (newNameElement && newNameElement.value == "") {
		console.log("wtffff");
		var results = {
			result: "empty"
		};
		doEnd(results);
		return;
	}
	showFinal(); // show final put here instead
	sendData = {ID : userID, userScore : score}; // echo 6 "userID" (userID of player), // echo 4 (returns score for local update)
	if (getName()) {
		sendData.name = getName();
	}
	$.ajax({
		type: "POST",
		url: "includes/insert_api.php",
		dataType: "json",
		data: sendData,
		error: function(xhr, status, error) {
			alert(xhr.responseText);
		},
		success: function(results) {
			doEnd(results);
		}
	});
}