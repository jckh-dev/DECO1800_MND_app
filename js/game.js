// creates 'next' button(prevents it from appearing when loaded), depending on answer makes appropriate POST
var cluebtn = document.querySelector(".cluebtn");
var quizclue = document.querySelector(".quizclue");

cluebtn.addEventListener('click', function () {
	$(quizclue).toggle("blind");
	// if .hilobtn css === display: none: <<Implement this logic
	$(".hilobtn").toggle("fade");
})

$(document).ready(function(){
	//nothing yet
});
function answer(answer) {
	//bellow is where the button is, this will be appended to #next (the form)
	$("<button id='nextButton' type='submit' class='nextbtn next'>NEXT QUESTION</button>").appendTo("#next");
	$("#displayAnswer").text(numberAnswer); // numberAnswer (echo 2), displayed on id of displayAnswer etc.

	// high/low higher/lower
	if (answer == "high") {
		var answerFormat = "HIGHER";
	} else {
		var answerFormat = "LOWER";
	}	

	if (answer == correctAnswer) { // correctAnswer (echo 1)
		$(".hilobtn").hide("highlight", { color: 'green' });
		$("#quizquestion").hide("highlight", { color: 'green' }, function(){
			$(".quizanswer").toggleClass('qzright', function () {
				$(this).show("fade");
			});
			$("#displayAnswer2").text("Correct"); // correct answer displayed on id of displayAnswer2
			
			// user friendly answer insertion (correct)
			$("#displayAnswer3").text("You answered " + answerFormat + " which is CORRECT!");

			// local point update
			var pointIncrement = 10;
			score += pointIncrement; // score (echo 4), adds point increment for local update
			var pointText = document.getElementsByClassName("cluepointbtn")[1]; // get 2nd class "cluepointbtn"
			pointText.innerHTML = score + "<br>POINTS"; // replace html, if the html inside is changed, update this to the new html.
			findName(); // prepare end message
		});
	} else {

		$(".hilobtn").hide("highlight", { color: 'red' });
		$("#quizquestion").hide("highlight", {color: 'red' }, function () {
			$(".quizanswer").toggleClass('qzwrong', function(){
				$(this).show("fade");
			});
			$("#nextButtonValue").remove(); // remove value from post
			$("#displayAnswer2").text("Incorrect");
			
			// user friendly answer insertion (incorrect)
			$("#displayAnswer3").text("You answered " + answerFormat + " which is INCORRECT!");

			findName(); // prepare end message
		});
	}

	// IDEAS FOR IMPLEMENTATION:
					// once in 'endgame' state, make a change to the nextbutton id and then call seperate functionality to the standard next button? 
					// When 'You have finished' is clicked, it needs to hide the current article class 'quizanswer' and show the hidden 'quizend' article class which will contain what is currently in ending.php


	if (endGame) { // endGame (echo 3) (When game ends, changes the button to point to ending.php)
		
		$("#nextButton").attr({"type":"button","onclick":"showEnd()"});


		// $("#nextButtonValue").remove();
		// $("#nextButtonGame").remove();
		// 
		// $("#next").attr('action', 'ending.php');
	}
}

function showEnd() {
	$("#answerBox").remove();
	$(".hilobtn").hide("highlight", { color: 'lightblue' });
	$("#quizquestion").hide("highlight", { color: 'lightblue' }, function () {
		$(".quizend").toggleClass('qzend', function () {
			$(".quizend").show("fade");
		});
	});
}


// <i class='fas fa-step-forward'></i> <<<<< icon for next question

