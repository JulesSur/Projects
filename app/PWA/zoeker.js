//zoeker
		function myFunction() {
			var input, filter, ul, li, a, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			ul = document.getElementById("page1");
			ul2 = document.getElementById("page2");
			ul3 = document.getElementById("page3");
			ul4 = document.getElementById("page4");
			ul5 = document.getElementById("page5");
			ul6 = document.getElementById("page6");
			ul7 = document.getElementById("page7");

			li = ul.getElementsByClassName("item");
			li2 = ul2.getElementsByClassName("item");
			li3 = ul3.getElementsByClassName("item");
			li4 = ul4.getElementsByClassName("item");
			li5 = ul5.getElementsByClassName("item");
			li6 = ul6.getElementsByClassName("item");
			li7 = ul7.getElementsByClassName("item");
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
				} else {
					li[i].style.display = "none";
				}
			}

			for (i = 0; i < li2.length; i++) {
				a = li2[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li2[i].style.display = "";
				} else {
					li2[i].style.display = "none";
				}
			}
			for (i = 0; i < li3.length; i++) {
				a = li3[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li3[i].style.display = "";
				} else {
					li3[i].style.display = "none";
				}
			}
			for (i = 0; i < li4.length; i++) {
				a = li4[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li4[i].style.display = "";
				} else {
					li4[i].style.display = "none";
				}
			}
			for (i = 0; i < li5.length; i++) {
				a = li5[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li5[i].style.display = "";
				} else {
					li5[i].style.display = "none";
				}
			}
			for (i = 0; i < li6.length; i++) {
				a = li6[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li6[i].style.display = "";
				} else {
					li6[i].style.display = "none";
				}
			}
			for (i = 0; i < li7.length; i++) {
				a = li7[i].getElementsByTagName("h2")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li7[i].style.display = "";
				} else {
					li7[i].style.display = "none";
				}
			}
		}