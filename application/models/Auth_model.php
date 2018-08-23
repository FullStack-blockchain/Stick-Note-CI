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
                return array($result, $errors);
            }
        }

        $result = false;
        $errors['login'] = t('Bad username or password');

        return array($result, $errors);
    }
}

?>