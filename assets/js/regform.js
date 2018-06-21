	var createform = $('#reg-wizard');
	
	createform.validate({
		rules: {
			createacc: { required: true},
			createpw: { required: true},
			createname: { required: true},
		},
		errorPlacement: function(error, element) {
			$(element).parent('div').addClass('has-error');
		},
	});
	
	$('#create-finish').on( 'click', function () {
		if(!regwizard.noattack.checked)
		{
			swal({
				title: '失敗',
				text: '你必須同意使用規範',
				type: 'error',
				confirmButtonClass: "btn btn-success",
				buttonsStyling: false
			})
			regwizard.noattack.focus();
			return;
		}
		
		if(!regwizard.notrash.checked)
		{
			swal({
				title: '失敗',
				text: '你必須同意使用規範',
				type: 'error',
				confirmButtonClass: "btn btn-success",
				buttonsStyling: false
			})
			regwizard.notrash.focus();
			return;
		}
			
		if(createform.valid())	{
			var fd = new FormData(this);
			fd.append('acc',$('#createacc').val());
			fd.append('pw',$('#createpw').val());
			fd.append('name',$('#createname').val());
			if ($('#wizard-picture').get(0).files.length != 0){
				fd.append('file',$('#wizard-picture')[0].files[0]);
			}
			
			$.ajax({
				type: "post",
				url: "./assets/inc/auth.php?do=reg",
				data: fd,
				dataType: "json",
				contentType: false,
				processData: false,
				cache: false,
				success: function(json) {
					if(json["responce"] == "success")
					{
						swal({
							title: '成功!',
							text: '成功註冊.',
							type: 'success',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						}).then(function () {
							window.location.href="./index.php";
						})
					}
					else if(json["responce"] == "large")
					{
						swal({
							title: '失敗',
							text: '檔案太大',
							type: 'error',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						})
					}
					else if(json["responce"] == "upload-logo-error")
					{
						swal({
							title: '失敗',
							text: '上傳失敗',
							type: 'error',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						})
					}
					else if(json["responce"] == "used")
					{
						swal({
							title: '失敗',
							text: '帳號名稱已使用',
							type: 'error',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						})
					}
					else
					{
						swal({
							title: '失敗',
							text: '發生錯誤',
							type: 'error',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						})
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
			});
		}
	});
	