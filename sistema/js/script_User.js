function carregarImgBanner() {
    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();
    reader.onloadend = function () { target.src = reader.result; };
    if (file){ reader.readAsDataURL(file);
    } else { target.src = ""; }
}

function carregarImg() {
    var target = document.getElementById('targetPerfil');
    var file = document.querySelector(".TargetIMGPerfil").files[0];
    var reader = new FileReader();
    reader.onloadend = function () { target.src = reader.result; };
    if (file){ reader.readAsDataURL(file);
    } else { target.src = ""; }
}

document.getElementById("mostraSn").onclick = function() {showPass()};
function showPass(){  
    var tipagem = document.getElementById('SenhaInfo');
    if(tipagem.type === "password"){ tipagem.type = "text"; }
    else{ tipagem.type = "password"; }
}
document.getElementById("ConfSn").onclick = function() {showPassConf()};
function showPassConf(){  
    var tipagem = document.getElementById('ConfSenha');
    if(tipagem.type == "password"){ tipagem.type = "text"; }
    else{ tipagem.type = "password"; }
}