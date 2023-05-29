<?php
  class HelperController extends Controller {
  	 
    	function __construct(){}

      // Blank
      public function index(){   
        $this->view('helper_pages/login');
      }
      public function blank(){   
        $this->view('helper_pages/blank');
      }

      // UI Elements
      public function ui_buttons(){
      	$this->view('helper_pages/ui_buttons');
      }

      public function ui_panels(){
      	$this->view('helper_pages/ui_panels');
      }

      public function ui_modals(){
      	$this->view('helper_pages/ui_modals');
      }

      public function ui_typography(){
      	$this->view('helper_pages/ui_typography');
      }

      public function ui_tabs_accordions(){
      	$this->view('helper_pages/ui_tabs_accordions');
      }

      public function ui_alerts_tooltips(){
      	$this->view('helper_pages/ui_alerts_tooltips');
      }

      // FORMS
      public function forms_general(){
      	$this->view('helper_pages/forms_general');
      }
      public function forms_components(){
      	$this->view('helper_pages/forms_components');
      }

      // Tables
      public function tables_static(){
        $this->view('helper_pages/tables_static');
      }
      public function tables_bootstrap(){
        $this->view('helper_pages/tables_bootstrap');
      }
      public function tables_datatable(){
        $this->view('helper_pages/tables_datatable');
      }

      // Font
      public function font_awesome(){
        $this->view('helper_pages/font_awesome');
      }

      // Helper Classes
      public function helper_classes(){
        $this->view('helper_pages/helper_classes');
      }
      

  }