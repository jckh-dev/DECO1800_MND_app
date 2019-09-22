// creates 'next' button(prevents it from appearing when loaded), depending on answer makes appropriate POST
$(document).ready(function(){
	//nothing yet
});
function answer(answer) {
	//bellow is where the button is, this will be appended to #next (the form)
	$("<button id='nextButton' type='submit' class='nextbtn next'>NEXT QUESTION</button>").appendTo("#next");
	$("#displayAnswer").text(numberAnswer); // numberAnswer (echo 2), displayed on id of displayAnswer etc.
	$("#answerButtonHigh").attr('onclick', ''); // makes action do nothing for answer buttons
	$("#answerButtonLow").attr('onclick', '');
	 
	if (answer == correctAnswer) { // correctAnswer (echo 1)
		$("#displayAnswer2").text("Correct"); // correct answer displayed on id of displayAnswer2
	} else {
		$("#nextButtonValue").remove(); // remove value from post
		$("#displayAnswer2").text("Incorrect");
	}
	if (endGame) { // endGame (echo 3) (When game ends, changes the button to point to ending.php)
		$("#nextButtonValue").remove();
		$("#nextButtonGame").remove();
		$("#nextButton").text("You Have Finished!");
		$("#next").attr('action', 'ending.php');
	}
}


// <i class='fas fa-step-forward'></i> <<<<< icon for next question