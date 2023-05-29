<?php

  class Home extends Controller {
  	private $db;
  	function __construct(){
  		$this->db = new Database;
  	}
    public function index(){
       $this->view('pages/Home');
      //redirect("HelperController/");
    }

  }