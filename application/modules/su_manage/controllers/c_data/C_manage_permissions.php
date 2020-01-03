<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_manage_permissions extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}

	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_manage_permissions->get_datatables();
			$data = array(); $no = $_POST['start'];

			foreach ($list as $v_permissions) {
				$no++;
				$row = array();
				//$row[] = "#".$v_permissions->id;
				$row[] = $v_permissions->perm_key;
				$row[] = $v_permissions->perm_name;

				/* add html for action */

				$id_encode = encodeID($v_permissions->id);
				/*$row[] = '
					<div class="ui-group-buttons">
						<a href="#" onclick=confirm(1,2,"'.$id_encode.'","'.$v_permissions->perm_key.'") title="Edit group" class="btn btn-warning btn-xs btn-flat">
							<i class="fa fa-edit fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="#" onclick="delete_person('."'".$v_permissions->id."'".','."'".$v_permissions->perm_key."'".')" title="Delete group" class="btn btn-danger btn-xs btn-flat" >
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>';*/

				$row[] = '
						<div class="buttons">
							<a href="' . site_url('manage/edit/permissions/' . $id_encode) . '" class="btn btn-icon btn-warning btn-sm"
								title="Edit user">
								<i class="far fa-edit fa-fw"></i> Edit
							</a>
							<a href="#" id="btn-delete" class="btn btn-icon btn-danger btn-sm"
								title="Delete Group" onclick="delete_user('."'".$v_permissions->id."'".')">
								<i class="far fa-trash-alt fa-fw"></i> Delete
							</a>
						</div>';

				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_manage_permissions->count_all(),
						"recordsFiltered" => $this->m_manage_permissions->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);
		}
	}

	public function ajax_delete($id_permissions){
		if ($this->ion_auth->logged_in()){
			$this->m_manage_permissions->delete_by_id($id_permissions);
			echo json_encode(array("status" => TRUE));
		}
	}
}
