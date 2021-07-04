$(document).ready(function () {
    $('#telefone').mask('(00) 00000 - 0000');
    $('#tempo').mask('00 Minutos');
  });

$('#btn-salvar-email').click(function(event){
   event.preventDefault();
   $('#mensagem-email-marketing').addClass('text-info')
   $('#mensagem-email-marketing').removeClass('text-danger')
   $('#mensagem-email-marketing').removeClass('text-success')
   $('#mensagem-email-marketing').text('Enviando')
   $.ajax({
         url:"email-marketing.php",
         method:"post",
         data: $('form').serialize(),
         dataType: "text",
         success: function(msg){
            if(msg.trim() === 'Enviado com Sucesso!'){
               $('#mensagem-email-marketing').removeClass('text-info')
               $('#mensagem-email-marketing').addClass('text-success')
               $('#mensagem-email-marketing').text(msg);
               $('#assunto-email').val('');
               $('#link-email').val('');
               $('#mensagem-email').val('');
            }else if(msg.trim() === 'Preencha o Campo Assunto!'){
               $('#mensagem-email-marketing').addClass('text-danger')
               $('#mensagem-email-marketing').text(msg);
            }else if(msg.trim() === 'Preencha o Campo Mensagem!'){
               $('#mensagem-email-marketing').addClass('text-danger')
               $('#mensagem-email-marketing').text(msg);
            }
            else{
               $('#mensagem-email-marketing').addClass('text-danger')
               $('#mensagem-email-marketing').text('Deu erro no servidor, entre em contato com o programador');
            }
         }
   })
})

$('#Delete_Comment_home').click(function (event) {
   event.preventDefault();
   $.ajax({
      url: "home/excluiCmt.php",
      method: "post",
      data: $('form').serialize(),
      dataType: "text",
      success: function (mensagem){
         if (mensagem.trim() === 'Excluído com Sucesso!!') {
            $('#FechaComment').click();
            window.location = "index.php";
         }
         else{
         $('#exclui_coment_home').addClass('text-danger');
         $('#exclui_coment_home').text(Alert); 
         }
      },
   })
});

$('#Edit_comment').click(function (event) {
   event.preventDefault();
   $.ajax({
      url: "home/EditCmt.php",
      method: "post",
      data: $('form').serialize(),
      dataType: "text",
      success: function (mensagem){
         if (mensagem.trim() === 'Editado com Sucesso!!') {
            $('#Fechar_edit').click();
            window.location = "index.php";
         }
         else{
         $('#mensagem_edit').addClass('text-danger');
         $('#mensagem_edit').text(Alert); 
         }
      },
   })
});