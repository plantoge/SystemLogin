<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Fauzi User Login";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    } 
    
    public function registration()
    {
        // Trim = menghilangkan tanda spasi di awal dan di akhir
        // valid_email = cek email sesuai dengan penulisan email yang benar
        // matches = cek apakah sama dengan input satu dengan input dua
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|min_length[3]|matches[password1]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
        // Jika form_validation sama dengan false/gagal maka
        // jalankan kembali tampilan halaman registrasi dengan pesan error tapi
        // jika form validation sama dengan true/berhasil maka
        // akan menjalankan proses dibawahnya "else"
        if($this->form_validation->run() == false) {
            $data['title'] = "Fauzi User Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> Your account has been created
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ');
            redirect('auth');
        }
    }
}
