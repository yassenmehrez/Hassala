<?php    
class  generate{
    private $fileName;

    
    public function generate_qr($variable){
    $PNG_TEMP_DIR =dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    include "phpqrcode-master/qrlib.php";    
    if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    $errorCorrectionLevel = $_REQUEST['level'];    
    $matrixPointSize = 8;    
    $filename = $PNG_TEMP_DIR.$variable.'.png';
    $this->fileName = $variable.'.png';
    /////////////////////////////////////////////////////////////////////////////////
    echo QRcode::png($variable, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    /////////////////////////////////////////////////////////////////////////////////  
       }

   public function send_email_qr($email){
   

   }
    }  
   ?> 

    