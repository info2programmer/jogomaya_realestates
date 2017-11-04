<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	//validate username and password to database
	public function checkcredential($username,$password){
		//encrypt password
		$password=md5($password);
		//echo $password."<br/>".$username;
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$result=$this->db->get('tbl_adminlogin');
		if($result->num_rows()==1){
			return $result->row(0)->admin_id;
		}
		else{
			return false;
		}
	}

	//This Function To Save Banner
	public function insertbanner($bannerurl){
		$object=array(
			'baner_url' => $bannerurl,
			'update_by' => $this->session->userdata('adminemail'),
			'create_at' =>  date("Y-m-d h:i:sa"),
		);
		$this->db->insert('tbl_banner', $object);
	}


	//This Function To Get All Banner
	public function viewallbanner(){

		$query=$this->db->get('tbl_banner');
		return $query->result();
	}

	//This Function To Delete Banner
	public function deletebanner($id,$image){
		$this->db->where('baner_id',$id);
		$this->db->delete('tbl_banner');
		unlink("assets/media-demo/banner/".$image);
	}

	// Update About US

	public function change_about($about_us,$youtube_url)
	{
		$this->db->where('id', 1);
		$object=array(
			'youtube_url' => $youtube_url,
			'about_content' => $about_us,
			'update_at' =>date('Y-m-d h:i:sa')
		);
		$this->db->update('tbl_about', $object);
	}

	//Get About US
	public function get_about()
	{
		$query=$this->db->get('tbl_about');
		return $query->result_array();
	}


}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */

?>
