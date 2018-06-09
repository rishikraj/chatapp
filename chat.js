var chat={}

chat.fetchMessages=function()
{
	$.ajax({
		url:'chat.php',
		type:'post',
		data:{method:'fetch'},
		success:function(data)
		{
			$('.chat .messages').html(data);
		}
	});
}

chat.throwMessage=function(message)
{
	if($.trim(message).length!=0)
	{
		$.ajax({
			url:'chat.php',
			type:'post',
			data:{method:'throw', message:message},
			success:function(data)
			{
				chat.fetchMessages();
				chat.entry.val('');
			}
		});
	}
}

chat.entry=$('.entry');
chat.entry.bind('keydown',function(e)
{
	if(e.keyCode===13 && e.shiftKey===false)
	{
		chat.throwMessage($(this).val());
		e.preventDefault();
	}

});

chat.interval=setInterval(chat.fetchMessages,5000);
chat.fetchMessages();