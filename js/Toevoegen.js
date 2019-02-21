$(document).ready(function(){
    $("#masonry").delegate('.item', 'click', function(){
      $(this).addClass("toegevoegd");  
      console.log("toegevoegd");
    });
    
    $('#container #cards').delegate('div.item', 'click', function(){
        var UID = document.getElementById("accountNaam");
        var ArtikelID = $(this).text();
        
        $.post('../php/feedCollector.php', {postUID: UID.innerHTML, postArtikelID: ArtikelID}, 
            function(feedData){
                $('#result').html(feedData);
            });
    });
 });

 