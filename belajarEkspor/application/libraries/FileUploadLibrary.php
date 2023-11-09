<?php

defined('BASEPATH') or die('No direct script access allowed!');



class FileUploadLibrary

{

    private $CodeIgniter;



    private $configuration = array();

    private $data = null;



    public function __construct()

    {

        $this->CodeIgniter = &get_instance();



        $this->library();

    }



    private function library()

    {

        $this->CodeIgniter->load->library('upload');
			
	


    }
	
	// public function resizeImage($filename)
	// {
	//    $source_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/thumbnail' . $filename;
	//    $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/thumbnail';
	//    $config_manip = array(
	// 	   'image_library' => 'gd2',
	// 	   'source_image' => $source_path,
	// 	   'new_image' => $target_path,
	// 	   'maintain_ratio' => TRUE,
	// 	   'create_thumb' => TRUE,
	// 	   'thumb_marker' => '_thumb',
	// 	   'width' => 150,
	// 	   'height' => 150
	//    );
 
 
	//    $this->load->library('image_lib', $config_manip);
	//    if (!$this->image_lib->resize()) {
	// 	   echo $this->image_lib->display_errors();
	//    }
 
 
	//    $this->image_lib->clear();
	// }




    public function setConfig($config = array())

    {

        if (is_array($config)) {

            $this->configuration = $config;

        }



        return $this;

    }



    public function initialize()

    {

        if (count($this->configuration) > 0) {

            $this->CodeIgniter->upload->initialize($this->configuration);

        }



        return $this;

    }



    public function upload($index)

    {

        $doUpload = $this->CodeIgniter->upload->do_upload($index);



        if ($doUpload) {
			
		
            $this->data = $this->CodeIgniter->upload->data();

        }


        return $doUpload;

    }
	// if ( ! $this->upload->do_upload($index)) {
	// 		$error = array('error' => $this->upload->display_errors()); 
	// 		$this->load->view('imageUploadForm', $error); 
	// 	 }else { 
   
   
	// 	   $uploadedImage = $this->upload->data();
	// 	   $this->resizeImage($uploadedImage['file_name']);
   
   
	// 	   print_r('Image Uploaded Successfully.');
	// 	   exit;
	// 	 } 
		
		// public function upload($index)

		// {
	
		// 	$doUpload = $this->CodeIgniter->upload->do_upload($index);
	
	
	
		// 	if ( ! $this->upload->do_upload($index)) {
		// 		$error = array('error' => $this->upload->display_errors()); 
				
		// 	 }else { 
	   
	   
		// 	   $uploadedImage = $this->upload->data();
		// 	   $this->resizeImage($uploadedImage['file_name']);
	   
	   
		// 	   print_r('Image Uploaded Successfully.');
		// 	   exit;
		// 	 } 
	
	
		// 	return $doUpload;
	
		// }




    public function get_file_name()

    {

        if (!is_null($this->data)) {

            return $this->data['file_name'];

        }



        return null;

    }



    public function remove($file_name, $path)

    {

        if (file_exists(realpath($path . "/$file_name"))) {

            @unlink(realpath($path . "/$file_name"));



            return true;

        }



        return false;

    }

}

