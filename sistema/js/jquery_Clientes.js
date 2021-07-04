$("#form").submit(function () {
    var pag = "clientes";
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: pag + "/inserir.php",
        type: 'POST',
        data: formData,
        success: function (mensagem) {
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso!!") {
                $('#btn-fechar').click();
                window.location = "index.php?pag="+pag;
            } else {$('#mensagem').addClass('text-danger')}
            $('#mensagem').text(mensagem)
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

$(document).ready(function () {
    var pag = "clientes";
    $('#btn-deletar').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: pag + "/excluir.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (mensagem){
                if (mensagem.trim() === 'Excluído com Sucesso!!') {
                    $('#btn-cancelar-excluir').click();
                    window.location = "index.php?pag="+pag;
                }
                $('#mensagem_excluir').text(mensagem)
            },
        })
    })
});
