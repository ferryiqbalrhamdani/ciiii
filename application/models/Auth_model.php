<?php

class Auth_model extends CI_Model {
    public function tambahData() {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT,)
        ];

        $this->db->insert('user', $data);
    }
}