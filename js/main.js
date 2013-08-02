var max = 900;
var current = 1;
var w=$(window).width();
var h=$(window).height()-200;
function pad(num, size) {
	var s = num+"";
	while (s.length < size) s = "0" + s;
	return s;
}
$(function() {
	
	$("#gogogo").click(function() {
		var str = $('#string').val();
		$.ajax({
			type: 'POST',
			url: "txt2css.php",
			//contentType: "charset=utf-8",
			data: { string: ""+str, gogo:"yes" },
			success: function(data)
			{
				$('#txt2css').html(data);
				$('#kod').text(data);
			},
			error: function()
			{
				$('#txt2css').html("Some error !!!");
			}
		});
	});

	$("#gogo").click(function() {
		var str = $('#string').val();
		$.ajax({
			type: 'POST',
			url: "txt2css.php",
			//contentType: "charset=utf-8",
			data: { string: ""+str },
			success: function(data)
			{
				$('#txt2css').html(data);
			},
			error: function()
			{
				$('#txt2css').html("Some error !!!");
			}
		});
		
		$.ajax({
			type: 'POST',
			url: "printall.php",
			//contentType: "charset=utf-8",
			data: { string: "" },
			success: function(data)
			{
				$('#links').html(data);
			},
			error: function()
			{
				$('#links').html("Some error !!!");
			}
		});
	});
	$("#loading").ajaxStart(function(){
		   $(this).show();
		})
		.ajaxStop(function(){
		   $(this).hide();
		});
});