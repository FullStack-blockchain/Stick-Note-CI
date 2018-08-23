<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Client_Controller {

	public function __construct()
    {
        parent::__construct();
    }
    
	public function index()
	{
		$nextWeek = time();
		echo $nextWeek;
                   // 7 days; 24 hours; 60 mins; 60 secs
		echo 'Now:       '. date('Y-m-d') ."\n";
		echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";
		// or using strtotime():
		echo 'Next Week: '. date('Y-m-d', strtotime('+1 week')) ."\n";

		$this->load->view('welcome_message');
	}
}

?>