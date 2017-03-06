

var sum=0;

function read(){
    
  var res;
   function getRandomInt(a, b)
{
  return Math.floor(Math.random() * (b - a + 1)) + a;
}
    
 res=getRandomInt(1,10); 
 
 sum=sum+res;
 
 $("h4#read_news").text('Эту новость читают '+res+' чел ----------  Эту новость  просмотрело  ' + sum + ' чел'    ); 
 
 


 
    
}

setInterval(read, 3000);

