<?php

class Homepage extends CI_Controller
{

    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('validated'))
        {
            return redirect('login');
        }
        $this->load->model('employeemodel');
        $this->load->model('editmodel');
        
        $this->load->model('LoginModel');
    }
    public function index()
    {
       
       // echo $post['date'];

        $this->load->view('user/homeview');
    }
    public function get_employee()
    {
        $result=$this->employeemodel->get_employee();
        echo json_encode($result);

    }
    public function delete_employee()
    {
        $pid=$_GET['pid'];
        
        $this->employeemodel->demployee($pid);        

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function edit_employee()
    {

        // $post=$this->input->post('text_post');
         $data=array(
             'emp_name' =>$this->input->post('name'),
             'emp_sal' =>$this->input->post('salary'),
             'emp_leave' =>$this->input->post('leave'),
             'emp_amount' =>$this->input->post('amount')
             );
         $this->editmodel->edit_employee($data);
 
         redirect('homepage');
 
     }
 
    


}
?>