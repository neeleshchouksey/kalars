<div id="tbl-user-list">
    <table border="0" cellspacing="0" cellpadding="0" class="data-table">
        <thead>
        <tr>
            <th width="5%">S.No.</th>
            <th width="5%">Status</th>
            <th width="5%">Id</th>
            <th width="5%">image</th>
            <th width="15%">Name</th>
            <th width="15%">Phone</th>
            <th width="20%">Date</th>
            <th width="20%">Options</th>
        </tr>
        </thead>
        <tbody id="tbl_user_list">

        </tbody>
    </table>
    <div class="loader" id="loader" style="display:none">
        <img src="<?php echo base_url() ?>/assets/images/loader.gif">
    </div>

    <input type="hidden" id="total-user" value="<?php echo $total; ?>"/>
    <input class="load-more" style="display: none;" value="100"/>
    <button id="load-more-btn" type="button" onclick="load_more_user()">Load More</button>

</div>