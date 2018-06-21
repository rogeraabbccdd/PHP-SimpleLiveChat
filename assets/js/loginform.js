	$('#LoginButton').on('click', function() {
		$('#loginform')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal_form').modal('show');
	});
	
	var loginform = $('#loginform');
		loginform.validate({
			rules: {
				loginnumber: { required: true},
				loginpass: { required: true},
			},
			errorPlacement: function(error, element) {
				$(element).parent('div').addClass('has-error');
			},
		});
		
	$('#SubmitLogin').on('click', function(e) { e.preventDefault; login () });
	$('#loginform').on('submit', function(e) { e.preventDefault; login () });
		
	function login () 
	{
		if(loginform.valid())
		{
			var val = $('#loginnumber').val();
			var val2 = $('#loginpass').val();
			$('#SubmitLogin').text('登入中...');
			$('#SubmitLogin').attr('disabled',true);
			$.ajax({
				type: "post",
				url: "./assets/inc/auth.php?do=login",
				data: {	login: val, pass: val2},
				dataType: "text",
				success: function(responce) {
					console.log(responce);
					if(responce == "success")
					{
						swal({
							title: '成功!',
							text: '成功登入.',
							type: 'success',
							confirmButtonClass: "btn btn-success",
							buttonsStyling: false
						}).then(function () {
							window.location.href="./chatroom.php";
						})
					}
					else if(responce == "failed")
					{
						swal({
						  title: '登入失敗',
						  text: '帳號或密碼錯誤',
						  type: 'error',
						  confirmButtonClass: "btn btn-info",
						  buttonsStyling: false
						});
						$('#SubmitLogin').text('登入');
						$('#SubmitLogin').attr('disabled',false);
					}
					else if(responce == "ban")
					{
						swal({
						  title: '登入失敗',
						  text: '本IP已被封鎖',
						  type: 'error',
						  confirmButtonClass: "btn btn-info",
						  buttonsStyling: false
						});
						$('#SubmitLogin').text('登入');
						$('#SubmitLogin').attr('disabled',false);
					}
					else
					{
						swal({
						  title: '登入失敗',
						  text: '系統發生錯誤',
						  type: 'error',
						  confirmButtonClass: "btn btn-info",
						  buttonsStyling: false
						});
						$('#SubmitLogin').text('登入');
						$('#SubmitLogin').attr('disabled',false);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
			});
		}
		else
		{
			swal({
			  title: '取消',
			  text: '輸入格式錯誤',
			  type: 'error',
			  confirmButtonClass: "btn btn-info",
			  buttonsStyling: false
			})
		}
	};
	
	$('#LogoutButton').on('click', function() {
		swal({
			title: '你確定?',
			text: '你確定要登出嗎?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: '確定',
			cancelButtonText: '取消',
			confirmButtonClass: "btn btn-success",
			cancelButtonClass: "btn btn-danger",
			buttonsStyling: false
		}).then(function() {
			$.ajax({
				type: "POST",
				url: "./assets/inc/auth.php?do=logout",
				data: {	logout: "logout"},
				success:swal({
					title: '成功',
					text: '成功登出.',
					type: 'success',
					confirmButtonClass: "btn btn-success",
					buttonsStyling: false
				}).then(function () {
					window.location.href="./index.php";
				}),
				error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
			});
		}, function(dismiss) {
			if (dismiss === 'cancel') {
				swal({
				  title: '取消',
				  text: '你沒有登出 :)',
				  type: 'error',
				  confirmButtonClass: "btn btn-info",
				  buttonsStyling: false
				})
			  }
		})
	});
	