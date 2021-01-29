<?php //echo '<pre>';print_r($fav_data);exit;?>

<!-- <aside class="sidebar column fourcol last">
	<?php //echo view('includes/side-search');?>
	<?php  // echo view('includes/side-advert');?>
	
</aside> -->

<!--<div class="column eightcol user-list" id="interest_user_list">-->
	<div class="profiles-listing clearfix">
		<div id="user-list">
			<?php
            if(count($users))
            {
			$count=0;
			foreach($users as $row)
			{ 
			    $count++;
			    if($count<3)
			    {
			        $last="";
			    }
			    else
			    {
			        $last="last";$count=0;
			    }
			    
			    $profile_pic = $row['profile_pic'] == '' ? base_url().'assets/images/default.png' :  image_thumb('uploads/gallery/'.$row['user_id']. $row['name'].'/', 200, 200, $row['user_id'], $row['profile_pic']);

			    if(isset($logged_in) && $logged_in==true)
			    {
			        $favorite = in_array($row['user_id'],$fav_data)?'favorite':'';
			    }

			?>
<div class="column fourcol <?php echo $last;?>">
    <div class="profile-preview">
        <div class="profile-image">
            <a href="<?php echo base_url().'user/profile/'.$row['user_id'];?>">
                <img src="<?php echo $profile_pic;?>" class="avatar" alt="" width="200">
            </a>
        </div>
        <div class="profile-text">
            <h5>
                <!-- <span title="Online" class="profile-status online"></span> -->
                <?php
                $fullname = $row['name'].' '.$row['last_name'];
                $fullname = strtolower($fullname);
                $fullname = ucwords($fullname);
                if( strlen($fullname)>18)
                {
                    $fullname = substr($fullname,0,18).'..';
                }
                ?>
                <a href="<?php echo base_url().'user/profile/'.$row['user_id'];?>"><?php echo $fullname;?></a>
            </h5>
            
            <!-- <p>25 years old man from Berlin, Germany</p> -->
        </div>
        	

        <div class="profile-options popup-container clearfix">
        <?php
        if(isset($logged_in) && $logged_in==true)
        {
        ?>
            <div class="profile-option" onClick="markfavorites('<?php echo $row['user_id'];?>');">
                <span style="float:left">Mark Favourite</span>
                <a href="javascript:void(0);" title="Favorites" data-title="Favorites" class="icon-heart submit-button <?php echo $favorite;?>" id="favorite-<?php echo $row['user_id'];?>"  style="float:right"></a>
            </div>
        </div>
        <div class="profile-options popup-container clearfix">
        	<div class="profile-option" >
                <span style="float:left; margin:5px;"  onclick="accept_interest('<?php echo $row['user_id']; ?>')"><b>Accept</b></span>
            </div>

            <!-- <div class="profile-option" >
                <span style="float:left; margin:5px;" onclick="archive_interest(<?php// echo $row['user_id']; ?>)"><b>Archive</b></span>
                
            </div> -->
        
        <?php
        }
        ?>
        </div>

    </div>          
</div>
            <?php
            }
            }
            else
            {
                echo 'No Archive Record...';
            }
            ?>
            

		</div>

		<div class="clear"></div>
	</div>
	<!-- /profiles -->
	<!-- <nav class="pagination"><span class="page-numbers current">1</span>
	<a class="page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2">2</a>
	<a class="next page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2"></a></nav> -->	
<!--</div>-->

