<?php

namespace Lib;

 class ExportServicePDF implements ExportInterface{
     
   private $pdf;
   private $file_name;
   
   
   function __construct(PDF $pdf){
       
       
     $this->pdf=$pdf;   
     $this->pdf->SetFont('Arial','',10);
     $this->pdf->AddPage();  
       
   }
   
   public function createDocument($filename, array $data){
       
       
    
      $this->file_name=$filename;
      $this->pdf->EventTable($data); 
       
       
   }
    public function download(){
     
      $this->pdf->Output("D",$this->file_name);  
        
    }
    public function open(){
        
        
    }
    





     
     
     
 }