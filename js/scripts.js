(function ($, root, undefined) {
	
		//*****SLICK*****//
      jQuery('.mainslider').slick({
		  dots: true,
		  arrows:true,
		  infinite: true,
		  speed: 1000,
		  slidesToShow: 1,
		  autoplaySpeed: 3500,
		  autoplay:true,
		  responsive:[
			{
			  breakpoint: 480,
			  settings:{
				 arrows:false
				  
			  }
			}
		   ]
      });
	  

	  //*****BURGER MENU*****//
	  jQuery("#nav-resp").mmenu({
	  "extensions": [
	  "effect-menu-slide"
	   ]
	  });
	  var API = jQuery("#nav-resp").data( "mmenu" );

	  jQuery("#button-resp").click(function() {
		 API.open();
	  });
	  
 
	//*****FIXED MENU*****//
	jQuery("document").ready(function($){
		var nav = $('.home_logo');
		
		$(window).scroll(function(){			
			if ($(this).scrollTop() > 320) {
				nav.addClass("fixed");
			}else{
				nav.removeClass("fixed");
			}
		});
	
		var navall = $('.all_logo');
		
		$(window).scroll(function(){
			if ($(this).scrollTop() > 5) {
				navall.addClass("fixed");
			}else{
				navall.removeClass("fixed");
			}
		});
	});

	//*****Remplacement des terme du plugin business directory*****//
	jQuery("document").ready(function($){
		
		var texteBouton = $('#wpbdp-bar-view-listings-button');
		var texteVue = $('.view-listing');
		var texteRetourdirectory =$('.back-to-dir');
		var texteTitremessage =$('.contact-form-wrapper h3');
		$(function(){

		 
		 // texteBouton.replaceWith('Voir toutes les entreprises');
		 	texteBouton.val('Voir toutes les entreprises');
		 	texteVue.text('Voir');
		 	texteRetourdirectory.val('Retour à l\'annuaire');
		 	texteTitremessage.text('Envoyer un message à l\'entreprise');
			});
	});
	/************Ajouter meta pour dséindexer une page ********************
	jQuery("document").ready(function($){
		
		$(function(){

		 	$('.annuaire-professionnel head').prepend(<meta name="robots" content="noindex, nofollow">);

			});
	});*/
})(jQuery, this);

  


