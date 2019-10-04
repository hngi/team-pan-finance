
jQuery(document).ready(function() {
	
    /*
        Background slideshow
    */    
    $('.testimonials-container').backstretch([
                                   "https://res.cloudinary.com/femosocratis/image/upload/v1570211354/1_dyxmja.jpg"
                                 , "https://res.cloudinary.com/femosocratis/image/upload/v1570211360/2_fjejyi.jpg"
                                 ], {duration: 3000, fade: 750});
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(){
    	$('.testimonials-container').backstretch("resize");
    });
	
});
