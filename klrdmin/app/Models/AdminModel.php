<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AdminModel
{

    protected $db;
    protected $user_data;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
        $session = session();
        $this->user_data = $session->get('user_data');
    }

    // Created by Neelesh Chouksey on 2010.12.24
    // function for changing status.
    function changeStatus($table, $status, $id)
    {
        $data = array('is_active' => $status);
        $where = $table . "_id = '$id'";
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->set($data);
        $builder->update();
    }

    // Created by Neelesh Chouksey on 2011.02.01
    // This function is used to retun number in US format.
    function US_phone_number($sPhone)
    {
        $sPhone = ereg_replace("[^0-9]", '', $sPhone);
        if (strlen($sPhone) != 10) return (False);
        $sArea = substr($sPhone, 0, 3);
        $sPrefix = substr($sPhone, 3, 3);
        $sNumber = substr($sPhone, 6, 4);
        $sPhone = "(" . $sArea . ")" . $sPrefix . "-" . $sNumber;
        return ($sPhone);
    }

    // Created by Neelesh Chouksey on 2010.12.24
    // function for changing status.
    function adddEditAddStatus($table, $status, $id)
    {
        $data = array('is_active' => $status);
        $where = $table . "_id = '$id'";
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->set($data);
        $builder->update();
    }

    public function get_searchbar_info($post_data, $where)
    {
        $where_condition = "1=1";
        foreach ($where as $key => $value) {
            $where_condition .= " AND `$key`='$value'";
        }

        $like_condition = " (`user_id` LIKE '%$post_data%' OR `name` LIKE '%$post_data%' OR `last_name` LIKE '%$post_data%' OR `phone_no` LIKE '%$post_data%')";

        $query = "SELECT *  FROM (`user`) WHERE " . $where_condition . " AND " . $like_condition . "";
        $result = $this->db->query($query);
        return $result->getResultArray();
    }


}