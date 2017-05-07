<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diploma extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        date_default_timezone_set("Europe/Helsinki");
        
ob_start();
        
        require_once(dirname(__FILE__).'/../libraries/language-parallel.php');
    }

    function pdf()
{
    $this->load->helper('pdf_helper');
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
    $data=array();
    
    define ('K_PATH_IMAGES', dirname(__FILE__).'/../../');
    tcpdf();
    
    
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData("assets/logo_ucv2.png", 45, "", "");
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('freesans');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('freesans', '', 9);
$obj_pdf->setFontSubsetting(true);
$obj_pdf->AddPage();
//ob_start();
//    // we can have any view part here like HTML, PHP etc
//    $this->load->view('pdfreport', $data);
//    
//    
//    $content = ob_get_contents();
ob_end_clean();
//$obj_pdf->writeHTML($content, true, false, true, false, '');
$btn_x=5;
$btn_y=20;

///////////////////////////////////////////////
/*
 * 
 *          to print text in another language, use TranslateTo($lang, 'YOUR TEXT HERE');
 * 
 * 
 * 
 */////////////////////////////////////////////

$languages = array("ro_ro"=>true, "en_us"=>false, "de_de"=>false);
$i=0;
foreach($languages as $lang => $default){
    $obj_pdf->startLayer('layer_'.$lang, true, $default);
    $obj_pdf->SetXY(15, 25);
    $obj_pdf->Cell(190, 5, TranslateTo($lang, 'Diploma'), 0, 0, 'C');
    $obj_pdf->endLayer();
    
    $obj_pdf->SetXY($btn_x, $btn_y+$i*10);
    $obj_pdf->Button('btn_'.$lang, 10, 10, TranslateTo($lang, 'ISO_SHORT_2'), 'ChangeLayer("layer_'.$lang.'");', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

    $i++;
}



/*
$obj_pdf->startLayer('layer_ro_ro', true, false); //view=false, since it's not default language!
$obj_pdf->SetXY(20,100);
$obj_pdf->Cell(35, 5, TranslateTo("ro_ro", 'Diploma'));
$obj_pdf->endLayer();


$obj_pdf->startLayer('layer_de_de', true, false); //view=false, since it's not default language!
$obj_pdf->SetXY(20,100);
$obj_pdf->Cell(35, 5, TranslateTo("de_de", 'Diploma'));
$obj_pdf->endLayer();



// Button 
$obj_pdf->Button('langRORO', 20, 10, 'RO', 'ChangeLayer("layer_ro_ro");', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

$obj_pdf->Button('langDEDE', 20, 10, 'DE', 'ChangeLayer("layer_de_de");', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

*/

$js = <<<EOD

function ChangeLayer(layerName){
    var layers = this.getOCGs();
    if (layers!=null && layers.length!=0) {
        for (var i in layers) {
            if (layers[i].name==layerName) {
                layers[i].state = true;
            } else {
                layers[i].state = false;
            }
        }
    }    
}
function langEN(){
    ChangeLayer("layer_en_us");
}
function langRO(){
    ChangeLayer("layer_ro");
}
        
langEN();        
        
EOD;


// Add Javascript code
$obj_pdf->IncludeJS($js); 

// set certificate file
$certificate = file_get_contents(dirname(__FILE__).'/../config/central.smartcitizen.eu.crt'); //'.realpath(dirname(__FILE__)).'/
$certificate_key = file_get_contents(dirname(__FILE__).'/../config/central.smartcitizen.eu.key');

//var_dump($certificate);

// set additional information
$info = array(
    'Name' => 'SmartCitizen Web App',
    'Location' => 'VR',
    'Reason' => 'Diploma giveaway',
    'ContactInfo' => 'http://central.smartcitizen.eu/',
    );

// set document signature
$obj_pdf->setSignature($certificate, $certificate_key, '', '', 2, $info);

$obj_pdf->setSignatureAppearance(15, 5, 45, 16);

//$obj_pdf->Annotation(85, 27, 5, 5, 'text file', array('Subtype'=>'FileAttachment', 'Name' => 'PushPin', 'FS' => 'data/utf8test.txt'));

$obj_pdf->Output('output.pdf', 'I');

}

}

