<?php 
/*
this model is commonly used for all pages..
like index page, sign in etc.
*/

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class UserModel extends Model
{
    protected $db;
    protected $user_data;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
        $session = session();
        $this->user_data = $session->get('user_data');
    }

	public function get_all_count()
    {
        $sql = "SELECT COUNT(*) as tol_records FROM favorites";       
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function load_more_user($limit, $start, $gender, $is_active, $is_deleted)
    {
    	$condition = array("gender" => $gender, "is_active" => $is_active, "is_deleted" => $is_deleted);

        $rs = $this->db->table("user");
//    	$this->db->select('user_id,name,last_name,profile_pic');
        $rs->orderBy('profile_pic', 'desc');
    	$rs->limit($limit, $start);
    	$rs->where($condition);
        return $rs->get()->getResultArray();
    }

    public function user_interest_detail($user_id)
    {
        $array = array('ui.receiver_id'=>$user_id, 'ui.status_interest'=>1);
        $res = $this->db->table('user as u')
                        ->select('u.user_id, u.name, u.last_name, u.profile_pic')
                        ->join('user_interest as ui','u.user_id=ui.sender_id')
                        ->where($array);
        return $res->get()->getResultArray();
    }

    public function is_interest_friends($user_id, $logged_in_user_id)
    {
        $res = $this->db->table('user_interest');
        $where = "sender_id=$logged_in_user_id AND receiver_id=$user_id  OR  sender_id=$user_id AND receiver_id=$logged_in_user_id";
        $res->where($where);
        return  $res->get()->getRowArray();
    }

    public function accept_interest_list($user_id)
    {
        $query = "SELECT if(sender_id =$user_id, receiver_id, sender_id) AS receiver_id from user_interest where (sender_id=$user_id or receiver_id=$user_id ) AND  status_interest = 2 " ;
        $query = $this->db->query($query);
        //echo  $this->db->last_query();  die();  
        $result  = $query->getResultArray();
        foreach ($result as $data_res )
        {
            $friend_ids[] = $data_res['receiver_id'];
            //print_r($friend_ids);die();
        }
            if (isset($friend_ids))
            {                      
                $query    = "SELECT * FROM user WHERE user_id in (".implode(',',$friend_ids).") ";
                $q_data  = $this->db->query($query);
                //echo  $this->db->last_query();
                return  $q_data->getResultArray();
            }
            else
            {
                $query    = "SELECT * FROM user WHERE user_id in (-1) ";
                $q_data  = $this->db->query($query);
                return  $q_data->getResultArray();
            }
    }

    public function archive_interest_list($user_id)
    {
        $array = array('ui.receiver_id'=>$user_id, 'ui.status_interest'=>0);

        $res =  $this->db->table('user as u')
                 ->select('u.user_id, u.name, u.last_name, u.profile_pic')
                 ->join('user_interest as ui','u.user_id=ui.sender_id')
                 ->where($array);
        return $res->get()->getResultArray();
    }

    public function interest_request($table, $array_data, $condition)
    {
        $this->db->where($condition);
        $this->db->update($table, $array_data);
        //return $this->db->last_query();
    }







}	