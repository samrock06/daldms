$(document).ready(function() {
	var hash = window.location.hash;
  	var path = hash.substring(1);

  	$('#buttonForModal').click(function() {
  		$('#myModal').reveal();
  	});
  	alert(window.location.hash);
  	//alert(path);
  	if(path){
  		$('dl.tabs dd').each(function(){
  			if( !$('a', this).attr('href')){
  				$(this).removeClass('active');
  			}
  			else if($('a', this).attr('href')){
  				$(this).addClass('active');
  			}
  		});
  	}

  	$('ul.nav li a').click(function(e){
  		e.preventDefault();
  	});
});