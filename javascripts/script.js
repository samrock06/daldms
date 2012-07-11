$(document).ready(function() {
  $('#buttonForModal').click(function() {
  	$('#myModal').reveal();
  });
  $('ul.nav li a').click(function(e){
  	e.preventDefault();
  });
});