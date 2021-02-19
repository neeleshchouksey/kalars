<?php

function image_thumb($image_path, $height, $width,$user_id,$image_name)
{
	// Get the CodeIgniter super object
//	$CI =& get_instance();
	// Path to image thumbnail
	$source_image = IMG_PATH.$image_path.$image_name;
	$new_image_thumb =  'thumb/' . $height . '_' . $width . '_'.$user_id.'_'.$image_name;
    $file_path = IMG_PATH.$new_image_thumb;
	if (file_exists("$file_path")) {
        return KALARS_URL.'/uploads/gallery/'.$new_image_thumb;
	}else{
	    if(file_exists($source_image) ){
            $image = \Config\Services::image()
                ->withFile($source_image)
                ->fit($width, $height, 'center')
                ->save(IMG_PATH . $new_image_thumb);
            return KALARS_URL . '/uploads/gallery/' . $new_image_thumb;
        }else{
	        return KALARS_URL.'/assets/images/default.png';
        }
    }

}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */