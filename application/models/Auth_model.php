<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Validate user login form
     *
     * @access public
     * @param  array   $values           Form values
     * @return array   $valid, $errors   [0] = Success or not, [1] = List of errors
     */
    public function auth_login(array $values)
    {
    	return $this->validateCredentials($values);
    }
    /**
     * Validate password syntax
     *
     * @access protected
     * @param  array   $values           Form values
     * @return array   $valid, $errors   [0] = Success or not, [1] = List of errors
     */
    protected function validateCredentials(array $values)
    {
        $result = true;
        $errors = array();

        $table = 'users';
        $this->db->where('email', $values['email']);
        $user = $this->db->get($table)->row();
        if ($user) {
            // Email is okey lets check the password now
            $this->load->helper('phpass');
            $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            if ($hasher->CheckPassword($values['password'], $user->password)) {
                $user_data = [
                    'client_user_id'      => $uesr['id'],
                    'client_user_name'    => $uesr['username'],
                    'client_logged_in'    => true,
                ];
                $this->session->set_userdata($user_data);

                return array($result, $errors);
            }
        }

        $result = false;
        $errors['login'] = t('Bad email or password!');

        return array($result, $errors);
    }

    /**
     * Signup user signup form
     *
     * @access public
     * @param  array   $values           Form values
     * @return array   $valid, $errors   [0] = Success or not, [1] = List of errors
     */
    public function auth_regist(array $values)
    {
        $result = true;
        $errors = array();

        $table = 'users';

        $this->db->where('email', $values['email']);
        $user = $this->db->get($table)->row();

        if ($user) {
            // Email duplicated
            $result = false;
            $errors['login'] = t('This email address already exists!');
            return array($result, $errors);
        }

        $this->load->helper('phpass');
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $values['password'] = $hasher->HashPassword($values['password']);
        
        $this->db->insert($table, $values);
        $this->db->where('email', $values['email']);
        $user = $this->db->get($table)->row();

        $user_data = [
            'client_user_id'      => $uesr['id'],
            'client_user_name'    => $uesr['username'],
            'client_logged_in'    => true,
        ];
        $this->session->set_userdata($user_data);

        return array($result, $errors);
    }

    
}

?>