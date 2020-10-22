(function($) {
    "use strict";
	
	var assect_cookie=0;
  
    $(document).ready(function() {
        blog.init();
	
    });
    // conditions pour charger le modal cookies


        $(document).ready(function() { 
            $(".cookie_btn").click(function() { 
                $(".blog_cookies_div").hide();
                assect_cookie=1;
            }); 
        }); 

    // Window Scroll
    $(window).scroll(function() {
        var wh = window.innerWidth;
        // //Go to top
		if(assect_cookie == 0){
			if ($(this).scrollTop() >1500) {
			$(".blog_cookies_div").show();
			} else {
			$(".blog_cookies_div").hide();
			}
		}
        
		 
	});

})(jQuery); 