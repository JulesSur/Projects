$(document).ready(function contentLaden(){
    var flag = 0, asked=true;
    
        $.ajax({
                type:"GET",
                url: "../php/contentLoader.php",
                data:{
                'offset': 0,
                'limit': 10
            },
            success: function(data){
            asked= false;
            $('#masonry').append(data);
                flag += 10; 
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
    if ( asked == false && !$("#Standaard li").hasClass("optie active") && !$("#HLN li").hasClass("optie active")  && $(window).scrollTop() >= $(document).height() - $(window).height() - 1000) {
     asked = true;
            $('#loading').show();
                  $.ajax({
                    type:"GET",
                    url: "../php/contentLoader.php",
                    data:{
                    'offset': flag,
                    'limit': 10
                    },
                    success: function(data){
                        asked = false;
                    $('#masonry').append(data);
                    flag += 10;
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
                        
                         $("#zoeker").change(function () {
                    var tekst = $(this).val();
                    $(".item").hide();
                    $(".item h3:contains('" + tekst + "')").parent().show();
                         });
                        
                        $(".favo").click(function(){
                            $(this).toggleClass("toegevoegd");
                        });
                    }
                })
            }
        });
    });

