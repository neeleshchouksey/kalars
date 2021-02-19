<!--
	This is a view for admin age-group list.
-->
<style type="text/css">
    form#search {
        float: right;
        background: skyblue;
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/javascript/wtooltip.js"></script>
<script>
    $('#<?php echo $menu;?>').css('color','#81BDDA');
</script>

<div id="content">

    <h2 class="left">Users</h2><br/>

    <a href="<?php echo base_url()?>/admin/add_user" class="add-affiliate">Add New User</a>

    <br>
    <div align="left" id="count">
        <label class="label">Total : <?php echo count($total_user); ?></label>
    </div>

    <div align="right">
        <form id="search" action="javascript:void(0);" method="post">
            <table>
                <tr>
                    <td><input type="text" name="search_item" id="search_item" placeholder="Search by id,name or mob nu..."></td>
                    <td><button onclick="return search_bar();">Search</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="tbl-user-list">

    </div>
    <br />
<!--    <button onclick="users_list();">Load More</button>-->
</div>


<!--PopUp : Start-->
<div id="popupEdit"></div>
<!--PopUp : End-->

<script type="text/javascript">
    users_list();
</script>


