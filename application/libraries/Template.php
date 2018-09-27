<?php
class Template{
  protected $_ci;

  function __construct(){
      $this->_ci = &get_instance();
  }

	function show($content, $data = NULL){
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/layout/index.php
		 * */
    
        $data['header'] = $this->_ci->load->view('layout/header', $data, TRUE);

        $data['content'] = $this->_ci->load->view($content, $data, TRUE);

        $data['footer'] = $this->_ci->load->view('layout/footer', $data, TRUE);

        $this->_ci->load->view('layout/index', $data);
    }
}
