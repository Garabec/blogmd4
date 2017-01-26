<?php


class Pagination {
    
   public $buttons=array();
   
   
   public function __construct($itemCount,$itemPerPage,$currentPage=1) {
       
     
     //var_dump($itemCount,$itemPerPage,$currentPage);
     //die;
     
     
     if(!$currentPage){
         
         throw new Exception("There can not be a zero page");
         
     };
       
    
     $pagesCount=ceil($itemCount/$itemPerPage);
     
     
     
     
     
     if($currentPage>$pagesCount){
         
        $currentPage=$pagesCount; 
     }
    
     
     
     
     $this->buttons[]=new Button($currentPage-1,$currentPage>1,"Previous");
     
     for($i=1 ; $i<=$pagesCount; $i++){
         
         
         
       $this->buttons[]=new Button($i,$i!=$currentPage) ; 
         
     };
    
      $this->buttons[]=new Button($currentPage+1,$currentPage<$pagesCount,"Next"); 
       
     
     
     
       
   }
    
    
    
    
    
    
}