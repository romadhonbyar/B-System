<?php

class MY_Form_validation extends CI_Form_validation
{
    public function __construct($rules = [])
    {
        $this->CI = &get_instance();
        parent::__construct($rules);
    }

    public function edit_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? $this->CI->db
                    ->limit(1)
                    ->get_where($table, [$field => $str, 'id !=' => $id])
                    ->num_rows() === 0
            : false;
    }
    
    /** callback_cek_domain_email */
    /*public function cek_domain_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($user, $host) = explode('@', $email);
            if (!checkdnsrr($host, 'MX')) {
                $this->form_validation->set_message(
                    'cek_domain_email',
                    'Domain %s tidak ditemukan.'
                );
                return false;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message(
                'cek_domain_email',
                '%s tidak valid/kosong.'
            );
            return false;
        }
    }*/
}
