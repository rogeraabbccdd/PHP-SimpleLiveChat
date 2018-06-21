var msgform = $("#msgform");

msgform.validate({
		rules: {
			msg: { required: true, maxlength:20},
		},
		errorPlacement: function(error, element) {
			$(element).parent('div').addClass('has-error');
		},
	});
	
msgform.on('submit', function(e) {
	e.preventDefault();

	var msg = $("#msg").val();
	
	console.log('sending msg: '+msg)
	
	if(msgform.valid())
	{
		console.log('has msg');
		
		$.ajax({
			type: "post",
			url: "./assets/inc/sendmsg.php",
			data: {data:msg},
			dataType: "text",
			success: function(responce) {
				console.log('success send');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
		
		$("#msg").val('');
	}
	else
	{
		swal({
			title: '失敗!',
			text: '訊息空白或訊息過長.',
			type: 'error',
			confirmButtonClass: "btn btn-success",
			buttonsStyling: false
		})
	}
});