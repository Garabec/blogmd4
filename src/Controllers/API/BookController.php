<?php 

namespace Controllers\API;

use Lib\Controller;
use Lib\Response;
use Lib\FormatterFactory;
use Lib\App;

class BookController extends Controller {
    
    
    public function indexAction(){
        
      $code=200;
      
      $formate=App::$request->get('formatter');
      
      
      
      $formater= FormatterFactory::create($formate);
      
      
      
      
      $countBook=$this->repo_manager->get('Book')->countBook();
      $data=$this->repo_manager->get('Book')->getListBook($action_sort="up",$num_column_sort=1,$book_start=0,$countBook,$data_api=true);
        
        
        //dump($data);
        
        $response=(new Response($code,$data,$formater))->send(); 
        
         
        
        
    }
    
     public function viewAction(){
        
        
        
        
        
        
        
    }
    
    
    
}