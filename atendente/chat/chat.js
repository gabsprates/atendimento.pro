$(function(){	//atualizar	setInterval(function(){		var idc = $("input[name='idc']").val();		var usc = $("input[name='usc']").val();		$.post('chat/chat.php',{idc:idc, usc:usc, acao : 'atualizar'}, function(retorno){			$("#mensagens ul").html(retorno);		});		//$('#mensagens').animate({scrollTop: $('#mensagens ul').height()}, 500);	}, 2500);});function Cht_I(){	var msg = $("#msg").val();	var idc = $("input[name='idc']").val();	var usc = $("input[name='usc']").val();	if(msg != ''){		$.post('chat/chat.php',{msg : msg, idc:idc, usc:usc,  acao : 'inserir'}, function(retorno){			$("#mensagens ul").append(retorno);			$("#msg").val('');		});	}		$('#mensagens').animate({scrollTop: $('#mensagens ul').height()}, 500);			return false;}