(function($){
  alert('contorl came here');
  // Table horizontal scroll
  jQuery(window).on("load",function(){
    jQuery(".table-scroll").mCustomScrollbar({
      axis:"x",
      theme:"dark-thin",
      autoExpandScrollbar:true,
      advanced:{autoExpandHorizontalScroll:true},
      scrollButtons:{enable:true}
    });  
  });

  // Preview fancybox on click session element
  jQuery(".session-card").click(function() {
    var sessionpopid = $(this).attr('data');
    jQuery.fancybox.open({
      src  : '#'+sessionpopid,
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