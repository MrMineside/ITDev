<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->check_session();
    }

    protected function check_session() {
        if ($this->session->userdata('id')=='') {
            // Set flashdata untuk pesan logout
            $this->session->set_flashdata('message', 'Sesi anda sudah habis. Silakan login kembali.');
            // Redirect ke halaman login
            redirect('C_Login');
        }
    }
}
?>