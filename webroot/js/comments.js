$(document).ready(function() {
 
// $(document).on('click', '#minus_rating', function(e) {
//         e.preventDefault();




 
$('a').click(function() {
  
  
    
    
  var id=$(this).attr('id');
  
  var attr=$(this).attr('href');
   

        
    id=$("#"+id).data('comment-id');
    
   
    
  if(attr=="#minus"){  
  
   //alert(id);
        
  $.ajax({
  type: "POST",
  url: "/comment_rating", // Обработчик.
  data: "q="+id, // В переменной <strong>q</strong> отправляем ключевое слово в обработчик.
  dataType: "html",
  cache: false,
  success: function(data) {
    
    //alert(id);


 var block = $('a#minus'+id);
 
 block.text(data);
 

 block.show;
 
 // $("#list-search-result").html(data); // Добавляем в список результат поиска.
    

} } 



); 
 
};


if(attr=="#plus"){  
  
   //alert(id);
        
  $.ajax({
  type: "POST",
  url: "/comment_rating_plus", // Обработчик.
  data: "q="+id, // В переменной <strong>q</strong> отправляем ключевое слово в обработчик.
  dataType: "html",
  cache: false,
  success: function(data) {
    
    //alert(id);


 var block = $('a#plus'+id);
 
 block.text(data);
 

 block.show;
 
 // $("#list-search-result").html(data); // Добавляем в список результат поиска.
    

} } 



); 
 
};






  
    
});     
    
     
    
}  );



 
//  $("a#minus_rating").click(function(){
  
//   $.get("/post?comment=mihus");
  
  
  
//  var id=$("a#minus_rating").data('comment-id');
   
//   alert(id);
  
  
  
//  });
  
  
  
