<?php

  class TestBarCode extends Controller {
  	private $db;
  	function __construct(){
        if(!isLoggedIn()){ redirect('Login'); }
        //$this->helper('barcodeGenerator');
        $this->helper('PicqerBarCode');
  	}
    public function index(){
        $this->view('pages/TestBarCode');
        
    }
  }