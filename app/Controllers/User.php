<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\UserModel;

class User extends BaseController
{
    var $user_data = '';
    protected $user_model;
    protected $commonmodel;

    public function __construct()
    {

        $db = \Config\Database::connect();
        $this->commonmodel = new CommonModel($db);
        $this->user_model = new UserModel($db);
        $session = session();
        $this->user_data = $session->get('user_data');

        helper(array('url', 'form', 'image_helper'));


    }

    public function index()
    {
        echo view('includes/header1');
        echo view('home');
        echo view('includes/footer');
    }

    public function check_auth()
    {
        if ($this->commonmodel->isLoggedIn()) {
            return true;
        } else {
            $this->session->sess_destroy();
            redirect('home/sign_up');
        }
    }

    public function my_profile()
    {
        $this->check_auth();
        $data['logged_in'] = true;

        $this->db->select('u.user_id, u.name, u.last_name, u.profile_pic, u.is_deleted')
            ->from('user u')
            ->join('favorites f', 'u.user_id = f.favorite_user_id')
            ->where('f.user_id', $this->user_data['user_id'])
            ->where('u.is_deleted =', 0)
            ->limit(3);

        $rs = $this->db->get();
        $data['favorites'] = $rs->result_array();

        $data['photos'] = $this->commonmodel->getRecords('photo', '', array("user_id" => $this->session->userdata('user_id')));

        $data['user_data'] = $this->session->userdata('user_data');
        echo view('includes/header2', $data);
        echo view('my-profile');
        echo view('includes/footer');
    }

    public function edit_profile()
    {
        $this->check_auth();

        $data['user_data'] = $this->user_data;
        //echo '<pre>';print_r($data['user_data']);exit;

        $data['user_data']['dob'] = date('d/m/Y h:i:s A', strtotime($data['user_data']['dob']));

        $height = explode(',', $data['user_data']['height']);
        $data['user_data']['height_feet'] = $height[0];
        $data['user_data']['height_inch'] = isset($height[1]) ? $height[1] : 0;

        $p_height = explode(',', $data['user_data']['p_height']);
        $data['user_data']['p_height_feet'] = $p_height[0];
        $data['user_data']['p_height_inch'] = isset($p_height[1]) ? $p_height[1] : 0;

        echo view('includes/header2', $data);
        echo view('edit-profile');
        echo view('includes/footer');
    }

    public function save_profile()
    {
        $this->check_auth();

        $post_data = $this->input->post(NULL);
        //$data['user_data'] = $user_data = $this->user_data;
        $user_id = $this->session->userdata('user_id');

        $date = str_replace('/', '-', $post_data['dob']);
        $post_data['dob'] = date('Y-m-d H:i:s', strtotime($date));

        $post_data['height'] = $post_data['height_feet'] . ',' . $post_data['height_inch'];
        $post_data['p_height'] = $post_data['p_height_feet'] . ',' . $post_data['p_height_inch'];
        //echo '<pre>';print_r($post_data);exit;

        $this->commonmodel->addEditRecords('user', $post_data, $user_id);
        $user_data = $this->commonmodel->getRecords('user', '', array("user_id" => $user_id), '', true);
        $this->session->set_userdata('user_data', $user_data);

        redirect('user/my_profile');
    }

    public function update_profile_pic()
    {
        //echo '<pre>';print_r($_POST);EXIT;
        $this->check_auth();

        $userDir = IMG_PATH . $this->user_data['user_id'] . $this->user_data['name'];
        if (!is_dir($userDir)) {
            //echo "directory not exists";
            mkdir($userDir, 0777, true);
        }

        $img_name = "klr_img_" . uniqid() . ".jpg";
        $img = $this->input->post('user_avatar');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        file_put_contents($userDir . '/' . $img_name, $data);


        $post_data['profile_pic'] = $img_name;
        $this->commonmodel->addEditRecords('user', $post_data, $this->user_data['user_id']);
        $old_img = IMG_PATH . $this->user_data['user_id'] . $this->user_data['name'] . '/' . $this->user_data['profile_pic'];
        unlink($old_img);
        $user_data = $this->commonmodel->getRecords('user', '', array("user_id" => $this->user_data['user_id']), '', true);
        $this->session->set_userdata('user_data', $user_data);
        echo 'success';
        //redirect('user/my_profile');
    }

    public function profile($user_id)
    {
        if ($this->commonmodel->isLoggedIn()) {
            $data['logged_in'] = true;
            $data['fav_data'] = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id'], "favorite_user_id" => $user_id));

            $data['logged_in_user_id'] = $logged_in_user_id = $this->user_data['user_id'];

            $data['is_interest_friend'] = $this->user_model->is_interest_friends($user_id, $logged_in_user_id);
        }

        $data['photos'] = $this->commonmodel->getRecords('photo', '', array("user_id" => $user_id));

        $data['user_data'] = $this->commonmodel->getRecords('user', '', array("user_id" => $user_id, "is_active" => 1, "is_deleted" => 0), '', true);

        $age = date_diff(date_create($data['user_data']['dob']), date_create('today'))->y;
        $data['title'] = "Name - " . $data['user_data']['name'] . "," . " " . "Age - " . $age . "," . " " . "City - " . $data['user_data']['city'];

        $data['abused'] = $this->commonmodel->getRecords('report_abuse', '', array("abused_user_id" => $user_id), '', true);

        if (!count($data['user_data'])) {
            redirect('home/search');
        }

        echo view('includes/header2', $data);
        echo view('profile-detail', $data);
        echo view('includes/footer');
    }

    public function delete_profile()
    {
        $data['logged_in'] = true;
        $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
        $user_id = $this->user_data['user_id'];
        $data = array('is_deleted' => 1,
            'is_active' => 0
        );
        $this->commonmodel->addEditRecords('user', $data, $user_id);
        $user_id = $this->session->userdata('user_id');
        $token = rand(10000, 99999);
        $this->commonmodel->addEditRecords('user', array('token' => $token), $user_id);
        $this->session->sess_destroy();
        redirect('home');
    }

    public function brides()
    {
        if ($data['logged_in'] = $this->commonmodel->isLoggedIn()) {
            $data['logged_in'] = true;
            $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
            $data['fav_data'] = array();
            foreach ($fav_data as $fav_row) {
                $data['fav_data'][] = $fav_row['favorite_user_id'];
            }
        }

        $shalu = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic,is_active,is_deleted', array("user_id" => 1, 'is_active' => 1, 'is_deleted' => 0));
        $gudia = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic,is_active,is_deleted', array("user_id" => 205, 'is_active' => 1, 'is_deleted' => 0));

        $top_users = array_merge($shalu, $gudia);

        $start = 0;
        $limit = 24;
        $gender = 'Female';
        $is_active = 1;
        $is_deleted = 0;
        $data['users'] = $this->user_model->load_more_user($limit, $start, $gender, $is_active, $is_deleted);
        $data['users'] = array_merge($top_users, $data['users']);

        echo view('includes/header2', $data);
        echo view('brides');
        echo view('includes/footer');
    }


    public function grooms()
    {
        if ($data['logged_in'] = $this->commonmodel->isLoggedIn()) {
            $data['logged_in'] = true;
            $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
            $data['fav_data'] = array();
            foreach ($fav_data as $fav_row) {
                $data['fav_data'][] = $fav_row['favorite_user_id'];
            }
        }

        $sandeep = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic,is_active,is_deleted', array("user_id" => 2, 'is_active' => 1, 'is_deleted' => 0));

        $start = 0;
        $limit = 24;
        $gender = 'Male';
        $is_active = 1;
        $is_deleted = 0;
        $data['users'] = $this->user_model->load_more_user($limit, $start, $gender, $is_active, $is_deleted);
        $data['users'] = array_merge($sandeep, $data['users']);

        echo view('includes/header2');
        echo view('grooms', $data);
        echo view('includes/footer');
    }

    public function load_more_user($gender, $start)
    {
        if ($data['logged_in'] = $this->commonmodel->isLoggedIn()) {
            $data['logged_in'] = true;
            $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
            $data['fav_data'] = array();
            foreach ($fav_data as $fav_row) {
                $data['fav_data'][] = $fav_row['favorite_user_id'];
            }
        }

        $limit = 24;
        $is_active = 1;
        $is_deleted = 0;
        $data['users'] = $this->user_model->load_more_user($limit, $start, $gender, $is_active, $is_deleted);
        echo view('user-list', $data);

    }


    public function markfavorites()
    {
        $this->check_auth();

        $favorite_user_id = $this->input->post('favorite_user_id');

        $fav_data = $this->commonmodel->getRecords('favorites', '', array("user_id" => $this->user_data['user_id'], "favorite_user_id" => $favorite_user_id));
        if (count($fav_data)) {
            $this->commonmodel->deleteRecords('favorites', "user_id= " . $this->user_data['user_id'] . " AND favorite_user_id = " . $favorite_user_id);
            echo 0;
        } else {
            $post_data['user_id'] = $this->user_data['user_id'];
            $post_data['favorite_user_id'] = $favorite_user_id;
            $this->commonmodel->addEditRecords('favorites', $post_data);
            echo 1;
        }
    }

    public function favorites()
    {
        $this->check_auth();

        $this->db->select('u.user_id, u.name, u.last_name, u.profile_pic')
            ->from('user u')
            ->join('favorites f', 'u.user_id = f.favorite_user_id')
            ->where('f.user_id', $this->user_data['user_id']);
        $rs = $this->db->get();
        $data['favorites'] = $rs->result_array();

        //$data['favorites'] = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic', array("gender"=>'Male'));
        echo view('includes/header2');
        echo view('favorites', $data);
        echo view('includes/footer');
    }

    public function gallery($user_id)
    {
        $this->check_auth();

        $data['photos'] = $this->commonmodel->getRecords('photo', '', array("user_id" => $user_id));
        $data['profile_user_data'] = $this->commonmodel->getRecords('user', '', array("user_id" => $user_id), '', true);
        $data['user_data'] = $this->user_data;


        //$data['favorites'] = $this->commonmodel->getRecords('user', 'user_id,name,last_name,profile_pic', array("gender"=>'Male'));
        echo view('includes/header2');
        echo view('gallery', $data);
        echo view('includes/footer');
    }

    public function add_delete_photo()
    {
        $this->check_auth();
        $post_data = $this->input->post();

        if (isset($post_data['photo_id'])) {
            $this->commonmodel->deleteRecords('photo', "user_id = " . $this->user_data['user_id'] . " AND photo_id = " . $post_data['photo_id']);
            $old_img = IMG_PATH . $this->user_data['user_id'] . $this->user_data['name'] . '/' . $post_data['photo'];
            unlink($old_img);
            redirect('user/gallery/' . $this->user_data['user_id']);
        }

        $userDir = IMG_PATH . $this->user_data['user_id'] . $this->user_data['name'];
        if (!is_dir($userDir)) {
            //echo "directory not exists";
            mkdir($userDir, 0777, true);
        }

        $img_name = "klr_img_" . uniqid() . ".jpg";
        $img = $this->input->post('user_avatar');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        file_put_contents($userDir . '/' . $img_name, $data);

        $post_data['photo'] = $img_name;
        $post_data['user_id'] = $this->user_data['user_id'];
        $this->commonmodel->addEditRecords('photo', $post_data);
        //redirect('user/gallery/'.$this->user_data['user_id']);
        echo 'gallery success';

    }

    public function report_abuse($abused_user_id)
    {
        $this->check_auth();

        $post_data['abused_by_user_id'] = $this->user_data['user_id'];
        $post_data['abused_user_id'] = $abused_user_id;
        $this->commonmodel->addEditRecords('report_abuse', $post_data);
        redirect('user/profile/' . $abused_user_id);
    }

    public function user_setting()
    {
        $data['user_data'] = $this->user_data;
        $user_id = $this->user_data['user_id'];

        //echo '<pre>';print_r($this->user_data);exit();

        echo view('includes/header2');
        echo view('user_setting', $data);
        echo view('includes/footer');
    }

    public function set_interest_privacy()
    {
        $this->check_auth();
        $rdn_val = $this->input->post('rdn_val');

        $user_id = $this->user_data['user_id'];
        $arr = array('interest_privacy' => $rdn_val);
        $this->commonmodel->addEditRecords('user', $arr, $user_id);

        $this->user_data['interest_privacy'] = $rdn_val;
        $this->session->set_userdata('user_data', $this->user_data);
    }

    public function interest_send()
    {
        $this->check_auth();
        $interest_user_id = $this->input->post('interest_user_id');
        $user_id = $this->user_data['user_id'];
        $arr = array(
            'sender_id' => $user_id,
            'receiver_id' => $interest_user_id,
            'status_interest' => 1,
            'modified_date' => date('Y-m-d H:i:s')
        );
        $interest_data = $this->commonmodel->addEditRecords('user_interest', $arr);
    }

    public function user_interest()
    {
        $this->check_auth();

        $data['logged_in'] = true;
        $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
        $data['fav_data'] = array();
        foreach ($fav_data as $fav_row) {
            $data['fav_data'][] = $fav_row['favorite_user_id'];
        }

        $user_id = $this->user_data['user_id'];
        $data['users'] = $this->user_model->user_interest_detail($user_id);
        if (!$data['users']) {
            $this->session->set_flashdata('interest_messagey', 'No Interest User...');
        }
        //echo '<pre>';print_r($data['users']);print_r($data['users1']);exit;

        echo view('includes/header2', $data);
        echo view('user_interest');
        echo view('includes/footer');
    }

    public function accept_interest()
    {
        $accept_id = $this->input->post('accept_id');
        $user_id = $this->user_data['user_id'];

        $condition = array(
            'receiver_id' => $user_id,
            'sender_id' => $accept_id
        );
        $user_data = array('status_interest' => 2);
        //$data['archive_user_data'] =$this->commonmodel->addEditRecords('user_interest', $user_data,$condition);
        $data = $this->user_model->interest_request('user_interest', $user_data, $condition);
    }

    public function archive_interest()
    {
        $archive_id = $this->input->post('archive_id');
        $user_id = $this->user_data['user_id'];
        $condition = array(
            'receiver_id' => $user_id,
            'sender_id' => $archive_id
        );
        $user_data = array('status_interest' => 0);
        //$data['archive_user_data'] =$this->commonmodel->addEditRecords('user_interest', $user_data, $condition);
        $this->user_model->interest_request('user_interest', $user_data, $condition);
    }

    public function accept_interest_list()
    {
        $this->check_auth();

        $data['logged_in'] = true;
        $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
        $data['fav_data'] = array();
        foreach ($fav_data as $fav_row) {
            $data['fav_data'][] = $fav_row['favorite_user_id'];
        }

        $user_id = $this->user_data['user_id'];
        $data['users'] = $this->user_model->accept_interest_list($user_id);

        echo view('user_interest_accept', $data);
    }


    public function archive_interest_list()
    {
        $this->check_auth();

        $data['logged_in'] = true;
        $fav_data = $this->commonmodel->getRecords('favorites', 'favorite_user_id', array("user_id" => $this->user_data['user_id']));
        $data['fav_data'] = array();
        foreach ($fav_data as $fav_row) {
            $data['fav_data'][] = $fav_row['favorite_user_id'];
        }

        $user_id = $this->user_data['user_id'];
        $data['users'] = $this->user_model->archive_interest_list($user_id);

        echo view('archive_interest_list', $data);
    }

    public function filter_record()
    {
        // $post_data = $this->input->post();
        // $passwd = trim($post_data["age_from"]);
        // print_r($passwd);
        $user_id = $this->user_data['user_id'];
        $age_from = $this->input->post('age_from');
        $age_to = $this->input->post('age_to');
        $gender = $this->input->post('gender');
        $merital_status = $this->input->post('merital_status');
        $manglik = $this->input->post('manglik');
        $qualification = $this->input->post('qualification');
        $annual_income = $this->input->post('annual_income');

        $array_data = array(
            'filter_age_from' => $age_from,
            'filter_age_to' => $age_to,
            'filter_gender' => $gender,
            'filter_merital_status' => $merital_status,
            'filter_manglik' => $manglik,
            'filter_qualification' => $qualification,
            'filter_annual_income' => $annual_income
        );

        $this->commonmodel->addEditRecords('user', $array_data, $user_id);
        echo 1;

        $this->user_data['filter_age_from'] = $age_from;
        $this->user_data['filter_age_to'] = $age_to;
        $this->user_data['filter_gender'] = $gender;
        $this->user_data['filter_merital_status'] = $merital_status;
        $this->user_data['filter_manglik'] = $manglik;
        $this->user_data['filter_qualification'] = $qualification;
        $this->user_data['filter_annual_income'] = $annual_income;

        $this->session->set_userdata('user_data', $this->user_data);

    }

    public function testfoo()
    {
        $this->commonmodel->setMailConfig();
        // set email data
        $this->email->from(FROM_EMAIL, FROM_NAME);
        $this->email->to('choukseyneelesh@gmail.com');
        $this->email->subject('Your site is duplicated');
        $message = 'Hi, Your site is duplicated : ' . site_url();
        $this->email->message($message);
        // send email
        if ($this->commonmodel->sendEmail()) {
            echo 'Thank you for contacting us.';
        } else {
            echo show_error($this->email->print_debugger());
        }
    }


}