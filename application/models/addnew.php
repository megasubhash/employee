<?php

class Addnew extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_new($data)
    {
        $emp_name=$data['emp_name'];
        $emp_sal=$data['emp_sal'];
        $emp_leave=$data['emp_leave'];
        $emp_amount=$data['emp_amount'];
        $query = $this->db->query("insert into tbl_emp (emp_name,emp_sal,emp_leave,emp_amount) values('$emp_name','$emp_sal',' $emp_leave',' $emp_amount')");
       
    }
}
?>