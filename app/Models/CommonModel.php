<?php 
/*
this model is commonly used for all pages..
like index page, sign in etc.
*/
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CommonModel extends Model
{
    protected $db;
    protected $user_data;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
        $session = session();
        $this->user_data = $session->get('user_data');
    }
	
	// this function returns table data.

    function getRecords($table, $fields="", $condition="", $orderby="", $single_row=false) //$condition is array
    {
//        echo '<pre>'; print_r($condition);exit;

        $rs = $this->db->table($table);
		if($fields != "")
		{
            $rs->select($fields);
        }
        if($orderby != "")
        {
            $rs->orderBy($orderby,'DESC');
        }
        if($condition != "")
        {
            $rs->where($condition);
        }

        if($single_row)
        {
            return $rs->get()->getRowArray();
        }
        return $rs->get()->getResultArray();

    }

	// Created by Neelesh Chouksey
	// this function is to add/edit data into table .
	// this function is to add/edit data in only one table at a time.
	function addEditRecords($table_name, $data_array, $id = "")
	{
		if($table_name && is_array($data_array))
		{
			$columns = $this->getTableFields($table_name);
			foreach($columns as $coloumn_data)
						  $column_name[]=$coloumn_data['Field'];
					  
			foreach($data_array as $key=>$val)
			{
				if(in_array(trim($key),$column_name))
				{
					$data[$key] = $val;
				}
			 }

			if($id == "")
			{
			    $builder = $this->db->table($table_name);
				$query = $builder->insert($data);
			}
			else
			{
				$where = array($table_name."_id" => $id);
                $builder = $this->db->table($table_name);
                $builder->where($where);
                $builder->set($data);
                $builder->update();
//				$query = $this->db->update($table_name, $data, $where);
			}
//			$this->db->query($query);
		}			
	}
	
	// function for deleting records by condition.
	function deleteRecords($table, $where)
	{ 
		$query = "DELETE FROM $table WHERE $where";
		$this->db->query($query);
	}

	// this function is used to get all the fields of a table.
	function getTableFields($table_name)
	{
		$query = "SHOW COLUMNS FROM $table_name";
		$rs = $this->db->query($query);
		return  $rs->getResultArray();
	}

	// this function is used to get all the fields of a table.
	function isLoggedIn()
	{
//	    print_r($this->user_data);die;
		if($this->user_data)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function sendAndroidPushNotification($data, $ids)
	{
		// Insert real GCM API key from the Google APIs Console
		// https://code.google.com/apis/console/        
		$apiKey = 'AIzaSyC94T2Lxg2-iX3nW45egO_g2A-EVyQ28SE';

		// Set POST request body
		$post = array(
						'registration_ids'  => $ids,
						'data'              => $data,
					 );

		// Set CURL request headers 
		$headers = array( 
							'Authorization: key=' . $apiKey,
							'Content-Type: application/json'
						);

		// Initialize curl handle       
		$ch = curl_init();

		// Set URL to GCM push endpoint     
		curl_setopt($ch, CURLOPT_URL, 'https://gcm-http.googleapis.com/gcm/send');

		// Set request method to POST       
		curl_setopt($ch, CURLOPT_POST, true);

		// Set custom request headers       
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// Get the response back as string instead of printing it       
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Set JSON post data
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

		// Actually send the request    
		$result = curl_exec($ch);

		// Handle errors
		if (curl_errno($ch))
		{
			echo 'GCM error: ' . curl_error($ch);
		}

		// Close curl handle
		curl_close($ch);

		// Debug GCM response       
		echo $result;
	}

	// This function is used to set up mail configuration..
	function setMailConfig()
	{
		$this->load->library('email');
		$config['smtp_host'] = SMTP_HOST;
		$config['smtp_user'] = SMTP_USER;
		$config['smtp_pass'] = SMTP_PASS;
		$config['smtp_port'] = SMTP_PORT;
		$config['protocol'] = PROTOCOL;
		$config['mailpath'] = MAILPATH;
		$config['mailtype'] = MAILTYPE;
		$config['charset'] = CHARSET;
		$config['wordwrap'] = WORD_WRAP;

		$this->email->initialize($config);
	}

	function sendEmail()
	{
		$this->email->send();
	}








}

	