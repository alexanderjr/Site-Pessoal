(function(){
	Site = {
	
	btnMenu        : document.querySelector(".menu-mobile"),
	menu           : document.querySelector(".menu"),
	logo           :  document.querySelector(".logo-topo"),
	modal          : document.querySelector(".modal"),
	btnCloseTop    : document.querySelector(".close-top"),
	jobs           : document.querySelectorAll(".jobs"),
	loading        : document.querySelector(".loading"),
	readMore       : document.querySelector(".read-more"),
	box            : document.querySelector(".box"),
	imageModal     : document.querySelector(".box").querySelector("img"),
	optionsMenu    : document.querySelector(".menu").querySelector("ul").querySelectorAll("li"),
	isUp           : true,

	init: function (){
		Site.events();
	},

	events: function (){

		// show menu mobile
		this.btnMenu.addEventListener("click", function (){
			if(!eval(Site.menu.getAttribute("data-show"))){
				Site.menu.classList.add("menu--active");
				Site.menu.setAttribute("data-show", true);
				this.classList.add("close-menu");
			}
			else{
				Site.menu.classList.remove("menu--active");
				Site.menu.setAttribute("data-show", false);	
				this.classList.remove("close-menu");
			}
		});

		// add event click each job to show in modal
		for(var c = 0; c < this.jobs.length;c++){
			this.jobs[c].addEventListener("click", function (obj){
				temp = {
						customer : this.getAttribute("data-customer"),
						date : this.getAttribute("data-date"),
						tecnologies : this.getAttribute("data-tecnologies"),
						title : this.getAttribute("data-title"),
						image : this.getAttribute("data-image"),
						url : this.getAttribute("data-url")
					};
				Site.setModal(temp);
				Site.modal.classList.remove("modal--deactive");
				Site.modal.classList.add("modal--active");
			});
		}

		// close modal
		this.btnCloseTop.addEventListener("click", function (){
			Site.closeModal();
		});



		// close modal by esc key
		document.addEventListener("keyup", function (e){
		  if (e.keyCode == 27) { 
		       Site.modal.classList.remove("modal--active");
			   Site.modal.classList.add("modal--deactive");
		    }
		})

		// adjust menu onresize window
		window.addEventListener("resize", function (){
			Site.setFixedMenu();
		});

		//lazyload
		window.addEventListener("scroll", function (){
			var imgs = document.querySelectorAll('img[data-src]:not([src])');

			for (var i = 0; i < imgs.length; i++) {
	            if (imgs[i].getBoundingClientRect().top < window.innerHeight + 200) {
	                imgs[i].src = imgs[i].getAttribute('data-src');
	            }
	        }
		});

		// transform icon menu by scrolling
		window.addEventListener("scroll", function (){
			Site.setFixedMenu();
			
			var iconMobile = document.querySelector(".menu-mobile")

			if(window.pageYOffset > window.innerHeight){
				iconMobile.classList.add("menu-inverse");
			}
			else{
				iconMobile.classList.remove("menu-inverse");	
			}
		});

		//animate arrow down
		window.addEventListener("load", function (){
			document.body.classList.add("fade-entry")
			setInterval(function (){
				if(Site.isUp){
					Site.isUp = false;
					Site.readMore.classList.remove("animate-down");	
					Site.readMore.classList.add("animate-up");
				  }
				  else{
				  	Site.isUp = true;
				  	Site.readMore.classList.remove("animate-up");	
					Site.readMore.classList.add("animate-down");	
				  }
			},750);
		});

		// add event each anchor menu to hide in mobile
		for(var c = 0; c < this.optionsMenu.length;c++){
			this.optionsMenu[c].addEventListener("click", function (obj){
				Site.menu.classList.remove("menu--active");
				Site.menu.setAttribute("data-show", false);	
				Site.btnMenu.classList.remove("close-menu");
			});
		}

		Site.imageModal.addEventListener("load", function (){
			Site.box.classList.remove("none");
			Site.box.classList.add("block");
			Site.loading.classList.add("none");
			Site.loading.classList.remove("block");
		});
	},

	closeModal: function (){
		Site.modal.classList.remove("modal--active");
		Site.modal.classList.add("modal--deactive");
		Site.loading.classList.add("block");
		Site.box.classList.remove("block");
		Site.box.classList.add("none");
	},

	setModal:function (obj){
		
		Site.modal.querySelector(".image").setAttribute("src",obj.image);
		Site.modal.querySelector(".customer").innerHTML = obj.customer;
		Site.modal.querySelector(".date").innerHTML = obj.date;
		Site.modal.querySelector(".tecnologies").innerHTML = obj.tecnologies;
		Site.modal.querySelector(".job-title").innerHTML = obj.title;

		if(obj.url.trim() != ""){
			var temp = Site.modal.querySelector(".link-project");
			temp.style.display = "block";
			temp.setAttribute("href",obj.url);
		}
		else{
			Site.modal.querySelector(".link-project").style.display = "none";
		}
	},

	setFixedMenu: function (){

		if(window.innerWidth < 767){
			this.menu.classList.remove("menu-fixed");	
			return;
		}

		if(document.body.scrollTop > 45){
			this.menu.classList.add("menu-fixed");
			this.logo.classList.add("logo-topo-inverse");
		}
		else{
			this.menu.classList.remove("menu-fixed");	
			this.logo.classList.remove("logo-topo-inverse");
		}
	}

}

Site.init();


})();