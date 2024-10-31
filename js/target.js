//First wrap it for wordpress
jQuery(document).ready(function($) {

	//Now the script to replace the file
	$(document).ready(function(){
		$("a.target_blank").click(function(){
    		window.open(this.href);
    		return false;
  		});
	});
});