<?php

namespace Lib;

class PDF extends \FPDF {
    



var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}



function EventTable($data=array()){

    $this->SetFont('','B','24');
    $this->Cell(40,10,$event['name'],15);
    $this->Ln();

    $this->SetFont('','B','10');
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);
    $this->SetDrawColor(92,92,92);
    $this->SetLineWidth(.3);

    $this->Cell(10,7,"Id",1,0,'C',true);
    $this->Cell(30,7,"Title",1,0,'C',true);
    $this->Cell(90,7,"Description",1,0,'C',true);
    $this->Cell(30,7,"Price",1,0,'C',true);
    $this->Cell(20,7,"Style",1,0,'C',true);
    $this->Ln();


    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');


     $fill=false;
     
     $this->SetWidths(array(10,30,90,30,20));
     
    foreach($data as $element){
        
      
    
     $this->Row(array($element->getId(),$element->getTitle(),$element->getDescription(),$element->getPrice(),$element->getStyle()->getName()));
      
      // $this->Cell(10,25,$element->getId(),'LR',0,'L',$fill);
        // $this->Cell(30,25,$element->getTitle(),'LR',0,'R',$fill);
        // $this->Cell(90,25,$element->getDescription(),'LR',0,'L',$fill);
        // $this->Cell(30,25,$element->getPrice(),'LR',0,'R',$fill);
        // $this->Cell(20,25,$element->getStyle()->getName(),'LR',0,'R',$fill);
        // $this->Ln();
        // $fill =! $fill;  
        
    }
    
  
    
}







}    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
