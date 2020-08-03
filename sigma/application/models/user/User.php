<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class User extends CI_Model
	{

		private $sNombre;
		private $sCorreo;
		private $sDepartamento;
		private $sCiudad;

		function __construct()
		{
			parent::__construct();
			$this->load->database();
			
		}

		public function setNombre($sNombre){
			$this->sNombre = $sNombre;
		}

		public function setCorreo($sCorreo){
			$this->sCorreo = $sCorreo;
		}

		public function setDepartamento($sDepartamento){
			$this->sDepartamento = $sDepartamento;
		}

		public function setCiudad($sCiudad){
			$this->sCiudad = $sCiudad;
		}

		public function insert()
		{
			$oUser = new stdClass();
			$oUser->name = $this->sNombre;
			$oUser->email = $this->sCorreo;
			$oUser->state = $this->sDepartamento;
			$oUser->city = $this->sCiudad;

			$this->db->insert('contacts', $oUser);
			$iId = $this->db->insert_id();

			$oResponse = new stdClass();

			if ($iId) {
				$oResponse->message = "Contacto guardado correctamente.";
				$oResponse->id = $iId;
			}else{
				$oResponse->message = "No se pudo guardar el contacto.";
			} 
			
			return $oResponse;
		}
	}
 ?>