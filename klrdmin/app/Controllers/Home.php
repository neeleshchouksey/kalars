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
        echo view('includes/includes/header');
        echo view('login2');
        echo view('includes/includes/footer');
    }


	public function redirect_to_domain()
	{
		$post_data = $this->request->getPost();

		$my_ip = $_SERVER['REMOTE_ADDR'];
		$new_arr = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$my_ip));
		//echo '<pre>';print_r($new_arr);
		$lat1 = $new_arr['geoplugin_latitude'];
		$lon1 = $new_arr['geoplugin_longitude'];
		$distance = array();

		//ssecho "Latitude:".$new_arr['geoplugin_latitude']." and Longitude:".$new_arr['geoplugin_longitude'];

		foreach ($post_data['domain'] as $key => $domain) 
		{
			$reachability = $this->check_reachability($domain);
			if(!$reachability)
			{
				unset($post_data['bandwidth'][$key]);
			}
			else
			{ 
				$new_domain = str_replace('https://', '', $domain);
				$hosts = gethostbynamel($new_domain);
				//echo '<pre>';print_r($hosts);exit;
				$new_arr = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$hosts[0]));
				$lat2 = $new_arr['geoplugin_latitude'];
				$lon2 = $new_arr['geoplugin_longitude'];

				$distance[$key] = $this->distance($lat1, $lon1, $lat2, $lon2, "M"); // M = Miles
			}
		}
		
		//echo '<pre>';print_r($distance);
		//$min_bandwidth_key = array_keys($post_data['bandwidth'], min($post_data['bandwidth']));
		$min_bandwidth_key = array_keys($distance, min($distance));
		echo $post_data['domain'][$min_bandwidth_key[0]];
		exit;
		//print_r($post_data);
	}

	public function check_reachability($url)
	{
		$timeout = 10;
		$ch = curl_init();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
		$http_respond = curl_exec($ch);
		$http_respond = trim( strip_tags( $http_respond ) );
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function distance($lat1, $lon1, $lat2, $lon2, $unit) // unit can be M, K or N
	{

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
		return ($miles * 1.609344);
		} else if ($unit == "N") {
		  	return ($miles * 0.8684);
		} else {
		   	return $miles;
		}
	}

	









}