  $(document).ready(function () {
  	var stickyNavTop = $('nav').offset().top;

  	var stickyNav = function () {
  		var scrollTop = $(window).scrollTop();

  		if (scrollTop >= 45) {
  			$('header img').addClass('verdwijn');
  			$('h1').addClass('verdwijn');
  		} else {
  			$('header img').removeClass('verdwijn');
  			$('h1').removeClass('verdwijn');
  		}

  		if (scrollTop > stickyNavTop - 50) {
  			$('nav').addClass('sticky');
  			$('#zoeker').addClass('backgroundForm');
  		} else {
  			$('nav').removeClass('sticky');
  			$('#zoeker').removeClass('backgroundForm');
  		}
  	};

  	stickyNav();

  	$(window).scroll(function () {
  		stickyNav();
  		var elements = document.getElementsByTagName("p");

  		for (var i = 0; i < elements.length; i++) {
  			if (elements[i].textContent.trim() === '')
  				elements[i].parentNode.removeChild(elements[i]);
  		}

  		$("img").each(function () {
  			if ($(this).attr("src") == null || $(this).attr("src") == '') {
  				$(this).remove();
  			}
  		});
  	});
  });
