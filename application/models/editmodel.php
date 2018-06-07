<?php
class Editmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   
    public function edit_employee($data)
    {
        $emp_name=$data['emp_name'];
        $emp_sal=$data['emp_sal'];
        $emp_leave=$data['emp_sal'];
        $emp_amount=$data['emp_amount'];
    /*    $query = $this->db->query("UPDATE `tbl_blog` SET `post`=$post,`author`=$author WHERE `id` = $id");
      
        */
        $this->db->set('emp_name', $emp_name);
        $this->db->set('emp_sal', $emp_sal);
        $this->db->set('emp_leave', $emp_leave);
        $this->db->set('emp_amount', $emp_amount);
        $this->db->where('emp_name', $emp_name);
        $this->db->update('tbl_emp'); 
    }

}

?>