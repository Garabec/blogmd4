<?php



class RegisterForm{
    
  protected $data=array();
    
    
    protected $request;
    
    
    
    public function __construct(){
       
       $this->request=new Request; 
       
       $this->data=$this->request->getPost();
        
       
        
    }
    
    
    public function getRequest(){
        
        
     return $this->request;   
        
    }
    
    public function isValid(){
        
        
        
        return  $this->data['email']!="" && $this->data['password']!="" && $this->data['confirm_password'];
        
    }
    
    
    public function matchPassword(){
        
        
     return $this->data['password']==$this->data['confirm_password'];  
        
    }
    
    
    public function getData(){
        
        
      return $this->data;  
        
        
    }
      
    
   public function captcha() {
       
    // $securityNumber = $_GET['number'];
    
    $securityNumber ="String";
     
$maxHorizAngle = 20;   //Максимальный угол отклонения от горизонтали по часовой стрелке и против, по умолчанию-20
     
$imgX = 120;  // image width
$imgY = 40;   // image height  



//var_dump(dirname(__DIR__).DS."webroot".DS."font".DS.);
//die;


$font = dirname(__DIR__).DS."webroot".DS."font".DS. "SpicyRice.ttf";
$image = imagecreate($imgX, $imgY);
$fontMinSize = 12;  // Min font size
$fontMaxSize = 15;   //Max	 font size
// colors allocations - text, noise, bg
$textColor = imagecolorallocate($image, 0, 0, 0);
$imageColor = imagecolorallocate($image, 255, 255, 255);
        
// fill the bg of image
imagefill($image, 0, 0, $imageColor);
      
 $num_n = strlen($securityNumber);
        
        
for ($n = 0; $n < $num_n; $n++) {
	$num = $securityNumber[$n];
	$font_size = rand($fontMinSize, $fontMaxSize);//$imgY/2
	$angle = rand(360 - $maxHorizAngle, 360 + $maxHorizAngle);
            //  вычисление координат для каждой цифры, формулы обеспечивают нормальное расположние
            //  при любых значениях размеров цифры и изображения
	$y = rand(($imgY - $font_size) / 4 + $font_size, ($imgY - $font_size) / 2 + $font_size);
	
	$x = rand(($imgX / $num_n - $font_size) / 2, $imgX / $num_n - $font_size) + $n * $imgX / $num_n;
	
	$textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));       //цвет текста
            imagettftext($image, $font_size, $angle, $x, $y, $textColor, $font, $num);
}
    
return header("Content-type: image/png");  imagepng($image); 
                   
       
       
       
       
   }
    




    
}