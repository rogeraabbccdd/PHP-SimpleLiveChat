$('#SaveProfile').on('click', function(e) { e.preventDefault(); saveprofile(); });
$('#profile').on('submit', function(e) { e.preventDefault(); saveprofile(); });
function saveprofile(){
	var fd = new FormData(this);
	var name = $('#name').val();
	if(!name)	return;
	fd.append('name',name);
	
	if ($('#uploadavatar').get(0).files.length != 0){
		fd.append('file',$('#uploadavatar')[0].files[0]);
	}
			
	$.ajax({
			type: "POST",
			url: "./assets/inc/saveprofile.php",
			data: fd,
			dataType: "text",
			contentType: false,
			processData: false,
			cache: false,
			success: function(text) {
				if(text == "success")
				{
					swal({
						title: '成功',
						text: '修改成功.',
						type: 'success',
						confirmButtonClass: "btn btn-success",
						buttonsStyling: false
					})
					
					$("#settings").html('<i class="material-icons">person</i>&nbsp;'+name);
				}
				else if(text == "large")
				{
					swal({
					  title: '失敗',
					  text: '檔案超過大小限制 :(',
					  type: 'error',
					  confirmButtonClass: "btn btn-info",
					  buttonsStyling: false
					})
				}
				else
				{
					swal({
					  title: '失敗',
					  text: '保存失敗 :(',
					  type: 'error',
					  confirmButtonClass: "btn btn-info",
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