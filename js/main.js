var menu_button = document.getElementById('menu-button');
var	shadow = document.getElementById('shadow');
	var logInForm = document.getElementById('logInForm');

menu_button.onclick = function() {
	if(document.documentElement.clientWidth<1200){
	shadow.classList.contains("show") ?(
				document.body.classList.remove("noscroll"),
				shadow.classList.remove("show"),
				menu_button.classList.remove("menuOpen"),
				document.getElementById("menuMobile").classList.remove("menuMobileOpen")
		):(
				document.body.classList.add("noscroll"),
				shadow.classList.add("show"),
				menu_button.classList.add("menuOpen"),
				document.getElementById("menuMobile").classList.add("menuMobileOpen")
		);
};
}

shadow.onclick = function(){
	console.log(4),
	document.body.classList.remove("noscroll"),
	shadow.classList.remove("show"),
	menu_button.classList.remove("menuOpen"),
	document.getElementById("menuMobile").classList.remove("menuMobileOpen")
	if (logIn.style.width == "100vw") {
		logIn.onclick();
	}

}

var lastScrollTop = 0;
window.onscroll = function(){
	if(document.documentElement.clientWidth<1200){
		var st = document.documentElement.scrollTop;
		if (st-lastScrollTop>30){
	   	document.getElementById("menu-button").classList.add("hidenLeft");
		 	document.getElementById("logIn").classList.add("hidenRight");
		}
		if (st-lastScrollTop<-30) {
	   	document.getElementById("menu-button").classList.remove("hidenLeft");
		 	document.getElementById("logIn").classList.remove("hidenRight");
		}
	lastScrollTop = st;
	}
	else{
		console.log(window.pageYOffset);
		var  menu_grad = document.getElementById("menu-grad");
			if(window.pageYOffset>(document.getElementById("header").offsetHeight-55)){
				menu_grad.classList.add("fixedTop");
			}
			else{
				menu_grad.classList.remove("fixedTop");
			}

	}
}

$('.go_to').click( function(){
	menu_button.onclick();
	var scroll_el = $(this).attr('href');
        if ($(scroll_el).length != 0) {
					  $('html, body').animate({ scrollTop: $(scroll_el).offset().top-55}, 500);
        }
	    return false;
    });

var logIn = document.getElementById("logIn");
logIn.onclick = function(){
	console.log(2);
	if(logIn.style.width == "100vw"){
		document.body.classList.remove("noscroll");
		logInForm.classList.remove('open');
		if(document.documentElement.clientWidth<1200){	logIn.style.width = 11+"vw";} else {	logIn.style.width = 100+"px";}
		logIn.style.borderBottomLeftRadius = 50+"%";
		document.getElementById("img_login").style.display = "block";
		menu_button.style.display = "block";
		shadow.classList.remove("show");
	}
	else{
		if(menu_button.classList.contains("menuOpen")){
			menu_button.classList.remove("menuOpen");
			document.getElementById("menuMobile").classList.remove("menuMobileOpen");
		}
	document.body.classList.add("noscroll");
	logIn.style.width = 100+"vw";
	logIn.style.borderBottomLeftRadius = 0;
	document.getElementById("img_login").style.display = "none";
	menu_button.style.display = "none";
	shadow.classList.add("show");
	logInForm.classList.add('open');
	}

	}
