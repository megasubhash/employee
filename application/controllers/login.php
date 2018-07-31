<?php
class Login extends CI_Controller
{

    function __construct(){

            
        parent::__construct();
        if($this->session->userdata('validated'))
        {
            return redirect('homepage');
        }
        
        $this->load->model('LoginModel');
        $this->load->model('employeemodel');
    }
    public function index()
    {
        $this->load->view('user/login_view');
    }

    public function check_user(){

        $username=$this->input->post('uname');
        $password=$this->input->post('pwd');
        if($data=$this->LoginModel->login_valid($username,$password))
        { 
            $this->session->set_userdata($data);
            //$this->load->view('user/home.php');
           
           redirect('homepage');
        } 
        else
        {
            redirect('login');
        }

        
    }
    public function exist_user(){
        $username=$_GET['username'];
        $data=$this->LoginModel->isNameExist($username);
        if($data)
        {
             $msg=array(
                 $msg=>"aleardy exist"
             );
             echo json_encode($msg);
        }
        else
        {
            $msg=array(
                $msg=>"Not user exist"
            );
            echo json_encode($msg);
        }
       
    }
}

?>