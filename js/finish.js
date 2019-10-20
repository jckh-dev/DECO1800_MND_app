function move() {
    var elem = document.getElementById("myBar");
    var height = 0;
    //var total_donation =; //input the code to get the money//
    var id = setInterval(frame, 10);
    function frame() {
        if (height >= 83) {
            clearInterval(id);
        } else {
            height++;
            elem.style.height = height + '%';
        }
    }
}