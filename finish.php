<?php
include('includes/finishlogic.php');
?>

<?php
include('includes/head.php');
?>

<div class="wrapper">

<?php
include('includes/header.php');
?>

<!-- thermo stuff -->
<style>
#Goal_board{
align-items: center;
text-align: center;

}    
#moneyProgress {
  width: 200px;
  height:50vh;
  background-image:url('images/thermo-removebg-preview (6).png');
  background-size: cover;
  transform: rotate(180deg);
  position: absolute;
  right: 40%;
}

#myBar {
  width: 20px;
  height: 10%;
  background-color: rgb(252, 0, 0);
  position: absolute;
  right: 20%;
}

#bar{
    position: absolute;
    bottom:5%;
}

</style>
<script>
var donation_goal = 1000 // change goal,goal is 1000 score (1000/50(current point to dollar conversion) = 20$)
function move() {
  var elem = document.getElementById("myBar");   
  var height = 10;
  var total_donation = <?php echo $totalScore; ?>; // 83 is the top.
  var dono_percentage = (total_donation / donation_goal)*83; // apparently the max is 83
  var id = setInterval(frame, 10);
  function frame() {
    if (height >= dono_percentage) {
      clearInterval(id);
    } else {
      height++; 
      elem.style.height = height + '%'; 
    }
  }
}
</script>

        <h1>THANK YOU FOR VISITING</h1><br>
    </aside>

</section>

    <main class="gridwrap2">

        <article class="infobox">
            <h1>Total Score Earned (All): <?php echo $totalScore; ?></h1>
            <h1>Total Dollars: <?php echo $totalMoney; ?></h1> <!-- change ratio in finishlogic, currently 50 points / $1 -->
            <h1>Donation Goal: 1000 </h1> <!-- couldn't be bothered, just put in the goal please.-->

            <p>Climate change gives rise not just to threats from global warming but also an ever increasing rate of catastrophic weather events</p><br>
            
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div id="moneyProgress">
            <div id="myBar"></div>
            </div>

            <br>
            <button id="bar" onclick="move()">click for total donation</button> 
            </div>


        </article>

        <aside class="box welcomebtns">
            <aside class="demo">
                <h1>Demo <i class="fas fa-mobile-alt"></i></h1>
            </aside>

            <aside class="continue">
                <a href="journey.php"><h1>Continue <i class="fas fa-chevron-circle-right"></i></h1>
                </a>
            </aside>
        </aside>
    </section>

<?php
include('includes/footer.php');
?>
