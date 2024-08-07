<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_customers extends CI_Model
{

    public function getAllCustomers()
    {
        return $this->db->get('customer')->result_array();
    }

    public function getCustomerById($custId)
    {
        $this->db->where('custId', $custId);
        return $this->db->get('customer')->row_array();
    }

    public function editCustomer($custId, $customerDatas)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', $customerDatas);
    }

    public function editCustomerPassword($custId, $newcustPassword)
    {
        $this->db->where('custId', $custId);
        return $this->db->update('customer', array('custPassword' => $newcustPassword));
    }

    public function getCustomerToken($custToken) 
    {
        $this->db->where('custToken', $custToken);
        return $this->db->get('customer')->row_array();
    }

    
}

/* End of file M_customers.php */
