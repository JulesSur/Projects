  $(document).ready(function() {
        var stickyNavTop = $('#zoekBalkWrapper').offset().top;
         
        var stickyNav = function(){
        var scrollTop = $(window).scrollTop();
              
        if (scrollTop > stickyNavTop && !$('aside').hasClass('verwijderAside')) { 
            $('#zoekBalkWrapper').addClass('sticky');
            $('#asideWrapper').addClass('fixedAside');
            $('.togelAside').addClass('fixedTogelAside')
        }else if(scrollTop > stickyNavTop && $('aside').hasClass('verwijderAside')){
            $('#zoekBalkWrapper').addClass('sticky');
            $('.togelAside').addClass('fixedTogelAside');
        }else {
            $('#zoekBalkWrapper').removeClass('sticky');
            $('#asideWrapper').removeClass('fixedAside');
            $('.togelAside').removeClass('fixedTogelAside');
            }
            
        if ($(window).width() <= 760) {
                $('#cards').css("margin-left", "0");
                $('#topScroll').css("display", "none")
            }
        };
         
        stickyNav();
         
        $(window).scroll(function() {
            stickyNav();
        });
        
        $( window ).resize(function() {
           stickyNav();
        });
        

        $(".togelAside").click(function() {
              $("aside").toggleClass("verwijderAside");
        });
    });