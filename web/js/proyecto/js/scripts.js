/* copy loaded thumbnails into carousel */
$('.row .thumbnail').on('load', function() {
  
}).each(function(i) {
  if(this.complete) {
  	var item = $('<div class="item"></div>');
    var itemDiv = $(this).parents('div');
    var title = $(this).parent('a').attr("title");
    
    item.attr("title",title);
  	$(itemDiv.html()).appendTo(item);
    if (i==0){ // set first item active
     item.addClass('active');
    }
  }
});

/* when clicking a thumbnail */
$('#myModalEvento').click(function(){
    var $idx = $(this).parents('div').index();
  	var $id = parseInt(idx);
  	$('#myModalEvento').modal('show'); // show the modal
   
  	
});



