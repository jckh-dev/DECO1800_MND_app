// Week 5 Workshop Outline. (2019). Retrieved from https://www.notion.so/Week-5-Workshop-Outline-168d2f221ced4065a5b066336e5a948c
// Images layers-2x.png, layers.png, marker-ocon-2x.png, marker-icon.png, marker-shadow.png. leaflet.js, leaflet.css
// Leaflet. (n.d.). Retrieved from https://leafletjs.com/

var mapSearch = document.querySelector(".mapsearch");
var mapExit = document.querySelector(".mapexit");
// var closeClue = document.querySelector(".closeclue");

mapSearch.addEventListener('click', function(){
	$(".infobox").hide("fade", function(){
	$("#map").show("fade");
	$(mapExit).show("fade");
});
});

mapExit.addEventListener('click', function () {
	$(mapExit).hide("fade");
	$(".infobox").show("fade");
});

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
			$(".quizclue").hide("blind", function(){
				$(".quizclue").show("fade");
				$("#clueContent").empty();
				$("#clueContent").append("<h1>Disaster Description Clue</h1>");
				$("#clueContent").append("<h2> This is the recorded description of the disaster in question with all numbers redacted:</h2>");
				$("#clueContent").append("<p>" + results.description + "</p>");
				$(".cluebox").show("fade", 1000)
			})
			
	} else if (results.type == "map") {
			$(".quizclue").hide("blind", function(){
				$(".quizclue").show("fade");
				$("#clueContent").empty();
				$("#clueContent").append("<h1> Map Clue</h1>");
				$("#clueContent").append("<p>Use the surrounding geography to gauge whether factors like regional vs metro location,	the type of surrounds(forest, desert, coast etc) and closeness to residential centers may point to the question being higher or lower.</p>");
				$(".cluebox").show("fade", 1000)
			
				$("#clueContent").append('<article id="map"></article>');
			
				// init map
				initMap();

				// put records in
				iterateRecords(results);
		})	
	}
}

function doEnd(results) {
	if (results.result == "empty") {
		$(".quizend").html(`
		<h1>Submit your score to the leaderboard and see if you've made it in the top 10!</h1>
		<h1>You scored:</h1>
		<aside class="vertbtnwrap">
		<p class="smlNumCircle">` + score + `</p>"
		<h1>Please enter a name first!</h1>
		<form id="start" action="ending.php" method="POST" onsubmit="return false;">
		<input type="text" class="input" id="newName" placeholder="Enter Your Name" width="100px" height="50px" required>
		<button type="button" class="largebtn" onclick="insertScore();">SUBMIT YOUR SCORE!</button>
		</form>
		</aside>
		`);
	}
	if (results.result == "found name") {
		if (results.nameRequest) {
			// backticks allow for multilines without newline.
			$(".quizend").append(`
			<h1>Insert your score into the leaderboard and see if you've made it in the top 10!</h1>
			<h1>You scored:</h1>
			<aside class="vertbtnwrap">
			<p class="smlNumCircle">` + score + `</p>
			<form id="start" action="ending.php" method="POST" onsubmit="return false;">
			<input type="text" class="input" id="newName" placeholder="Enter Your Name" width="100px" height="50px" required>
			
			<button type="button" class="largebtn" onclick="insertScore();">SUBMIT YOUR SCORE!</button>
			</aside>
			</form>
			`);
		} else {
			// if they already have a name , remove name input.
			$(".quizend").append(`
			<h1>Thanks for playing again, ` + userName + `</h1>
			<h2>Insert your new score into the leaderboard and see if you've made it in the top 10!</h2>
			<h2>You scored:</h2>
			<aside class="vertbtnwrap">
			<p class="smlNumCircle">` + score + `</p>
			<aside class="btnwrap">
			<form id="start" action="ending.php" method="POST" onsubmit="return false;">
			<button type="button" class="largebtn" onclick="insertScore();">SUBMIT YOUR SCORE!</button>
			</aside>
			</form>
			</aside>
			`);
		}
	}
	if (results.result == "inserted") {
		$(".quizfinal").append(`
		<h1>THANKS FOR PLAYING!</h1>

		<div class="altbtnwrap">
		<div class="finalbox">
			<h1>Your final</h1>
			<h1>score was...</h1>
		</div>	
			<p class="smlNumCircle"> 80</p>
		</div>

		<p>By playing this game, you have shown your support to the Climate Education Foundation which aims to raise awareness about climate change and proper education of the science behind it.</p>

		<img class="climateEd" src="images/climate-logo.png" alt="Climate Education Foundation width="125" height= "125">

		<aside class = btnwrap>
		
			<a class="smallbtn" a href="scoreboard.php">SCOREBOARD</a>

			<a class="smallbtn" href="journey.php">HOME</a>
		
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

