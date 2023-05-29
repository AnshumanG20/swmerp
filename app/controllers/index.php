<?php
  class index extends Controller {
  	function __construct(){
		if(!isLoggedIn()){ redirect('Login'); }
  	}
	public function index(){
		$this->view('pages/index_test');
	}
  }