<?php

function image_thumb($image_path, $height, $width,$user_id,$image_name)
{
	// Get the CodeIgniter super object
	$CI =& get_instance();
	
	// Path to image thumbnail
	$source_image = $image_path.$image_name;
	$new_image_thumb = dirname($image_path) . '/thumb/' . $height . '_' . $width . '_'.$user_id.'_'.$image_name;
	
	
		// LOAD LIBRARY
		$CI->load->library('image_lib');
		
		// CONFIGURE IMAGE LIBRARY
		$config['image_library']	= 'gd2';
		$config['source_image']		= $source_image;
		$config['new_image']		= $new_image_thumb;
		$config['maintain_ratio']	= true;
		$config['dynamic_output']	= false;
		$config['height']			= $height;
		$config['width']			= $width;
		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();

	return $new_image_thumb;
}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */