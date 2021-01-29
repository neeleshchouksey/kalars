<?php
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
    
    $profile_pic = $row['profile_pic'] == '' ? base_url().'/assets/images/default.png' :  image_thumb($row['user_id']. $row['name'].'/', 200, 200, $row['user_id'], $row['profile_pic']);

    if(isset($logged_in) && $logged_in==true)
    {
        $favorite = in_array($row['user_id'],$fav_data)?'favorite':'';
    }

?>
<div class="column fourcol <?php echo $last;?>">
    <div class="profile-preview">
        <div class="profile-image">
            <a href="<?php echo base_url().'/user/profile/'.$row['user_id'];?>">
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
                <a href="<?php echo base_url().'/user/profile/'.$row['user_id'];?>"><?php echo $fullname;?></a>
            </h5>
            <!-- <p>25 years old man from Berlin, Germany</p> -->
        </div>
        <div class="profile-options popup-container clearfix">
        <?php
        if(isset($logged_in) && $logged_in==true)
        {
        ?>

            <div class="profile-option" onClick="markfavorites('<?php echo $row['user_id'];?>');">
<!--                <span style="float:left">Mark Favourite</span>-->
                <a href="javascript:void(0);" title="Favorites" data-title="Favorites" class="icon-heart submit-button <?php echo $favorite;?>" id="favorite-<?php echo $row['user_id'];?>"></a>
            </div>
        <?php
        }
        ?>
        </div>
    </div>          
</div>
<?php
}
?>