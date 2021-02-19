<?php
namespace App\Controllers;

use App\Models\CommonModel;

class Home extends BaseController
{
	var $user_data	= '';
	protected $commonmodel;
	protected $db;
	protected $session;
	public function __construct()
	{

            $this->db = \Config\Database::connect();
            $this->commonmodel = new CommonModel($this->db);
            $this->session = session();
            $this->user_data = $this->session->get('user_data');
            helper(array('url', 'form', 'image_helper', 'sms_helper'));

	}

	public function index()
	{
        echo view('includes/header1');
        echo view('home');
        echo view('includes/footer');
	}

	public function sign_up()
	{
		//echo sendsmsGET( '9755544455', 'this is test msg');echo 'in';exit;
		echo view('includes/header2');
		echo view('sign-up');
		echo view('includes/footer');
	}

	public function log_in()
	{
		//echo sendsmsGET( '9755544455', 'this is test msg');echo 'in';exit;
		echo view('includes/header2');
		echo view('log-in');
		echo view('includes/footer');
	}

	public function set_profile_image()
	{ 
		session_start();
		if(isset($_POST['user_avatar'])) $_SESSION['registered_image'] = $_POST['user_avatar'];
		echo 'registered_image';exit;
	}

	public function register_user()
	{ 
		$post_data =  $this->request->getPost();
		if(trim($post_data['phone_no']) == '' || trim($post_data['name']) == '' || trim($post_data['last_name']) == '')
		{
			echo 'error';
			exit;
		}

		$user_data = $this->commonmodel->getRecords('user','user_id',array("phone_no"=>$post_data['phone_no']),'',true);
		//echo '<pre>';print_r($post_data);exit;
		if($user_data)
		{
			echo 'exist';
			exit;
		}

		$post_data['password'] = md5($post_data['password']);
		$post_data['token'] = $token = rand(100000,999999);
		//$post_data['is_active'] = 1;
		$this->commonmodel->addEditRecords('user', $post_data);
		$user_id = $this->db->insertID();

		if (isset($_SESSION['registered_image'])) 
		{
			$update_data['profile_pic'] = $img_name = "klr_img_".uniqid().".jpg";
			
			$userDir = IMG_PATH.$user_id.$post_data['name'];
			if(!is_dir($userDir)){
				//echo "directory not exists";
				mkdir($userDir, 0777, true);
			}

			$img = $_SESSION['registered_image'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace('data:image/jpeg;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			file_put_contents($userDir.'/'.$img_name, $data);
			$this->commonmodel->addEditRecords('user', $update_data, $user_id);
		}
		
		$phone_no = $post_data['phone_no'];
		$message = "Your OTP is $token. Kalars.in";
		$result = sendsmsGET($phone_no, $message);
		
		echo 'success';
	}

	public function verify_no()
	{
		echo view('includes/header2');
		echo view('verify_no');
		echo view('includes/footer');
	}

	public function success()
	{

		$token = $this->request->getPost('token');
		$user_data = $this->commonmodel->getRecords('user','user_id',array("token"=>$token),'',true);

		$data['success'] = 0;
		if($user_data)
		{
			$token = rand(10000,99999); 
			$this->commonmodel->addEditRecords('user', array('token'=>$token,'is_active'=>1), $user_data['user_id']);
			$data['success'] = 1;
		}

		echo view('includes/header2');
		echo view('success',$data);
		echo view('includes/footer');
	}

	public function app_launch($user_id, $token)
	{
		if($token=='shivadmin')
		{
			$user_data = $this->commonmodel->getRecords('user', '', array("user_id"=>$user_id),'',true);
		}
		else
		{
			$user_data = $this->commonmodel->getRecords('user', '', array("user_id"=>$user_id, "token"=>$token, "is_active"=>1),'',true);
		}
		

		if($user_data)
		{
            $user = $this->session->get('user_data');
            if($user) {
                $user_id = $user['user_id'];
                $token = rand(10000, 99999);
                $this->commonmodel->addEditRecords('user', array('token' => $token), $user_id);
                $this->session->remove('user_id', $user_data['user_id']);
                $this->session->remove('phone_no', $user_data['phone_no']);
                $this->session->remove('user_data', $user_data);
            }
			$this->session->set('user_id', $user_data['user_id']);
			$this->session->set('phone_no', $user_data['phone_no']);
			$this->session->set('user_data', $user_data);
			$this->commonmodel->addEditRecords('user', array('last_login'=>date('Y-m-d H:i:s')), $user_data['user_id']);
		}

        return redirect()->to(base_url().'/user/my_profile');

	}

	public function login()
	{ 
		$phone_no =  $this->request->getPost('phone_no');
		$password = md5($this->request->getPost('password'));
		$user_data = $this->commonmodel->getRecords('user', '', array("phone_no"=>$phone_no, "password"=>$password, "is_active"=>1),'',true);
		//$user_data = $this->commonmodel->getRecords('user', '', array("phone_no"=>$phone_no, "is_active"=>1),'',true);
		if($user_data)
		{
			$this->session->set('user_id', $user_data['user_id']);
			$this->session->set('phone_no', $phone_no);
			$this->session->set('user_data', $user_data);
			$this->commonmodel->addEditRecords('user', array('last_login'=>date('Y-m-d H:i:s')), $user_data['user_id']);
			$data['user_agent'] = 0;
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
			if(stripos($user_agent, 'android') && stripos($user_agent, 'wv') && stripos($user_agent, 'Version/'))
			{
				$data['user_agent'] = 1;
				$data['token'] = $user_data['token'];
			}
			$data['status'] = 'success';
			$data['user_id'] = $user_data['user_id'];
			//echo 'success';
		}
		else
		{
			$data['status'] = 'fail';
		}
		echo json_encode($data);
	}

	public function signout()
	{ 
		$user = $this->session->get('user_data');
		if($user) {
            $user_id = $user['user_id'];
            $token = rand(10000, 99999);
            $this->commonmodel->addEditRecords('user', array('token' => $token), $user_id);
            $this->session->destroy();

            return redirect()->to(base_url().'/home');

        }else{
            return redirect()->to(base_url().'/home');
        }
	}

	public function forget_password()
	{ 
		$post_data = $this->input->post();
		//$post_data['phone_no'] = "7771983222";
		$user_data = $this->commonmodel->getRecords('user','user_id',array("phone_no"=>$post_data['phone_no']),'',true);
		if(!count($user_data))
		{
			echo 'fail';	exit;
		}
		
		$token = rand(100000,999999);
		$this->commonmodel->addEditRecords('user', array('token'=>$token), $user_data['user_id']);
		
		$phone_no = $post_data['phone_no'];
		$message = "Your change password OTP is $token. Kalars.in";
		$result = sendsmsGET($phone_no, $message);
		/*http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=ef9581c76159cecd57c6ef96cb6aceee&message=messageissent&senderId=klrsms&routeId=1&mobileNos=8602318616&smsContentType=english*/
		
		//redirect('home/change_password');
		echo 'forget_success';exit;
	}

	public function change_password()
	{
		echo view('includes/header2');
		echo view('change_password');
		echo view('includes/footer');
	}

	public function password_changed()
	{ 
		$password = md5($this->input->post('password'));
		$token = $this->input->post('token');
		$user_data = $this->commonmodel->getRecords('user','user_id',array("token"=>$token),'',true);
		
		$data['success'] = 0;
		if(count($user_data))
		{
			$token = rand(10000,99999); 
			$this->commonmodel->addEditRecords('user', array('token'=>$token,'password'=>$password), $user_data['user_id']);
			$data['success'] = 1;
		}

		echo view('includes/header2');
		echo view('password_changed',$data);
		echo view('includes/footer');
	}

	public function search()
	{
		echo view('includes/header2');
		echo view('search');
		echo view('includes/footer');
	}

	public function search_results()
	{
		if($data['logged_in'] = $this->commonmodel->isLoggedIn())
		{
			$data['logged_in'] = true;
			$fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id"=>$this->user_data['user_id']));
			$data['fav_data'] = array();
			foreach($fav_data as $fav_row)
			{
				$data['fav_data'][] = $fav_row['favorite_user_id'];
			}
		}

		$data['post_data'] = $post_data  = $this->request->getPost();
		//echo '<pre>'; print_r($post_data);///exit;

		$condition = array("is_active" => 1, "is_deleted" => 0);
		if(isset($post_data['age_from']) && trim($post_data['age_from']) !='' && trim($post_data['age_from']) !=NULL) 
		{
			$timestamp = strtotime('-'.$post_data['age_from'].' years');
			$age_from = date('Y-m-d 00:00:00', $timestamp);
			$condition['dob <='] = $age_from;
		}
		if(isset($post_data['age_to']) && trim($post_data['age_to']) !='' && trim($post_data['age_to']) !=NULL) 
		{
			$timestamp = strtotime('-'.$post_data['age_to'].' years');
			$age_to = date('Y-m-d 00:00:00', $timestamp);
			$condition['dob >='] = $age_to;
		}	
		if(isset($post_data['gender']) && trim($post_data['gender']) !='' && trim($post_data['gender']) !=NULL) 
			$condition['gender'] = $post_data['gender'];
		if(isset($post_data['city']) && trim($post_data['city']) !='' && trim($post_data['city']) !=NULL) 
			$condition['city'] = $post_data['city'];
		if(isset($post_data['merital_status']) && trim($post_data['merital_status']) !='' && trim($post_data['merital_status']) !=NULL) 
			$condition['merital_status'] = $post_data['merital_status'];
		if(isset($post_data['star_sign']) && trim($post_data['star_sign']) !='' && trim($post_data['star_sign']) !=NULL) 
			$condition['star_sign'] = $post_data['star_sign'];
		if(isset($post_data['zodiac_sign']) && trim($post_data['zodiac_sign']) !='' && trim($post_data['zodiac_sign']) !=NULL) 
			$condition['zodiac_sign'] = $post_data['zodiac_sign'];
		if(isset($post_data['manglik']) && trim($post_data['manglik']) !='' && trim($post_data['manglik']) !=NULL) 
			$condition['manglik'] = $post_data['manglik'];
		if(isset($post_data['qualification']) && trim($post_data['qualification']) !='' && trim($post_data['qualification']) !=NULL) 
			$condition['qualification'] = $post_data['qualification'];
		if(isset($post_data['employement_status']) && trim($post_data['employement_status']) !='' && trim($post_data['employement_status']) !=NULL) 
			$condition['employement_status'] = $post_data['employement_status'];

//		echo '<pre>'; print_r($condition);exit;
		$data['filtered_user_data'] = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic', $condition);
//		echo '<pre>' ;
//		echo($this->db->getLastQuery());
//		exit;
//		echo '<pre>'; print_r($data['filtered_user_data']);exit;

		echo view('includes/header2');
		echo view('search_results', $data);
		echo view('includes/footer');
	}

	public function set_gcm()
	{ 
		$gcm_id = $this->input->post('gcmId');
		$user_id = $this->input->post('userId');
		$gcmRegistrationId = $this->input->post('gcmRegistrationId');

		if(!$gcm_id || !$gcmRegistrationId)
		{
			$data = array();
			$data['status'] = 0;
			$data['message'] = 'Error';
			echo json_encode($data);
			exit;
		}

		if( $gcm_id == 'x')
		{
			$gcm_id = '';
			$condition['gcmRegistrationId'] = $gcmRegistrationId;
			$gcm_id_arr = $this->commonmodel->getRecords('gcm', 'gcm_id', $condition,'',true);
			if(count($gcm_id_arr))
			{
				$gcm_id = $gcm_id_arr['gcm_id'];
			}
		}
		else
		{
			$condition['gcm_id'] = $gcm_id;
			$gcm_id_arr = $this->commonmodel->getRecords('gcm', 'gcm_id', $condition,'',true);
			if(!count($gcm_id_arr))
			{
				$gcm_id = '';
			}
		}
		$insert_data['user_id'] = $user_id;
		$insert_data['gcmRegistrationId'] = $gcmRegistrationId;
		$this->commonmodel->addEditRecords('gcm', $insert_data, $gcm_id);

		$gcm_id = $gcm_id == '' ?  $this->db->insert_id() : $gcm_id;

		$data = array();
		$data['status'] = 1;
		$data['message'] = 'Update success'; 	
		$data['gcmId'] = $gcm_id;
		//$data['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
		echo json_encode($data);exit;
	}

	public function send_gcm_message()
	{
		$message = array('message' => 'Login to see contact no, full profile and all photos of the candidate.');
		$RegistrationIds = $this->commonmodel->getRecords('gcm', 'gcmRegistrationId');
		foreach($RegistrationIds as $RegistrationId)
		{
			$gcmRegistrationIds[] = $RegistrationId['gcmRegistrationId'];
		}
		//$gcmRegistrationIds = array('fEOw0RxBFDQ:APA91bHq0x6eR5ACqh473pP2FYCFrl7Ib1piI2NyT3oITq7XEMfnddtd459ejoSQiwk98y022mgmeIENvlVRjwtsdyIF5H069hcCYHqKZLllp_iT7xsyXxHHuUXedTcIYu_hQi15c-lU');
		echo '<pre>';print_r($gcmRegistrationIds);

		$this->commonmodel->sendAndroidPushNotification($message, $gcmRegistrationIds);

		$data = array();
		$data['status'] = 1;
		$data['message'] = 'Message sent';
		echo json_encode($data);
	}

	public function about()
	{
		echo view('includes/header2');
		echo view('about');
		echo view('includes/footer');
	}

	public function contact()
	{
		echo view('includes/header2');
		echo view('contact');
		echo view('includes/footer');
	}

	public function test()
	{ echo 'in';exit;
		$contact_list=array();
		$start=0;
		for($i = 0; $i<=45; $i++)
		{
			$page = $start+$i;
			$homepage = file_get_contents ("http://kalwarsamaj.info/kalwar-matrimony?keys=&field_gender_value=All&field_branch_value=All&field_age_value=&page=$page");

			$title = explode('<div class="location vcard">',$homepage);
			array_shift($title);
			foreach($title as $row)
			{
				$temp= explode('<td class="views-field views-field-field-father-guardians-name" >',$row);
				$temp1= explode('</div>',$temp[0] );
				$temp1=trim(str_replace('</td>','',$temp1[2]));	
				$temp1= explode(',',$temp1);
				
				if(isset($temp1[0]))
				$this->commonmodel->addEditRecords('community_mobile_no', array('mobile'=>substr(trim($temp1[0]), -10)));

				if(isset($temp1[1]))
				$this->commonmodel->addEditRecords('community_mobile_no', array('mobile'=>substr(trim($temp1[1]), -10)));

			}
		}
	}

	public function testmail()
	{ 
		$users = $this->commonmodel->getRecords('user', 'count(user_id)', "profile_pic <> ''");
		echo '<pre>';print_r($users);
		$users = $this->commonmodel->getRecords('user', 'count(user_id)', array('profile_pic' => ''));
		echo '<pre>';print_r($users);exit;
		foreach ($users as $user) 
		{
		  $id = $user['user_id'];
		  $name = $user['name'];
		  $filepath    = 'uploads/gallery/'.$id.$name;
		  if ($user['profile_pic'] != '' && !file_exists($filepath.'/'.$user['profile_pic'])) 
		  {
		  	//$this->commonmodel->addEditRecords('user', array('profile_pic'=>''), $id);
		  }
		} 
	}

	









}