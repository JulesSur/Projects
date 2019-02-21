window.addEventListener('load', e => {
	updateNews();
	ElementChecker();
});

if ('serviceWorker' in navigator) {
	try {
		navigator.serviceWorker.register('serviceWorker.js');
		console.log('SW registred');
	} catch (Error) {
		console.log('SW reg failed');
	}
}


async function updateNews() {
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;
		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/contentLoader.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page1').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})


		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold


		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/contentLoader.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page1').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})

	});



	//DeStandaard
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/destandaardContent.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page2').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})
		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold
		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/destandaardContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page2').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});


	//De Tijd
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/DeTijdContent.php",
			data: {
				'offset': 0,
				'limit': 10
			},
			success: function (data) {
				asked = false;
				$('#page3').append(data);
				flag += 20;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})
		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold
		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/DeTijdContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page3').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});


	//HLN
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/hlnContent.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page4').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})
		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold
		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/hlnContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page4').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});



	//NYT
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/NYTContent.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page5').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})
		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold
		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/NYTContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page5').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});



	//BBC
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/BBCContent.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page6').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})


		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold


		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/BBCContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page6').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});



	//Pajot
	$(document).ready(function contentLaden() {
		var flag = 0,
			asked = true;

		$.ajax({
			type: "GET",
			url: "https://myfeeds.be/app/Content/pajotContent.php",
			data: {
				'offset': 0,
				'limit': 20
			},
			success: function (data) {
				asked = false;
				$('#page7').append(data);
				flag += 10;
			},
			complete: function (data) {
				$('#loading').remove();
				$("body").css("overflow-y", "scroll");
			}
		})
		//Er worden 10 nieuwe artikels opgeladen van contentLoader met een ajax call wanneer de gebruiker
		//tot op de bodem van de pagina scrold
		$(window).scroll(function scrollContent() {
			if (asked == false && $(window).scrollTop() >= ($(document).height() - $(window).height() - 1500)) {
				asked = true;
				$('#loading').show();
				$.ajax({
					type: "GET",
					url: "https://myfeeds.be/app/Content/pajotContent.php",
					data: {
						'offset': flag,
						'limit': 10
					},
					success: function (data) {
						asked = false;
						$('#page7').append(data);
						flag += 10;
					},
					complete: function (data) {
						$('#loading').remove();
						$("body").css("overflow-y", "scroll");
					}
				})
			}
		})
	});
}


async function ElementChecker() {
	$("img").each(function () {
		if ($(this).attr("src") == null || $(this).attr("src") == '') {
			$(this).remove();
		}
	})

	var elements = document.getElementsByTagName("p");

	for (var i = 0; i < elements.length; i++) {
		if (elements[i].textContent.trim() === '')
			elements[i].parentNode.removeChild(elements[i]);
		console.log("Verwijder lege p tags");
	}
}

