<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="upload-form" enctype="multipart/form-data">
	<input type="file" id="file-select-input" multiple />
	<input type="hidden" name="name" value="Addis Abeba">
	<input type="hidden" name="latitude" value="8.9806">
	<input type="hidden" name="longitude" value="38.7578">
	<input type="hidden" name="description" value="Addis Abeba City is the capital city of Ethiopia!">
	<input type="hidden" name="auth" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJqdGkiOiIkMnkkMTAkTks3Nk5ZTVExeUljaXhRc3M3NGVEZWtVV09YRDF3azZLZ3FpbkpXRTJvRGhMN2Y3ZFJlTzIiLCJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2JhYnVzIiwiYXVkIjoiaHR0cDpcL1wvbG9jYWxob3N0XC9iYWJ1cyIsImlhdCI6MTU5ODEyNTU4MiwibmJmIjoxNTk4MTI1NTg2LCJkYXRhIjp7ImFkbWlubmFtZSI6ImEiLCJhY2NvdW50eXBlIjoiYWRtaW4ifX0.EnZ3czKdwi2f1wbqphYhgZBVVBWe0PviFrIqwlzmWn5SfZOkbKvAE3tIfhs_S51nqxhsCFMM2WzNPoJGgVHoLg">
	<input type="hidden" name="lang" value="en">
	<input type="hidden" name="accountType" value="admin">

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
			xhr.open('POST','registerCity',true);
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