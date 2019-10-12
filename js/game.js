// creates 'next' button(prevents it from appearing when loaded), depending on answer makes appropriate POST
$(document).ready(function(){
	//nothing yet
});
function answer(answer) {
	//bellow is where the button is, this will be appended to #next (the form)
	$("<button id='nextButton' type='submit' class='nextbtn next'>NEXT QUESTION</button>").appendTo("#next");
	$("#displayAnswer").text(numberAnswer); // numberAnswer (echo 2), displayed on id of displayAnswer etc.

	// makes action do nothing for answer buttons

	

	// $("#answerButtonHigh").attr('onclick', ''); 
	// $("#answerButtonLow").attr('onclick', '');

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

		})
	} else { // incorrect answer
		$(".hilobtn").hide("highlight", { color: 'red' });
		$("#quizquestion").hide("highlight", {color: 'red' }, function () {
			$(".quizanswer").toggleClass('qzwrong', function(){
				$(this).show("fade");
			});
			$("#nextButtonValue").remove(); // remove value from post
			$("#displayAnswer2").text("Incorrect");

			// user friendly answer insertion (incorrect)
			$("#displayAnswer3").text("You answered " + answerFormat + " which is INCORRECT!");
		})
	}
	if (endGame) { // endGame (echo 3) (When game ends, changes the button to point to ending.php)
		$("#nextButtonValue").remove();
		$("#nextButtonGame").remove();
		$("#nextButton").text("You Have Finished!");
		$("#next").attr('action', 'ending.php');
	}
}


// <i class='fas fa-step-forward'></i> <<<<< icon for next question

