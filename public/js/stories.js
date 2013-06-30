$(function(){
    function loadNew(){
        console.log("loading stories");
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
           $('#loadNew').css('display','block');
           $('body').css('cursor','auto'); //Because we want it like that

       };
       $.ajax(ajax_setup);
    }
    loadNew();
    $('#loadNew').on('click',function(){
       $('body').css('cursor','wait');
       loadNew(); 
    });
});