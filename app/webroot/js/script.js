$(document).ready(function(){		
	     
	        $('.carousel').slick({
 			 infinite: true,
 			 slidesToShow: 3,
 			 slidesToScroll: 3,
 			
	      });
	        $('.slider-for').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,			  
			  fade: true,
			  asNavFor: '.slider-nav'
			});
			$('.slider-nav').slick({
			  slidesToShow: 6,
			  slidesToScroll: 1,
			  asNavFor: '.slider-for',
			  dots: true,
			  arrows: false,
			  focusOnSelect: true
			}); 			
  	$('.mobile').on('click', function () {
	if($(this).hasClass('mob_active')){
		$(this).removeClass('mob_active');		
	}else{
		$(this).addClass('mob_active');
	}							
		  }); 
		     $(".tab").lightTabs();	
		 		
});

(function($){               
    jQuery.fn.lightTabs = function(options){
        
        var createTabs = function(){
            tabs = this;
            i = 0;
            
            showPage = function(i){
                $('.about_tabs').children("div").hide();
                $('.about_tabs').children("div").eq(i).show();
                $('.type_top').children("button").removeClass("active");
                $('.type_top').children("button").eq(i).addClass("active");
            }
            
            showPage(0);                
            
            $('.type_top').children("button").each(function(index, element){
                $(element).attr("data-page", i);
                i++;                        
            });
            
            $('.type_top').children("button").click(function(){
                showPage(parseInt($(this).attr("data-page")));
            });             
        };      
        return this.each(createTabs);
    };  
})(jQuery);