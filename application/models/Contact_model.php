<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Contact Model 
*/
class Contact_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	private function get_table_name(){
		return 'contact';
	}

	public function get_all_contacts(){
		$this->db->from($this->get_table_name());
		$query = $this->db->get();
		# Mengembalikan tipe resultset objek
		return $query->result();
	}

	public function get_book_by_id($id){
		$this->db->from($this->get_table_name());
		$this->db->where('id', $id);
		$query = $this->db->get();
		# mengembalikan tepat 1 data row
		return $query->row();
	}

	public function add_contact($data){
		$this->db->insert($this->get_table_name(), $data);
		return $this->db->insert_id();
	}

	public function update_contact($where,$data){
		$this->db->update($this->get_table_name(),$data,$where);
		return $this->db->affected_rows();
	}

	public function delete_contact($id){
		$this->db->where('id',$id);
		$this->db->delete($this->get_table_name());
	}

}