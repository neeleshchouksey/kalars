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

<table border="0" cellspacing="0" cellpadding="0" class="data-table" id="tbl_user_list">
    <thead>
    <tr>
        <th width="10">S.No.</th>
        <th width="20">Status</th>
        <th width="30">Id</th>
        <th width="20">image</th>
        <th width="200">Name</th>
        <th width="80">Phone</th>
        <th width="150">Date</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody id="t-body">
    <?php
    if (count($users) > 0) {
        $count = $count * 1;
        foreach ($users as $user_row) {
            /*if($user_row['gender'] == 'Female')
            {*/
            $count++;
            $profile_pic = $user_row['profile_pic'] == '' ? KALARS_URL . '/assets/images/default.png' : image_thumb(KALARS_URL . '/uploads/gallery/' . $user_row['user_id'] . $user_row['name'] . '/', 30, 30, $user_row['user_id'], $user_row['profile_pic']);

            $date = new DateTime($user_row['registered']);
            $registered = $date->format('d-M-Y h:i A');
            ?>
            <tr <?php if ($count % 2 != 0) echo 'class="blue-bg"'; ?>>
                <td><?php echo $count; ?></td>
                <td>
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
                <td><?php echo $user_row['user_id']; ?></td>
                <td><img src="<?php echo $profile_pic; ?>" class="avatar" alt="" width="30"></td>
                <td><a target="_blank"
                       href="<?php echo KALARS_URL ;?>user/profile/<?php echo $user_row['user_id']; ?>"> <?php echo $user_row['name']; ?><?php echo $user_row['last_name']; ?></a>
                </td>
                <td><?php echo $user_row['phone_no']; ?></td>
                <td><?php echo $registered; ?></td>
                <td>
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

    </tbody>
</table>

<ul class="pagination">
    <?php for($i=0;$i<$total/100;$i++) {
        $offset = $i*100;
        ?>
    <li <?php if($offset == $count-100) {?>class="p-selected" <?php } ?> ><a href="javascript::void(0)" onclick="users_list(<?php echo $offset; ?>)"><?php echo $i+1; ?></a></li>
   <?php } ?>
</ul>