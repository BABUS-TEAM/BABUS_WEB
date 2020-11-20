<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="upload-form" enctype="multipart/form-data">
	<input type="file" id="file-select-input" multiple />
	<input type="hidden" name="companyname" value="selam">
	<!-- <input type="hidden" name="id" value="123"> -->
	<input type="hidden" name="auth" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIkMnkkMTAkVnY5Z0tSRk5mN1F1dFJBTkdWbFwvV3V1TlFrSmRrcllcL1lybzZBWWZSNHNYc2lzMzVKajhVQyIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvYmFidXMiLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2JhYnVzIiwiaWF0IjoxNjAwOTE0MjIwLCJuYmYiOjE2MDA5MTQyMjQsImRhdGEiOnsidHJhaW52ZW5kb3JuYW1lIjpudWxsLCJhY2NvdW50eXBlIjoidHJhaW52ZW5kb3IifX0.6A58RQGebwQ_u6_yBpUIsDA5KDQkE58WNWbAY2sO7FibwePhtvfyxO6fynPMF92a8M7SEr9mQ6hNCtPdHgvmdA">
	<input type="hidden" name="status" value="active">
	<input type="hidden" name="plateNumber" value="12904">
	<input type="hidden" name="numberOfSeats" value="40">
<!-- 	<input type="hidden" name="companylocation" value="0943124454"> -->
	<input type="hidden" name="lang" value="en">
	<input type="hidden" name="accountType" value="vendor">

	<button id="upload-button">Upload</button>
</form>
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	function supportAjaxUploadWithProgress(){
		return supportFileAPI() && supportAjaxUploadProgressEvents() && supportFormData();
		function supportFileSPI(){
			var fi=document.createElement('INPUT');
			ft.type='file';
			return 'files' in fi;
		}
		function supportAjaxUploadProgressEvents(){
			var xhr=new XMLHttpRequest();
			return !!(xhr && ('upload' in xhr) && ('onprogress' in xhr.upload));
		}
		function supportFormData(){
			return !!window.FormData;
		}
	}
	var form=document.getElementById('upload-form');
	var fileSelect=document.getElementById('file-select-input');
	var uploadButton=document.getElementById('upload-button');

	form.onsubmit=function(event){
		event.preventDefault();
		uploadButton.innerHTML='Uploading....';
		var files=fileSelect.files;
		
		var x=$('#upload-form').serializeObject();
		loginData=JSON.stringify(x);
		
		var formData=new FormData();
		for(var i=0;i<files.length;i++){
			var file=files[i];
			if(!/image.*/.test(file.type)){
				return;
			}
			formData.append('data',loginData);
			formData.append('photos[]',file,file.name);
			var xhr=new XMLHttpRequest();
			xhr.open('POST','registerBus',true);
			// xhr.open('POST','registerBusVendor',true);
			xhr.onload=function(){
				uploadButton.innerHTML='Upload';
				var message=JSON.parse(xhr.responseText)['message'];
				alert(message);
				// if(xhr.status===200){
				// 	var message=JSON.parse(xhr.responseText)['message'];
				// 	alert(message);
				// }else{
				// 	alert('Something went wrong!');
				// }
			};
			xhr.send(formData);
		}
	}
	$.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
          if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
              o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
          } else {
            o[this.name] = this.value || '';
          }
        });
        return o;
	};
</script>

</body>
</html>