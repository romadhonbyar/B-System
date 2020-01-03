<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_manage_groups extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}

	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_manage_groups->get_datatables();
			$data = array(); $no = $_POST['start'];

			foreach ($list as $v_groups) {
				$no++;
				$row = array();
				/* add html for action */
				$id_encode = encodeID($v_groups->id);

				//$row[] = $v_groups->id;
				$row[] = $v_groups->name;
				$row[] = $v_groups->description;
				$row[] = '
							<div class="buttons">
								<a href="'.site_url('manage/permissions/groups/'.$id_encode).'" title="Manage permissions group" class="btn btn-icon btn-primary btn-sm">
									<i class="fas fa-key fa-fw"></i> Permission
								</a>
							</div>';

				$row[] = '
								<div class="buttons">
									<a href="' . site_url('manage/edit/groups/' . $id_encode) . '" class="btn btn-icon btn-warning btn-sm"
										title="Edit user">
										<i class="far fa-edit fa-fw"></i> Edit
									</a>
									<a href="#" id="btn-delete" class="btn btn-icon btn-danger btn-sm"
										title="Delete Group" onclick="delete_user('."'".$v_groups->id."'".')">
										<i class="far fa-trash-alt fa-fw"></i> Delete
									</a>
								</div>';

				/*$row[] = '
						<div class="btn-group mb-3" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-danger"><i class="far fa-edit"></i></button>
							<button type="button" class="btn btn-warning">Middle</button>
							<button type="button" class="btn btn-success">Right</button>
						</div>
							<!--
					<div class="ui-group-buttons">
						<a href="#" onclick=confirm(1,2,"'.$id_encode.'","'.$v_groups->name.'") title="Edit group" class="btn btn-warning btn-xs btn-flat">
							<i class="fa fa-edit fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="#" onclick="delete_person('."'".$v_groups->id."'".','."'".$v_groups->name."'".')" title="Delete group" class="btn btn-danger btn-xs btn-flat" >
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>-->';*/

				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_manage_groups->count_all(),
						"recordsFiltered" => $this->m_manage_groups->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);
		}
	}

	public function ajax_delete($id_groups){
		if ($this->ion_auth->logged_in()){
			$this->m_manage_groups->delete_by_id($id_groups);
			echo json_encode(array("status" => TRUE));
		}
	}
}
