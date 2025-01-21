<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class Mypdf extends Dompdf
{
	protected $ci;
    private $filename;

    public function __construct()
    {
       parent::__construct();
        $this->ci =& get_instance();
    }


	public function generate($view, $data = array(), $filename = '')
  {
    $dompdf = new Dompdf();
    $html = $this->ci->load->view($view,$data,TRUE);
    $dompdf->loadhtml($html);
    $dompdf->setPaper('A4', "Portrait");   
    $dompdf->render(); 
    $dompdf->stream($filename . ".pdf", array("Attachment" => TRUE ));
  }

  public function setFileName($filename)
  {
    $this->filename = $filename;
  }

  public function loadView($viewFile, $data = array())
  {
    $options = new Options();
    $options->setChroot(FCPATH); 
    $options->setDefaultFont('roboto');

    $this->setOptions($options);

    $html = $this->ci->load->view($viewFile, $data, true);
    $this->loadHtml($html);
    $this->render();
    $this->stream($this->filename, ['Attachment' => 0]);
  }
}
?>