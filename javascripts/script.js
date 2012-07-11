$(document).ready(function() {
  $('#buttonForModal').click(function() {
  	$('#myModal').reveal();
  });

  $('ul#stat li').click(function(e){
  	alert("clicked");
  	var val = $(this).attr('id');
  	alert(val);
  	$('#status').val(val);
  	e.preventDefault();
  });
});