<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries\RestController.php';
use imshwetank\RestServer\RestController;
class Api_request extends RestController {

	public function __construct() {
		parent::__construct();
		$this->load->model('pepole_m');		
	}
	public function test2_post()
	{
        $pass['email'] = 'test@test.com';
        $pass['pass'] = '2834284';
		echo json_encode($pass);
	}
	public function pepole_get(){
		// $people = new pepole_m();
		// $result_pepole=$people->pepoleInfoGet();
		$result_pepole=$this->pepole_m->pepoleInfoGet();
		$this->response([
			'status'=>'error',
			'message'=>'Data get',
			$result_pepole,
			200	],RestController::HTTP_OK);
	}
	public function searchPepole_get($id){
		$result=$this->pepole_m->pepoleInfoSearch($id);
		if($result){
			$this->response([
				'status'	=>'success',
				'message'	=>'Information get Successfully',
				$result,200],RestController::HTTP_OK);
		}
		else{
			$this->response([
				'status'	=>'error',
				'message'	=>'Information Not found',404]
			,RestController::HTTP_NOT_FOUND);
		}
		
	}
}