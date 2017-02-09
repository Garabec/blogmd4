<?php

$sc= new Lib\ContainerBuilder();

$sc->set('repasitory_man',new Lib\RepasitoryManager());
$sc->set('service_excel', new Lib\ExportServiceExel( $objPHPExcel= new \PHPExcel ));
$sc->set('service_pdf',new Lib\ExportServicePDF( $pdf=new Lib\PDF()));
$sc->set('dispatcher', new \Symfony\Component\EventDispatcher\EventDispatcher());

return $sc;