$(function(){
        function getURLParameter(name) {
            return decodeURI(
                (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
            );
        }

    function loadNew(){
        console.log("loading stories");
       var site_path='http://breader.localhost/';
       var ajax_setup={};
       if(getURLParameter('sort')=='new'){
           appender="new";
       }
       else{
           appender="random";
       }
       ajax_setup.url=site_path+'stories/showStories/'+appender; 
       ajax_setup.type='post';
       ajax_setup.cache=false;
       ajax_setup.dataType='html';
       ajax_setup.error=function(){
           console.log('Something is very wrong');
           
       };
       ajax_setup.success=function(response){
           if(getURLParameter('sort')=='new'){

           $('#stories').html("<center><b>Warning:</b> This mode provides only the newest stuff. It will show <b>less</b> results than the default mode</center>");
           }
           else{
               $('#stories').html("");
           }
           $('#stories').append(response);
           $('#stories').css('padding-bottom','5px');
           $('#loadNew').css('display','block');
   //        $('head').append('      <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher: "2b149300-628b-448c-b81b-7864f56066c2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>');
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