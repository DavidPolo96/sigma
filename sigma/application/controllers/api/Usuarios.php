<?php   
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use \Restserver\Libraries\REST_Controller;
/**
 * 
 */
class Usuarios extends REST_Controller
{
    function __construct()
    {

        parent::__construct();

    }

    public function index_get()
    {
    
    }

    public function create_post()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');

        $aData = json_decode($this->post()[0]);

        $this->load->model("user/User");
        $oUser = new User();
        $oUser->setNombre($aData->nombre);
        $oUser->setCorreo($aData->correo);
        $oUser->setDepartamento($aData->departamento);
        $oUser->setCiudad($aData->ciudad);
        $oResponse = $oUser->insert();

        $this->output->set_status_header(200)
                     ->set_content_type('application/json')
                     ->set_output(json_encode($oResponse));
    }
          
}

 ?>