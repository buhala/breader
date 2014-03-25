$(function(){
	console.log("TOASTER")
	$('a.delete').on('click',function(){
		return confirm('Are you sure?');
		
	});
});