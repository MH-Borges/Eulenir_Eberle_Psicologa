$(document).ready(function () {
    $('#TelInfo').mask('(00) 00000 - 0000');
  });

  $("#form_banner").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "inserirBN.php",
      type: 'POST',
      data: formData,
      success: function (mensagem) {
          $('#msgBanner').removeClass()
          if (mensagem.trim() == "Salvo com Sucesso!!") {
              $('#fechaBanner').click();
              window.location = "index.php";
          } else { $('#msgBanner').addClass('text-danger') }
          $('#msgBanner').addClass('text-success');
          $('#msgBanner').text(mensagem);            
      },
      cache: false,
      contentType: false,
      processData: false,
      xhr: function () { 
          var myXhr = $.ajaxSettings.xhr();
          if (myXhr.upload) {
              myXhr.upload.addEventListener('progress', function () {
              }, false);
          }
          return myXhr;
      }
    });
  });

  $('#Salvar_Info').click(function(e){
    event.preventDefault();
    $.ajax({
      url: "EditInfos.php", 
      method:"post",
      data: $('form').serialize(),
      dataType: "text",
      success: function(Alert){
        if(Alert.trim() === 'Salvo com Sucesso!'){
            $('#FechaInfo').click();
            window.location='index.php';
        }
        else{
            $('#msgInfos').addClass('text-danger');
            $('#msgInfos').text(Alert); 
        }
      }
    })
  });

  $("#form_sobre").submit(function () {
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: "EditSobre.php",
        type: 'POST',
        data: formData,
        success: function (mensagem) {
            $('#msgSobre').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso!") {
                $('#FechaSobre').click();
                window.location = "index.php";
            } else {$('#msgSobre').addClass('text-danger')}
            $('#msgSobre').text(mensagem)
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function () { 
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { 
                myXhr.upload.addEventListener('progress', function () {
                }, false);
            }
            return myXhr;
        }
    });
  });

  $('#Delete_Comment').click(function (event) {
    event.preventDefault();
    $.ajax({
      url: "excluiCmt.php",
      method: "post",
      data: $('form').serialize(),
      dataType: "text",
      success: function (mensagem){
        if (mensagem.trim() === 'Excluído com Sucesso!!') {
            $('#FechaComment').click();
            window.location = "index.php";
        }
        else{
          $('#msg_exclui_coment').addClass('text-danger');
          $('#msg_exclui_coment').text(Alert); 
        }
      },
    })
  });
 