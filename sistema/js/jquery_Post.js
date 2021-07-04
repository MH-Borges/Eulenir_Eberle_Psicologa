$("#form").submit(function () {
    var pag = "posts";
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

$("#form_tags").submit(function () {
    var pag = "posts";
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: pag + "/inserir_tag.php",
        type: 'POST',
        data: formData,
        success: function (mensagem) {
            $('#mensagem_tags').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso!!") {
                $('#btn_fechar_tags').click();
                window.location = "index.php?pag="+pag+"&funcao=modal_tags";
            } else {$('#mensagem_tags').addClass('text-danger')}
            $('#mensagem_tags').text(mensagem)
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});

$(document).ready(function () {
    var pag = "posts";
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
                    window.location = "index.php?pag=" + pag;
                }
            },
        })
    });
});

$(document).ready(function () {
    var pag = "posts";
    $('#btn_deletar_tags').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: pag + "/excluir_tag.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (mensagem){
                if (mensagem.trim() === 'Excluído com Sucesso!!') {
                    $('#btn_cancelar_excluir_tags').click();
                    window.location = "index.php?pag="+pag+"&funcao=modal_tags";
                }
                $('#mensagem_excluir').text(mensagem)
            },
        })
    });
});

$(document).ready(function () {
    var pag = "posts";
    $('#btn-ativa').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: pag + "/ativa.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (mensagem){
                if (mensagem.trim() === 'Ativado com Sucesso!!') {
                    $('#btn-cancelar-ativa').click();
                    window.location = "index.php?pag=" + pag;
                }
                $('#msg_ativa').text(mensagem);
            },
        })
    });
});

$(document).ready(function () {
    var pag = "posts";
    $('#btn-desativa').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: pag + "/desativa.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (mensagem){
                if (mensagem.trim() === 'Desativado com Sucesso!!') {
                    $('#btn-cancelar-desativa').click();
                    window.location = "index.php?pag=" + pag;
                }
            },
        })
    });
});
