
    var secondsElapsed=0;
    var minutesElapsed=0;
   function startTimer(){
	console.log('TImer started');
       setInterval(function(){setTimer();},1000);
   } 
   function setTimer(){
       
      secondsElapsed++;
      if(secondsElapsed==60){
          minutesElapsed++;
		  secondsElapsed=0;
      }
	  if(secondsElapsed<10){
	  secondsElapsedText="0"+secondsElapsed;
	  }
	    else{
		secondsElapsedText=secondsElapsed;
      }
      $('#minutes').html(minutesElapsed);
      $('#seconds').html(secondsElapsedText);
   }
 
