<?php //echo '<pre>';print_r($fav_data);exit;?>

<aside class="sidebar column fourcol last">
	<?php echo view('includes/side-search');?>
	<?php  // echo view('includes/side-advert');?>
</aside>

<div class="column eightcol user-list">
	<div class="profiles-listing clearfix">
		<div id="user-list">
			<?php echo view('user-list');?>
		</div>

		<div class="clear"></div>
	</div>
	<!-- /profiles -->
	<!-- <nav class="pagination"><span class="page-numbers current">1</span>
	<a class="page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2">2</a>
	<a class="next page-numbers" href="http://themextemplates.com/demo/lovestory/profiles/page/2"></a></nav> -->	
</div>




<script type="text/javascript">
jQuery(document).ready(function($){

  start = 24;
  $(window).scroll(function() { 
    if($(window).scrollTop() > $(document).height() - $(window).height() - 600) { 
        // ajax call get data from server and append to the div
        $.ajax({
          url: site_url + "user/load_more_user/Female/"+start,
          success: function(list)   
          {
            $("#user-list").append(list);
          }
        });
		start = start+24;
    }
  });

});//end ready
</script>