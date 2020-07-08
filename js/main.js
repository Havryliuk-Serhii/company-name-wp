/*==================
  Toggle menu 
====================*/
$(".menu-toggle").click(function() {
    $(this).toggleClass('active');
    $("ul.menu li").slideToggle('fast');
})

$(window).resize(function() {
    if ($(window).width() > 992) {
        $('ul.menu li').removeAttr('style');
    }
})

/*==================
  Hero slider  
====================*/ 
 $(".hero-slider").owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      dots:true,
      nav:true,
      items:1   
});

/*===================
  Porfolio carousel  
=====================*/
 $(".portfolio-slider").owlCarousel({
      loop:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      nav:true,
      dots:false,      
      responsive:{
        320:{
            items:1
        },
        576:{
            items:2
        },
        768:{
          items:3
        },
        992:{
            items:4,
            nav:true
        }
    }

 });


 