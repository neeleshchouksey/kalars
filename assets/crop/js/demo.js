var Demo = (function() {
	function output(node) {
		var existing = $('#result .croppie-result');
		if (existing.length > 0) {
			existing[0].parentNode.replaceChild(node, existing[0]);
		}
		else {
			$('#result')[0].appendChild(node);
		}
	}
	
	function popupResult(result) {
		$('#upload-result-loader').show();
		$('#upload-result').hide();

		var html;
		if (result.html) {
			html = result.html;
		}
		
		swal({
			title: '',
			html: true,
			text: html,
			allowOutsideClick: true
		});
		
		var path = window.location.pathname;
		var found_p = path.search("my_profile");
		var found_r = path.search("sign_up"); 
		path = path.slice( 1 );
		if(found_p >-1)
		{
			url = site_url + "/user/update_profile_pic"
		}
		else if(found_r >-1)
		{
			url = site_url + "/home/set_profile_image"
			jQuery('#registered_image').attr("src", result.src)
		}
		else
		{
			url = site_url + "/user/add_delete_photo"
		}

		//window.location.href = result.src;return;
		data = 'user_avatar='+result.src;
		jQuery.ajax({
			type: "POST",
			url: url,
			data: data,
			//async: false,
			success: function (data){ 
				if (data == "success")
				{ 
					window.location=site_url + "/user/my_profile";
				}
				else if(data == "registered_image")
				{ 
					$('#upload-result-loader').hide();
					$('#upload-result').show();
					window.location=site_url + "/home/sign_up#close";
				}
				else
				{
					//window.location=site_url + "user/gallery/5";
					window.location='/'+path;
				}
			}
		});
		//fileURL = result.src;
		//fileName = "hello";
		//SaveToDisk(fileURL);

		//$("<a>").attr("href", result.src).attr("download", "img.png").appendTo("body").click().remove();

		/*setTimeout(function(){
			$('.sweet-alert').css('margin', function() {
				var top = -1 * ($(this).height() / 2),
					left = -1 * ($(this).width() / 2);

				return top + 'px 0 0 ' + left + 'px';
			});
		}, 1);*/
	}

	

	

	function demoUpload() {
		var $uploadCrop;

		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	});
	            	$('.upload-demo').addClass('ready');
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: 200,
				height: 200
			},
			boundary: {
				width: 300,
				height: 300
			},
			exif: true
		});

		$('#upload').on('change', function () { readFile(this); 

		//	popupResult();
		document.getElementById('hit').click();

		});

		$('.upload-result').on('click', function (ev) {
			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport',
				format: 'jpeg'
			}).then(function (resp) {
				popupResult({
					src: resp
				});
			});
		});
	}


	function init() {
		demoUpload();
	}

	return {
		init: init
	};
})();


// Full version of `log` that:
//  * Prevents errors on console methods when no console present.
//  * Exposes a global 'log' function that preserves line numbering and formatting.
(function () {
  var method;
  var noop = function () { };
  var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});
 
  while (length--) {
    method = methods[length];
 
    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
  }
 
 
  if (Function.prototype.bind) {
    window.log = Function.prototype.bind.call(console.log, console);
  }
  else {
    window.log = function() { 
      Function.prototype.apply.call(console.log, console, arguments);
    };
  }
})();