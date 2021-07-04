$(document).ready(function () {
    $('#telefone').mask('(00) 00000 - 0000');
});
  
$('#btn-enviar-contato').click(function(event){
    event.preventDefault();
    $('#msg_box').addClass('text-info')
    $('#msg_box').removeClass('text-danger')
    $('#msg_box').removeClass('text-success')
    $('#msg_box').text('Enviando')
    $.ajax({
        url:"enviar.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg){
            if(msg.trim() === 'Enviado com Sucesso!'){
            $('#msg_box').removeClass('text-info')
            $('#msg_box').addClass('text-success')
            $('#msg_box').text(msg);
            $('#email').val('');
            $('#nome').val('');
            $('#telefone').val('');
            $('#mensagem').val('');
            }
            else if(msg.trim() === 'Preecha o Campo Nome'){                    
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text(msg);
            }
            else if(msg.trim() === 'Preecha o Campo Mensagem'){    
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text(msg);
            }
            else if(msg.trim() === 'Preecha o Campo Email'){
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text(msg);
            }
            else if(msg.trim() === 'Email invalido'){
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text(msg);
            }
            else if(msg.trim() === 'Preencha com um nome valido'){
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text(msg);
            }
            else{
            $('#msg_box').addClass('text-danger')
            $('#msg_box').text('Deu erro ao Enviar o Formulário!');
            }
        }
    });
});

$('#btn-enviar-EmailNews').click(function(event){
    event.preventDefault();
    $('#msg_box_news').addClass('text-info')
    $('#msg_box_news').removeClass('text-danger')
    $('#msg_box_news').removeClass('text-success')
    $('#msg_box_news').text('Enviando')
    $.ajax({
        url:"enviar_news.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg){
            if(msg.trim() === 'Cadastrado com Sucesso!'){
            $('#msg_box_news').removeClass('text-info')
            $('#msg_box_news').addClass('text-success')
            $('#msg_box_news').text(msg);
            $('#email').val('');
            $('#nome').val('');
            }
            else if(msg.trim() === 'Preecha o Campo Nome'){                    
            $('#msg_box_news').addClass('text-danger')
            $('#msg_box_news').text(msg);
            }
            else if(msg.trim() === 'Preecha o Campo Email'){
            $('#msg_box_news').addClass('text-danger')
            $('#msg_box_news').text(msg);
            }
            else if(msg.trim() === 'Email invalido'){
            $('#msg_box_news').addClass('text-danger')
            $('#msg_box_news').text(msg);
            }
            else if(msg.trim() === 'Preencha com um nome valido'){
            $('#msg_box_news').addClass('text-danger')
            $('#msg_box_news').text(msg);
            }
            else{
            $('#msg_box_news').addClass('text-danger')
            $('#msg_box_news').text('Deu erro ao Enviar o Formulário!');
            }
        }
    });
});  

// DESCADASTRAR JQUERY
$('#btn-descadastrar').click(function(event){
    event.preventDefault(); 
    $.ajax({
        url:"ajax-descadastrar.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg){
            if(msg.trim() === 'Descadastrado da Lista com Sucesso!'){
                $('#div-msg-rec').addClass('text-success')
                $('#div-msg-rec').text(msg);                      
            }
            else if(msg.trim() === 'Preencha o Campo com seu Email!'){
                $('#div-msg-rec').addClass('text-danger')
                $('#div-msg-rec').text(msg);
            }
            else if(msg.trim() === 'Este email não está cadastrado!'){
                $('#div-msg-rec').addClass('text-danger')
                $('#div-msg-rec').text(msg);
            }
            else{
                $('#div-msg-rec').addClass('text-danger')
                $('#div-msg-rec').text('Deu erro ao Enviar o Formulário! Provavelmente seu servidor de hospedagem não está com permissão de envio habilitada ou você está em um servidor local');
            }
        }
    });
});