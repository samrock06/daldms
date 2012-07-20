$(document).ready(function() {
	$('#submenu ul').hide();

  	$('#buttonForModal').click(function() {
  		$('#myModal').reveal();
  	});
  	$('#searchSubmit').click(function(e){
  		var query = $('input#searchBox').val();
  		alert(query);
  		e.preventDefault();
  	});
  	$('#submenu').hover(function(){
  			$(this).find('ul').slideDown('fast');
  		},function (){
  			$(this).find('ul').slideUp('fast');
  		}
  	);
});