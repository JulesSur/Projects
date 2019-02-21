$( document ).ready(function() {
    var eenMalig = true;
    
    $( ".optie" ).click(function() {
      if(eenMalig == true){
        $( this ).addClass("active");
        eenMalig = false;
      }
    });
    
    var header = document.getElementById("Standaard");
    var btns = header.getElementsByClassName("optie");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
    
    var header2 = document.getElementById("HLN");
    var btns = header2.getElementsByClassName("optie");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
});