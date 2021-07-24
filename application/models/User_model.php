<?php 
	class User_model extends CI_Model{


		public function getUsers(){
			return $this->db->get('user')->result();;
		}

		public function importUsers($import_data){
			$this->db->insert_batch('user',$import_data);
		}
		
	}


?>
