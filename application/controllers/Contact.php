<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Contact Controller
*/
class Contact extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['contacts']  = $this->Contact_model->get_all_contacts();
		$this->load->view('layouts/header_view');
		$this->load->view('contact/contact_view',$data);
		$this->load->view('layouts/footer_view');
	}

	public function save_contact(){
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'telephone'=> $this->input->post('telephone'),
			'email'    => $this->input->post('email'),
			'address'  => $this->input->post('address'),
		);

		$this->Contact_model->add_contact($data);
		echo json_encode(array('status' => TRUE));
	}

	public function ajax_edit($id){
		$data  = $this->Contact_model->get_book_by_id($id);
		echo json_encode($data);
	}

	public function update_contact()
	{
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'telephone'=> $this->input->post('telephone'),
			'email'    => $this->input->post('email'),
			'address'  => $this->input->post('address'),
		);

		$this->Contact_model->update_contact(array('id' => $this->input->post('id')),$data);
		echo json_encode(array('status' => TRUE));
	}

	public function destroy_contact($id){
		$this->Contact_model->delete_contact($id);
		echo json_encode(array('status' => TRUE));
	}

}