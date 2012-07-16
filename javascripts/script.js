$(document).ready(function() {
  	$('#buttonForModal').click(function() {
  		$('#myModal').reveal();
  	});
  	$('#searchSubmit').click(function(e){
  		var query = $('input#searchBox').val();
  		alert(query);
  		e.preventDefault();
  	});
});