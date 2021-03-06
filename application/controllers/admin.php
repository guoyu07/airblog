<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->form_validation->set_rules('user', '用户名', 'required');
        $this->form_validation->set_rules('password', '密码', 'required');

        if ($this->session->userdata('user')) {
            redirect('/admin/create');
        }elseif($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
        }else{
            if ($this->admin_model->login() === FALSE){
                redirect('/admin/');
            }else{
                $this->session->set_userdata('user', $this->admin_model->login());
                redirect('/admin/create');
            }
        }
    }

    public function login_out(){
        $this->session->unset_userdata('user');
        redirect('/');
    }

    public function create(){
        $this->form_validation->set_rules('title', '标题', 'required');
        $this->form_validation->set_rules('body', '内容', 'required');

        if ($this->session->userdata('user')) {
            if ($this->form_validation->run() === FALSE){
                $data['user'] = $this->session->userdata('user');
                $this->load->view('templates/header', $data);
                $this->load->view('admin/create');
                $this->load->view('templates/footer');
            }else{
                $this->admin_model->create();
                $data['user'] = $this->session->userdata('user');
                $this->load->view('templates/header', $data);
                $this->load->view('admin/success');
                $this->load->view('templates/footer');
            }
        }else{
            redirect('/admin/');
        }
    }

    public function edit($id = FALSE){
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('title', '标题', 'required');
        $this->form_validation->set_rules('body', '内容', 'required');

        if ($this->form_validation->run() === FALSE AND $this->session->userdata('user')) {
            if ($this->session->userdata('user')) {
                $data['blog_item'] = $this->blog_model->get_blog($id);
                if (empty($data['blog_item'])){
                    show_404();
                }

                $data['user'] = $this->session->userdata('user');
                $this->load->view('templates/header', $data);
                $this->load->view('admin/edit', $data);
                $this->load->view('templates/footer');
            }else{
                redirect('/admin/');
            }
        }else{
            redirect('/archives/' . $this->admin_model->edit());
        }
    }
}