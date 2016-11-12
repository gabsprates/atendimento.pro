$(function(){
	$('.on').mouseenter(function(){
		var off = $(this).attr('src');
		on = off.replace('.','_on.');
		$(this).attr('src',on);
	}).mouseleave(function(){
		var on = $(this).attr('src');
		off = on.replace('_on.','.');
		$(this).attr('src',off);				
	});
	$('.alpha').mouseenter(function(){
		$(this).fadeTo(200, 0.82);
	}).mouseleave(function(){
		$(this).fadeTo(200, 1);
	});
	$('.clinput').focus(function(){
		if(this.value==this.defaultValue){this.value='';}
	});
	$('.clinput').blur(function(){
		if(this.value==''){this.value=this.defaultValue;}
	});
	
	$('.caixinha h1').click(function(){
		$('.caixinha img').attr('src', 'imagens/mais.jpg');
		$('.caixinha ul').slideUp();

		$(this).next().slideDown();
		$(this).find('img').attr('src', 'imagens/menos.jpg');
	});

	$('#im a').click(function(){
		$('#ic').append("<div style='background:url(imagens/sh.png) top left repeat;position:absolute;top:0;left:0;width:100%;height:100%;'><img src='imagens/loader.gif' style='position:absolute;top:50%;left:50%;width:40px;margin:-20px 0 0 -20px;' /></div>");
		var lk = $(this).attr('href');
		$.post('iframe/',{lk:lk},function(retorno){
			$('#ic').html(retorno);
		});
		return false;
	});

	Hora();
	
});

// 14400000

	//~ function Hora(){
		//~ atual = new Date();
		//~ var hora = atual.getHours();
		//~ var minuto = atual.getMinutes();
		//~ var segundo = atual.getSeconds();
		//~ if(hora<10){hora = '0'+hora;}
		//~ if(minuto<10){minuto = '0'+minuto;}
		//~ if(segundo<10){segundo = '0'+segundo;}
		//~ var horAgora = hora+":"+minuto+":"+segundo;
		//~ $('#relo').html(horAgora);
		//~ setTimeout("Hora()",1000)
	//~ }

function Cadastro_a(){
	var u = $('input[name=u]').val();
	var nome = $('input[name=nome]').val();
	var sobrenome = $('input[name=sobrenome]').val();
	var tipo = $('select[name=tipo]').val();
	var setor = $('select[name=setor]').val();
	var email = $('input[name=email]').val();
	var senha = $('input[name=senha]').val();

	beforeSend:$('.retorno').html('Verificando...').fadeIn();
	$.post('iframe/cadastro.php',{u:u,nome:nome,sobrenome:sobrenome,tipo:tipo,setor:setor,email:email,senha:senha},function(retorno){
		$('body').append(retorno);
	});
	
	return false;
}

function Setores_a(){
	var u = $('input[name=u]').val();
	var setor = $('input[name=setor]').val();

	beforeSend:$('.retorno').html('Verificando...').fadeIn();
	$.post('setores.php',{u:u,setor:setor},function(retorno){
		$('body').append(retorno);
	});
	
	return false;
}

function Chat(i, s, n){
	var chat = i+"_"+s;
	if($('body').find("#chat_"+chat).length > 0){
		$("#chat_"+chat).fadeIn();
	}else{
		$.post('cok.php',{i:i,s:s,acao:'andamento'},function(retorno){
			$('.chats_'+chat).animate({"background-color":"#ffa","border":"1px solid #aaa","color":"#aaa"});
		});

		Cria_W('chat_wind.php', i, s, n);
	}
}

function Chat_H(i, s, n){
	var chat = i+"_"+s;
	if($('body').find("#chat_"+chat).length > 0){
		$("#chat_"+chat).fadeIn();
	}else{
		Cria_W('chat_hist.php', i, s, n);
	}
}

function Cria_W(o, i, s, n){
	var c = i+"_"+s;
	
//	$('body').append("<div id='chat_"+c+"' class='chat_window'><div class='bar'><img src='imagens/cl.png' onclick='Fechar(\""+c+"\");' /><img src='imagens/ma.png' onclick='Maximizar(\""+c+"\");' /><img src='imagens/mi.png' onclick='Minimizar(\""+c+"\");' /></div><iframe src='"+o+"?i="+i+"&s="+s+"' width='100%' height='400'></iframe></div></div>").children("#chat_"+c).draggable();
	
	$('body').append("<div id='chat_"+c+"' class='chat_window'><div class='bar'><span>"+n+"</span><img src='imagens/cl.png' onclick='Fechar(\""+c+"\");' /><img src='imagens/ma.png' onclick='Maximizar(\""+c+"\");' /><img src='imagens/mi.png' onclick='Minimizar(\""+c+"\");' /></div><div id='this_"+c+"'><h1 style='color:#333;'>Aguarde...</h1></div></div>");

	$('#chat_'+c+'').draggable({handle: ".bar"});//.resizable({maxHeight: '100%',maxWidth: '100%',minHeight: 424,minWidth: 325});
	
	$.post('./'+o,{i:i,s:s},function(retorno){
		$("#this_"+c).html(retorno);
	});
	
	$(".chat_window").click(function(){
		$(".chat_window").css({'z-index':1});
		$(this).css({'z-index':2,'border-color':'#000'}).children('.bar').css({'background-color':'#999'});
	});
}

function Atualiza(div){
	var msgm = '#mensagens_'+div;
	var tex = '#textarea_'+div;

	var idc = $(tex+" input[name='idc']").val();
	var usc = $(tex+" input[name='usc']").val();
	$.post('./chat/chat.php',{idc:idc, usc:usc, acao : 'atualizar'}, function(retorno){
		$(msgm+" ul").html(retorno);

		if(parseInt($(msgm).attr('scrollh'))>=parseInt($(msgm).attr('scrollhref'))){
			$(msgm).animate({scrollTop: $(msgm+' ul').height()}, function(){
				$(msgm).attr('scrollhref', $(msgm).scrollTop());
				$(msgm).attr('scrollh', $(msgm).scrollTop());
			});
		}
	});
}

function Cht_I(div){
	var msgm = '#mensagens_'+div;
	var tex = '#textarea_'+div;

	var msg = $(tex+" #msg").val();
	var idc = $(tex+" input[name='idc']").val();
	var usc = $(tex+" input[name='usc']").val();
	if(msg != ''){
		$.post('chat/chat.php',{msg : msg, idc:idc, usc:usc,  acao : 'inserir'}, function(retorno){
			$(msgm+' ul').append(retorno);
			$(tex+" #msg").val('');
		});
	}
	
	$(msgm).animate({scrollTop: $(msgm+' ul').height()}, 500);	
	
	return false;
}

function Cok(i, s){
	var acao = 'ok';
	$.post('cok.php',{i:i,s:s,acao:acao},function(retorno){
		$('.chats_'+i+'_'+s).animate({"background-color":"#afa","border":"1px solid #090","color":"#333"}).children('img').fadeOut();
	});
}

function Save_i(n, v){
	var u = $('input[name=u]').val();
	$('.retorno').removeClass('sucesso').html('Aguarde...');
	$.post('update.php',{name:n,value:v,u:u},function(retorno){
		$('body').append(retorno);
	});
	$('input[name='+n+']').val(v);
}


function Save_a(n, v){
	var u = $('input[name=u]').val();
	$('.retorno').removeClass('sucesso').html('Aguarde...');
	$.post('edit_atn.php',{name:n,value:v,u:u},function(retorno){
		$('body').append(retorno);
	});
	$('input[name='+n+']').val(v);
}

function Atl_btn(){
	var u = $('input[name=u]').val();
	var v = $('input[name=botao]').val();
	var p = $('#input_p').val();
	$('.retorno').removeClass('sucesso').html('Aguarde...');
	$.post('btn.php',{v:v,p:p,u:u},function(retorno){
		$('body').append(retorno);
	});

	return false;
}

function Fechar(t){
	$("#chat_"+t).remove();
}
function Minimizar(t){
	$("#chat_"+t).fadeOut();
}
function Maximizar(t){
	if($('#chat_'+t).width()>330){
		$("#chat_"+t).animate({"top":"80px","left":"80px","width":"325px","height":"424px"});
		$("#mensagens_"+t).animate({"height":"370px"});
	}else{
		$("#chat_"+t).animate({"width":(document.body.clientWidth-5),"height":(document.body.clientHeight-5),"top":"0","left":"0"});
		$("#mensagens_"+t).animate({"height":(document.body.clientHeight-58)});
	}
}

function Alert(y, w){
	var display = $("#chat_"+y+"_"+w).css('display');
	if($('body').find("#chat_"+y+"_"+w).length > 0){
		$("#chat_"+y+"_"+w).css({"border-color":"#f63"}).children(".bar").css({"background-color":"#f96"});
		if(display=='none'){
			$('#alert').append("<audio id='s"+y+"' autoplay><source src='/sound/s.ogg' type='audio/ogg'><source src='/sound/s.mp3' type='audio/mpeg'><source src='/sound/s.wav' type='audio/mpeg'></audio>");
			$(".chats_"+y+"_"+w).css({"border-color":"#f63","background-color":"#f96",'color':'#fff'});
		}
	}else{
		$('#alert').append("<audio id='s"+y+"' autoplay><source src='/sound/s.ogg' type='audio/ogg'><source src='/sound/s.mp3' type='audio/mpeg'><source src='/sound/s.wav' type='audio/mpeg'></audio>");
	}
}

function Del_setor(i,u){
	var r = confirm("Deseja realmente excluir este setor? Os atendentes nele cadastrados serao movidos para outro setor existente.");
	if(r==true){
		beforeSend:$('.retorno').html('Verificando...').fadeIn();
		$.post('del_set.php',{i:i,u:u},function(retorno){
			$('body').append(retorno);
		});
	}
}
