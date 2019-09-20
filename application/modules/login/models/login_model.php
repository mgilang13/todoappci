<?php
class Login_model extends CI_Model {
    function can_login($email, $password) {
        $this->db->where('User_email', $email);
        $query = $this->db->get('t_user');
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $key = $this->config->item('encryption_key');
                $salt1 = hash('sha512', $key . $password);
                $salt2 = hash('sha512', $password . $key);
                $hashed_password = hash('sha512', $salt1 . $password . $salt2);
                $store_password = $row->User_password;

                if($hashed_password == $store_password) {
                    $this->session->set_userdata(array(
                        'id' => $row->User_id, 
                        'nama' => $row->User_name
                        )
                    );
                }
                else {
                    return "Wrong Password";
                }
            }
        }
        else {
            return 'Wrong Email Address';
        }
    }
}