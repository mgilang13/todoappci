<?php
class Dashboard_model extends CI_Model {

    public function get_todos($id) {
		$c = array('todo_status' => 0, 'todo_archive_status' => 0, 'Todo_id_user' => $id);
		$this->db->from("t_todo");
		$this->db->order_by("Todo_created_at", "desc");
		$this->db->where($c);
		$q = $this->db->get();
		return $q;
	}
	public function insert($data) {
		$this->db->insert('t_todo',$data);
	}
	public function delete($id) {
		$this->db->where("Todo_id", $id);
		$this->db->delete('t_todo');
	}
	public function fetch_single_data($id) {
		$this->db->where("Todo_id", $id);
		$q = $this->db->get("t_todo");
		return $q;
	}
	public function getById($id) {
        return $this->db->get_where('t_todo', ["Todo_id" => $id])->row();
	}
	
	public function update() {
        $post = $this->input->post();
		$this->Todo_id = $post["todo_id"];
		
        $this->Todo_activity = $post["Todo_activity"];
        $this->db->update('t_todo', $this, array('Todo_id' => $post['todo_id']));
	}
	
	public function get_done_todos($id) {
		$c = array('todo_status' => 1, 'todo_archive_status' => 0, 'Todo_id_user' => $id);
		$this->db->from("t_todo");
		$this->db->order_by("Todo_created_at", "desc");
		$this->db->where($c);
		$q = $this->db->get();
		return $q;
	}

	public function get_archive_todos($id) {
		$c = array('todo_archive_status' => 1, 'Todo_id_user' => $id);
		$this->db->from("t_todo");
		$this->db->order_by("Todo_created_at", "desc");
		$this->db->where($c);
		$q = $this->db->get();
		return $q;
	}

	public function doneclick() {
		$post = $this->input->post();
		$this->Todo_id = $this->uri->segment(3);
		$this->Todo_status = 1;
		$this->Todo_done_at = date("Y-m-d H:i:s");
		$this->db->update('t_todo', $this, array('Todo_id' => $this->Todo_id));
		redirect('dashboard');
	}

	public function do_archive() {
		$post = $this->input->post();
		$this->Todo_id = $this->uri->segment(3);
		$this->Todo_archive_status = 1;
		$this->db->update('t_todo', $this, array('Todo_id' => $this->Todo_id));
		redirect('dashboard');
	}
}