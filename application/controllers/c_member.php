<?php
 

class c_member extends CI_Controller{

 

                function __construct(){

                                parent::__construct();

               

                                if($this->session->userdata('status') != "login"){

                                                redirect(base_url("login"));

                                }

                }

 

                function index(){
					$this->load->view('header2');
                    $this->load->view('importir');
					$this->load->view('footer');

                }

}
