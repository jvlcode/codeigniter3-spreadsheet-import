<?php 

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	class Import extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('user_model');
			$this->load->helper('url');
		}

		public function index(){
			$users = $this->user_model->getUsers();
			$this->load->view('import_form',array('users'=>$users));
		}

		public function import_data(){
			if($this->input->post('submit')){

				$config['upload_path'] = "uploads/";
				$config['allowed_types'] = "xlsx";
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload',$config);
				$error=$data=null;
				
				if(!$this->upload->do_upload('file')){
					$error = $this->upload->display_errors();
				}else{
					$data = $this->upload->data();
				}
				
				if(empty($error)){
					$import_file = $data['file_name'];
				}else{
					$import_file=null;
				}

				$import_file_path = $config['upload_path'].$import_file;

				$reader = new Xlsx();
				$spreadsheet = $reader->load($import_file_path);
				$sheet_data = $spreadsheet->getActiveSheet()->toArray();
				
				$row_count = count($sheet_data)-1;

				$import_data = [];

				if($row_count>0){
					for($i=1;$i<=$row_count;$i++){
						$import_data[] = ['name'=>$sheet_data[$i][0],'email'=>$sheet_data[$i][1],'phone'=>$sheet_data[$i][2]];
					}
					$this->user_model->importUsers($import_data);
					redirect('import');

				}else{
					echo 'No excel data exists';
				}

				

				

			}
		}
	}

?>
