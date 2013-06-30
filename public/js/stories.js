$(function(){
       var site_path='http://breader.localhost/';
       var ajax_setup={};
       ajax_setup.url=site_path+'stories/showStories'; 
       ajax_setup.type='post';
       ajax_setup.cache=false;
       ajax_setup.dataType='html';
       ajax_setup.error=function(){
           console.log('Something is very wrong');
           
       };
       ajax_setup.success=function(response){
           $('#stories').html(response);
           $('#stories').css('padding-bottom','5px');
       };
       $.ajax(ajax_setup);
});