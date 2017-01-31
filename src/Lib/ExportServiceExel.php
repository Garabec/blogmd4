<?php

namespace Lib;

class ExportServiceExel implements ExportInterface{
    
 
    private $doc_excel;
    private $doc_excel_factory;
 
 
   public function __construct(\PHPExcel $objPHPExcel){
       
    
    $this->doc_excel=$objPHPExcel;
    
    
       
   }
 
 
    public function createDocument($filename, array $data){
        
    
    header("Content-Type:application/vnd.ms-excel");

    header("Content-Disposition:attachment;filename=$filename");

 

      $objWriter = \PHPExcel_IOFactory::createWriter($this->doc_excel, 'Excel5');
      
      $this->doc_excel_factory=$objWriter;
      
      
$this->doc_excel->setActiveSheetIndex(0);

$active_sheet = $this->doc_excel->getActiveSheet(); 

$this->doc_excel->createSheet();
      
      //Ориентация страницы и  размер листа

$active_sheet->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

$active_sheet->getPageSetup()->SetPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

//Поля документа       

$active_sheet->getPageMargins()->setTop(1);

$active_sheet->getPageMargins()->setRight(0.75);

$active_sheet->getPageMargins()->setLeft(0.75);

$active_sheet->getPageMargins()->setBottom(1);

//Название листа

$active_sheet->setTitle("Прайс-лист");  

//Шапа и футер

$active_sheet->getHeaderFooter()->setOddHeader("&CШапка нашего прайс-листа");

$active_sheet->getHeaderFooter()->setOddFooter('&L&B'.$active_sheet->getTitle().'&RСтраница &P из &N');

//Настройки шрифта

$this->doc_excel->getDefaultStyle()->getFont()->setName('Arial');

$this->doc_excel->getDefaultStyle()->getFont()->setSize(12);


$active_sheet->getColumnDimension('A')->setWidth(4);

$active_sheet->getColumnDimension('B')->setWidth(20);

$active_sheet->getColumnDimension('C')->setWidth(90);

$active_sheet->getColumnDimension('D')->setWidth(10);

$active_sheet->getColumnDimension('E')->setWidth(10);

//Создаем шапку таблички данных
$active_sheet->setCellValue('A1','Id');

$active_sheet->setCellValue('B1','Title');

$active_sheet->setCellValue('C1','Description');

$active_sheet->setCellValue('D1','Price');

$active_sheet->setCellValue('E1','Style');

//Стили для верхней надписи строка 1

$style_header = array(

//Шрифт
'font'=>array(
'bold' => true,
'name' => 'Times New Roman',
'size' => 20
),
//Выравнивание
'alignment' => array(
'horizontal' => \PHPExcel_STYLE_ALIGNMENT::HORIZONTAL_CENTER,
'vertical' => \PHPExcel_STYLE_ALIGNMENT::VERTICAL_CENTER,
),
//Заполнение цветом
'fill' => array(
'type' => \PHPExcel_STYLE_FILL::FILL_SOLID,
'color'=>array(
'rgb' => 'CFCFCF'
)
)
);
 
$active_sheet->getStyle('A1:E1')->applyFromArray($style_header);


//В цикле проходимся по элементам массива и выводим все в соответствующие ячейки

$row_start = 2;

$i = 0;

foreach($data as $element) {

$row_next = $row_start + $i;

// изменим высоту
$active_sheet->getRowDimension($row_next)->setRowHeight(60);

$active_sheet->setCellValue('A'.$row_next,$element->getId());

$active_sheet->setCellValue('B'.$row_next,$element->getTitle());

$active_sheet->setCellValue('C'.$row_next,$element->getDescription());

$active_sheet->setCellValue('D'.$row_next,$element->getPrice());

$active_sheet->setCellValue('E'.$row_next,$element->getStyle()->getName());
$i++;

}


//делаем перенос текста в столбце
$this->doc_excel->getActiveSheet()->getStyle('C1:C'.$this->doc_excel->getActiveSheet()->getHighestRow())
    ->getAlignment()->setWrapText(true);

$this->doc_excel->getActiveSheet()->getStyle('B1:B'.$this->doc_excel->getActiveSheet()->getHighestRow())
    ->getAlignment()->setWrapText(true);


     }
     
     
    public function download(){
        
     $this->doc_excel_factory->save('php://output');
     
     exit();
        
    }
    
    
    public function open(){
        
        
    }  
    
    
    
    
}