function search_bar()
{
	var dataString = $("#search").serialize();
	$.ajax({
	    	type: "POST",
	    	data: dataString,
	        url: site_url+"/admin/search_bar",
	        success: function (data) {
	        	$("#tbl-user-list").html(data);
	        }
	    });
}

function brides()
{
	// alert('hello');return false;
	// var dataString = $("#search").serialize();
	$.ajax({
	    	type: "POST",
	    	// data: dataString,
	        url: site_url+"/admin/brides",
	        success: function (data) {
	        	$("#tbl-user-list").html(data);
	        }
	    });
}

function onlyShow(divId)
{
	document.getElementById(divId).style.display="";
}
function onlyHide(divId)
{
	document.getElementById(divId).style.display="none";
}

function cancelTo(page)
{
	window.location = site_url+page;
}

function deleteRecord(table, id, txt, redirect)
{
	if(confirm("Are you sure you want to delete "+txt+"."))
	{
		window.location =site_url+'/admin/deleteRecord/'+table+"/"+id+"/"+redirect;
	}
	return false;
}

function deleteUser(table, id, txt, redirect)
{
	if(confirm("Are you sure you want to delete "+txt+"."))
	{
		$.ajax({
			url: site_url+'/admin/set_is_deleted/'+table+"/"+id+"/"+redirect,
			success: function (data){
				$("#delete-btn-"+id).html('Deleted');
			}
		});
	}
	return false;
}

function deleteAbusedUser(table,id,txt,redirect)
{
	if(confirm("Are you sure you want to delete "+txt+"."))
	{
		window.location =site_url+'/admin/deleteAbusedUser/'+table+"/"+id+"/"+redirect;
	}
	return false;
}

// this function disables when radio is not checked
function toggleEnableById(chk, enable_id, disable_id)
{
	if(chk.checked)
	{
		document.getElementById(enable_id).disabled = false;
		document.getElementById(disable_id).disabled = true;
		document.getElementById(enable_id).className = "input-shadow";
		if (disable_id == 'company_name')
		{
			document.getElementById(disable_id).className = "";
			document.getElementById(disable_id).style.width = "200px";
		}
	}
}

function changeStatus(table,status,id)
{
	data = 'table='+table+'&status='+status+'&id='+id;
	$.ajax({
		type: "POST",
		url: site_url + "/admin/changeStatus",
		data: data,
		success: function (data){
			if (data == 1)
			{
				$("#status"+id).html('<span style="cursor:pointer;" onClick="changeStatus(\''+table+'\',0,\''+id+'\')"><img src="'+base_url+'/assets/images/right.png" /></span>');
			}
			else
			{
				$("#status"+id).html('<span style="cursor:pointer;" onClick="changeStatus(\''+table+'\',1,\''+id+'\')"><img src="'+base_url+'/assets/images/minus.png" /></span>');
			}
		}
	});
}

function tooltip(table,id)
{
		$.ajax({
			type: "GET",
			url: site_url + "/admin/callback_StatusToolTip/"+table+"/"+id,
			success: function (data){ //alert(data);
				$("#tip"+id).html(data);
			}
		});
}


function adddEditAddStatus(table,status,id)
{
	data = 'table='+table+'&status='+status+'&id='+id;
	$.ajax({
		type: "POST",
		url: site_url + "/admin/adddEditAddStatus",
		data: data,
		success: function (data){
			if (data == 1)
			{
				$("#"+table+id).html('<span style="cursor:pointer;" onClick="adddEditAddStatus(\''+table+'\',0,\''+id+'\')"><img src="images/right.png" /></span>');
			}
			else
			{
				$("#"+table+id).html('<span style="cursor:pointer;" onClick="adddEditAddStatus(\''+table+'\',1,\''+id+'\')"><img src="images/minus.png" /></span>');
			}
		}
	});
}

// function users_list(offset = 0)
// {
	// off = $("#tbl_user_list tr").length-1;
	// if(off>0){
	// 	offset = off;
	// }
	// offset = $("#offset").val();
$(document).ready(function() {
	var lastID = 0;
	$.ajax({
		url: site_url + "admin/users_list/" + lastID,
		success: function (data) {
			$("#tbl-user-list").append(data);
			$('.load-more').attr('lastID',parseInt(lastID)+100);
		}
	});
	$(window).scroll(function () {
		var lastID = $('.load-more').attr('lastID');
		var total_user = $("#total-user").val();
		if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
			$.ajax({
				url: site_url + "admin/users_list/" + lastID,
				success: function (data) {
					$("#tbl-user-list").append(data);
					// if(total_user>lastID) {
						$('.load-more').attr('lastID', parseInt(lastID) + 100);
					// }else{
					// 	$('.load-more').attr('lastID', 0);
					// }
				}
			});
		}
	});
});
// }