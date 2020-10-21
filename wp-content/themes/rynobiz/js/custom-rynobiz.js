jQuery(document).ready(function() {

	// CONSULTERA CHILD 2 SEARCH BAR
    jQuery('.searchBar').click(function(){
    	jQuery('.searchField').slideToggle();
    });

	// 04 - KEYBOARD ACCESSIBLE MENU ON TAB KEY START
    jQuery('.searchBar').focus( function () {
    	jQuery(this).removeClass("focused");
        jQuery(this).siblings('.searchField').children(".search-form").children(".form-control").addClass('focused');
    }).blur(function(){
        jQuery(this).siblings('.searchField').children(".search-form").children(".form-control").removeClass('focused');
    });
    //Sub Menu
    jQuery('.form-control').focus( function () {
        jQuery(this).addClass('focused');
    }).blur(function(){
        jQuery(this).removeClass('focused');
        jQuery(".searchField").hide();
        //jQuery(this).parent().parent().siblings(".searchBar").addClass('focused');
    });
	
});