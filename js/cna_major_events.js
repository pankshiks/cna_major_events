(function($){
  jQuery(window).on("load",function(){
    jQuery(".table-scroll").mCustomScrollbar({
      axis:"x",
      theme:"dark-thin",
      autoExpandScrollbar:true,
      advanced:{autoExpandHorizontalScroll:true},
      scrollButtons:{enable:true}
    });  
  });

  jQuery(".session-card").click(function() {
    jQuery.fancybox.open({
      src  : '#card-detail',
      type : 'inline',
      showCloseButton : 'hide',
      opts : {
        afterShow : function( instance, current ) {
          console.info('done!');
        }
      }
    });
  });
})(jQuery);