<?php
class Addemployee extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('validated'))
        {
            return redirect('login');
        }
        $this->load->model('employeemodel');
        $this->load->model('addnew');
        $this->load->model('LoginModel');
    }
    public function index()
    {
       
       // echo $post['date'];

        $this->load->view('user/add-employee');
    }
    public function add_new(){

       

       // $post=$this->input->post('text_post');
        $data=array(
            'emp_name' =>$this->input->post('name'),
            'emp_sal' => $this->input->post('salary'),
            'emp_leave'=>$this->input->post('leaves'),
            'emp_amount'=>$this->input->post('amount')
           
            );
             
            $this->addnew->add_new($data);
            return redirect('homepage');
          
         
       
    }
   


}

?>