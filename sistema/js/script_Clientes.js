function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }else {
        target.src = "";
    }
}

function carregarFT() {
    var target = document.getElementById('TargetIMG');
    var file = document.querySelector(".TargetIMGct").files[0];
    var reader = new FileReader();
    reader.onloadend = function () { target.src = reader.result; };
    if (file){ reader.readAsDataURL(file);
    } else { target.src = ""; }
}


document.getElementById("Key_User").onclick = function() {showPass()};
function showPass(){  
    var tipagem = document.getElementById('senha_client');
    if(tipagem.type === "password"){
        tipagem.type = "text";
    }else{
        tipagem.type = "password";
    }  
}