/**
 * 
 * @returns {undefined}
 * This is a seperate file because it's nessesary for the AJAX to be completed before we do anything else.
 */
$(function(){
   $('.unsubscribe').on('click',function(eventData){
       console.log(this.id);
        console.log("unsubscribing...");
       var site_path='http://breader.localhost/';
       var ajax_setup={};
       ajax_setup.url=site_path+'categories/deleteRecommendation/'+this.id; 
       ajax_setup.dataType='html';
       ajax_setup.error=function(){
           console.log('Something is very wrong');
           
       };
       ajax_setup.success=function(response){
           alert('You will not receive any more stories like this one.');
           return false;

       };
       $.ajax(ajax_setup);
        return false;
        
    }); 
});