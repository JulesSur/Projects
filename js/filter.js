$(document).ready(function filteren(){
    $('#aside').delegate('ul ul li', 'click', function(){
    
    var Filter = $(this).text();
    var flagFilter = 0, asked=true;
    
        $.ajax({
                type:"GET",
                url: "../php/filter.php",
                data:{
                'Filter': Filter,
                'offsetFilter': 0,
                'limitFilter': 10
            },
            success: function(data){
            asked= false;
            
            $('#masonry').html(data);
                flagFilter += 10; 
            },
            complete: function(data){
                $.getScript( "../js/masonry.js", function(data) {
                $('#masonry').masonry({
                columWidth: 'div.item',
                itemSelector: 'div.item'
                })
                $('#loading').remove();
                $("body").css("overflow-y", "scroll");
            })
            }
        })

         
//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
//tot op de bodem van de pagina scrold

    $(window).scroll(function scrollContent(){
    if ( asked == false && $(window).scrollTop() >= $(document).height() - $(window).height() - 1000) {
     asked = true;
            $('#loading').show();
            
                  $.ajax({
                    type:"GET",
                    url: "../php/filter.php",
                    data:{
                    'Filter': Filter,
                    'offsetFilter': flagFilter,
                    'limitFilter': 10
                    },
                    success: function(data){
                        asked = false;
                    $('#masonry').append(data);
                    flagFilter += 10;
                    },
                    complete: function(data){
                        $.getScript( "../js/masonry.js", function(data) {
                            console.log("hallo2");    
                            $('#masonry').masonry({
                            columWidth: 'div.item',
                            itemSelector: 'div.item'
                            })
                            
                            $('#loading').remove();
                            $("body").css("overflow-y", "scroll");
                        })
                    }
                })
            }
        });
        
    })
        
        
    });

