<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('global_model');
		$this -> load -> model('baseline_model');
	}

	public function index() {
		$data['contentView'] = "baseline/index";
		$data['title'] = "Program Monitor :: Baseline";
		$data['brand'] = 'Baseline Assessment';
		$this -> template($data);
	}

	public function upload() {
		$this -> load -> module('upload');
		$current_module = 'trainings';
		$subprogram = 'Baseline';
		$this -> upload -> data_upload(0, $subprogram);
	}

	public function template($data) {
		$data['show_menu'] = 0;
		$data['show_sidemenu'] = 0;
		$this -> load -> module('template');
		$this -> template -> index($data);
	}

}
