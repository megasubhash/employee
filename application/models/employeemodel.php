<?php
class Employeemodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_employee()
    {
        $this->db->select("*");
        $this->db->from("tbl_emp");
        $this->db->order_by("emp_name", "asc");
        $result = $this->db->get()->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function demployee($pid)
    {
        $this->db->where('emp_name', $pid);
        $result = $this->db->delete(tbl_emp);
       
    }

}

?>