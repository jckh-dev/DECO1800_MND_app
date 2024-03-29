// creates 'next' button(prevents it from appearing when loaded), depending on answer makes appropriate POST
var cluebtn = document.querySelector(".cluebtn");
var quizclue = document.querySelector(".quizclue");
var nextbtn = document.querySelector("#nextButton");
var quizpg = document.querySelector("#quizpage");
var quizquest = document.querySelector("#quizquestion");
var quizans = document.querySelector(".quizanswer");
var quizend = document.querySelector(".quizend");
var quizfinal = document.querySelector(".quizfinal");
var clueExit = document.querySelector(".clueexit");
var earlyFinish = document.querySelector(".earlyfinishbtn")
var closeClue = document.querySelector(".closeclue");

cluebtn.addEventListener('click', function () {
	$(".hilobtn").toggle("fade");
	$(earlyFinish).toggle("fade");
	$(cluebtn).toggle("fade");
	$(quizquest).toggle("blind", function () {
		$(quizclue).toggle("fade", function(){
			$(quizclue).css({ "display": "flex" });
		});
	});
});

clueExit.addEventListener('click', function(){
	$(".cluebox").hide("fade");
	$(quizclue).hide("fade", function(){
		$(quizquest).show("blind", function(){
			$(".hilobtn").toggle("fade");
			$(earlyFinish).toggle("fade");
			$(cluebtn).toggle("fade");
		});
	});
});

$(document).ready(function(){
	
	//nothing yet
});

function earlyEnd() {
	endGame = true; // make it endgame
	answer("wrong"); // answer is wrong.
}

function answer(answer) {
	
	//bellow is where the button is, this will be appended to #next (the form)
	$("<button id='nextButton' type='submit' class='largebtn next'>NEXT QUESTION</button>").appendTo("#next");
	$("#nextButton").attr({"onclick": "showQuestion()"});
	$("#displayAnswer").text(numberAnswer); // numberAnswer (echo 2), displayed on id of displayAnswer etc.

	// high/low higher/lower
	if (answer == "high") {
		var answerFormat = "HIGHER";
	} else {
		var answerFormat = "LOWER";
	}	

	if (answer == correctAnswer) { // correctAnswer (echo 1)
		$(cluebtn).hide("fade");
		$(earlyFinish).hide("fade");
		$(".cluebox").hide("highlight", { color: '#dcffdc' });
		$(".hilobtn").hide("highlight", { color: '#dcffdc' });
		$(quizquest).hide("highlight", { color: '#dcffdc' }, function(){
			$(".quizanswer").toggleClass('qzright', function () {
				$(this).show("fade");
		});
			$("#displayAnswer2").text("Correct"); // correct answer displayed on id of displayAnswer2
			// user friendly answer insertion (correct)
			$("#displayAnswer3").text("You answered " + answerFormat + " which is CORRECT!");
			})
			// local point update
			var pointIncrement = 10;
			score += pointIncrement; // score (echo 4), adds point increment for local update
			var pointText = document.getElementsByClassName("cluepointbtn")[1]; // get 2nd class "cluepointbtn"
			pointText.innerHTML = score + "<br>POINTS"; // replace html, if the html inside is changed, update this to the new html.
			findName(); // prepare end message
	} else {
		$(cluebtn).hide("fade");
		$(earlyFinish).hide("fade");
		$(".cluebox").hide("highlight", { color: '#ffdcdc' });
		$(".hilobtn").hide("highlight", { color: '#ffdcdc' });
		$(quizquest).hide("highlight", { color: '#ffdcdc' }, function () {
			$(".quizanswer").toggleClass('qzwrong', function(){
				$(this).show("fade");
			});
			$("#nextButtonValue").remove(); // remove value from post
			$("#displayAnswer2").text("Incorrect");
			// user friendly answer insertion (incorrect)
			$("#displayAnswer3").text("You answered " + answerFormat + " which is INCORRECT!");
			findName(); // prepare end message
		})
		// if life is 1 and they lost, they lose.
		if (life == 1) {
			endGame = true;
		} else if (life > 1) {
			life--;
		}
	}
	
	// if this game has life, then give it to the next game round
	if (life) {
		$('#lifeValue').val(life);
	}

	if (endGame) { // endGame (echo 3) (When game ends, changes the button to point to ending.php)
		$(".hilobtn").hide("highlight", { color: '#e89371' });
		$(".quizfinish").hide("highlight", { color: '#e89371' });
		$("#nextButton").html("Finish Game")
		$("#nextButton").attr({"type":"button","onclick":"showEnd()"});
	}
}

// insert image (api mode)
if (imageMode) {
	$("#imageInsert").append('<img class="disasterImage" src="' + imageUrl + '" alt="image from: ' + imageUrl + '">');
}

// insert image (no api mode)
if (!imageMode) {
	if (currentDisaster == "Bushfire/Urban Fire" || currentDisaster == "Bushfire" || currentDisaster == "Urban Fire") {
		// simply appends a html img, edit/change class as needed.
		$("#imageInsert").append('<img class="disasterImage" src="images/bushfire.jpg" alt="image from: https://commons.wikimedia.org/wiki/File:Swifts_creek_14-12-2006_1600_-2.jpg">');
	} else if (currentDisaster == "Flood") {
		$("#imageInsert").append('<img class="disasterImage" src="images/flood.jpg" alt="image from: https://commons.wikimedia.org/wiki/File:Trapped_woman_on_a_car_roof_during_flash_flooding_in_Toowoomba_2.jpg">');
	} else if (currentDisaster == "Cyclone") {
		$("#imageInsert").append('<img class="disasterImage" src="images/cyclone.jpg" alt="image from: https://commons.wikimedia.org/wiki/File:George_08_feb_2007_0155Z.jpg">');
	} else if (currentDisaster == "Severe Storm/Hail" || currentDisaster == "Severe Storm" || currentDisaster == "Hail") {
		$("#imageInsert").append('<img class="disasterImage" src="images/hailstorm.jpg" alt="image from: https://commons.wikimedia.org/wiki/File:Storm_Brunswick_Heads091007.jpg">');
	} else if (currentDisaster == "Environmental") {
		$("#imageInsert").append('<img class="disasterImage" src="images/environmental.jpg" alt="image from: https://commons.wikimedia.org/wiki/File:Lac_Hume.jpg">');
	}
}

function showQuestion() {
	$(".quizanswer").hide("highlight", { color: 'lightblue' });
}

function showEnd() {
	$(".quizanswer").hide("highlight", { color: 'lightblue' }, function () {
			$(".quizend").show("fade");
	});
}

function showFinal(){
	$(".quizend").hide("highlight", { color: 'lightblue' }, function () {
		$(".quizfinal").show("fade");
	});
}
