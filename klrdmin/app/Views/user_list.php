<style>
    ul.pagination {
        list-style: none;
        display: inline-flex;
        padding: 10px;
    }
    li {
        padding: 10px;
        border: 1px solid gray;
        background-color: #97C0FF;
    }
    .p-selected{
        background-color: red;
    }
    li > a {
        color: white;
    }
</style>

<table border="0" cellspacing="0" cellpadding="0" class="data-table" id="tbl_user_list" style="border-top: none;border-bottom: none">

    <?php
    if (count($users) > 0) {
//        $count = $count * 1;
        foreach ($users as $key=>$user_row) {
            /*if($user_row['gender'] == 'Female')
            {*/
            $count1 = ($key+1) +  $count;
            $profile_pic = $user_row['profile_pic'] == '' ? KALARS_URL . '/assets/images/default.png' : image_thumb(KALARS_URL . '/uploads/gallery/' . $user_row['user_id'] . $user_row['name'] . '/', 30, 30, $user_row['user_id'], $user_row['profile_pic']);

            $date = new DateTime($user_row['registered']);
            $registered = $date->format('d-M-Y h:i A');
            ?>
            <tr <?php if ($count1 % 2 != 0) echo 'class="blue-bg"'; ?>>
                <td width="5%"><?php echo $count1; ?></td>
                <td width="5%">
		<span id="status<?php echo $user_row['user_id']; ?>"
              onMouseover="tooltip('user','<?php echo $user_row['user_id']; ?>')">
		<?php
        if ($user_row['is_active']) {
            ?>
            <span style="cursor:pointer;" onClick="changeStatus('user',0,'<?php echo $user_row['user_id']; ?>')">
				<img src="<?php echo base_url(); ?>/assets/images/right.png"/>
			</span>
            <?php
        } else {
            ?>
            <span style="cursor:pointer;" onClick="changeStatus('user',1,'<?php echo $user_row['user_id']; ?>')">
				<img src="<?php echo base_url(); ?>/assets/images/minus.png"/>
			</span>
            <?php
        }
        ?>
		</span>
                </td>
                <td width="5%"><?php echo $user_row['user_id']; ?></td>
                <td width="5%"><img src="<?php echo $profile_pic; ?>" class="avatar" alt="" width="30"></td>
                <td width="15%"><a target="_blank"
                       href="<?php echo KALARS_URL ;?>user/profile/<?php echo $user_row['user_id']; ?>"> <?php echo $user_row['name']; ?><?php echo $user_row['last_name']; ?></a>
                </td>
                <td width="15%"><?php echo $user_row['phone_no']; ?></td>
                <td width="20%"><?php echo $registered; ?></td>
                <td width="20%">
                    <a target="_blank"
                       href="<?php echo KALARS_URL ?>home/app_launch/<?php echo $user_row['user_id']; ?>/shivadmin"
                       class="pencil"></a>

                    <span id="delete-btn-<?php echo $user_row['user_id']; ?>" class="red">
			<?php
            if ($user_row['is_deleted'] == 0) {
                ?>
                <a href="javascript:void(0);"
                   onClick="deleteUser('user','<?php echo $user_row['user_id']; ?>','this user','users');"
                   class="delete"></a>
                <?php
            } else {
                echo 'Deleted';
            }
            ?>
		</span>

                </td>
            </tr>


            <script type="text/javascript">
                $(function () {
                    $("#status<?php echo $user_row['user_id'];?>").wTooltip({
                        ajax: site_url + "admin/callback_StatusToolTip/user/<?php echo $user_row['user_id'];?>",
                        fadeIn: 100,
                        offsetY: 20,
                        id: 'tip<?php echo $user_row['user_id'];?>',
                        style: {border: "1px solid gray", padding: "1px"},
                        fadeOut: 200
                    });
                });
            </script>
            <?php
            // }
        }
    }
    ?>
<!--    </tbody>-->
</table>
