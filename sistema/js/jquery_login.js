$(document).ready(function () {
    $('#telefone').mask('(00) 00000 - 0000');
});

document.getElementById("mostraSenha").onclick = function() {showPass()};
function showPass(){  
    var tipagem = document.getElementById('senhaLogin');
    if(tipagem.type === "password"){ tipagem.type = "text";}
    else{tipagem.type = "password";}
}

$('#btn-cadastrar').click(function(event){
    event.preventDefault(); 
    $.ajax({
        url:"cadastrar.php",
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(msg){
            if(msg.trim() === 'Cadastrado com Sucesso!'){
            $('#div-mensagem').removeClass('green');
            $('#div-mensagem').removeClass('pink');
            $('#div-mensagem').addClass('green');
            $('#div-mensagem').text(msg);
            $('#loginNow').click();
            $('#emailLogin').val(document.getElementById('email').value);
            }
            else{
            $('#div-mensagem').addClass('pink');
            $('#div-mensagem').text(msg);            
            }
        }
    });
});

// MODAL RECUPERAR // 
$('#btn-recuperar').click(function(e){
    event.preventDefault();
    $.ajax({
        url:"recuperar.php", 
        method:"post",
        data: $('form').serialize(),
        dataType: "text",
        success: function(Alert){
            if(Alert.trim() === 'Senha enviada para o Email!' ){
                $('#AlertmsgRecupera').addClass('text-success');
                $('#AlertmsgRecupera').text(Alert);   
            }
            else if(Alert.trim() === 'Preencha o campo Email!'){
                $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text(Alert);
            }
            else if(Alert.trim() === 'Email não encontrado!'){
                $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text(Alert);
            }
            else{
                $('#AlertmsgRecupera').addClass('text-danger');
                $('#AlertmsgRecupera').text('Erro ao enviar o formulario, provaveis problemas com o servidor local, ou com o servidor de hospedagem');    
            }
        }
    })
});