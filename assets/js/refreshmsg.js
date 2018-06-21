setInterval(get_msg, 1500);
$('html, body').animate({scrollTop:$(document).height()}, 'fast');
var num = <?=$msg_num?>;

$(window).scroll(function (event) {
   scrol = false;
});

var notifyConfig = {
  body: '\\ ^o^ /',
  icon: './../img/icon.ico'
};

function get_msg(){
	$.ajax({
		type: "post",
		url: "./../inc/refreshmsg.php?num="+num,
		data: "",
		dataType: "json",
		success: function(json) {
			$("#msgboard").append(json["msg"]);
			num += json["count"];
			$('html, body').animate({scrollTop:$(document).height()}, 'fast');
			
			if(json["count"] > 0)
			{
				Notification.requestPermission(function (permission) {
					if (permission === 'granted') { 
					  var notification = new Notification('聊天室有新訊息!', notifyConfig);
					  notification.onclick = function(e) { 
						  e.preventDefault(); 
						  window.open('./chatroom.php');
						}
					}
				  });
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		}
	});
}