function changeForms(forms) {
    let formsID = {
        "Acessar" : function changeModalLogin() {
            document.getElementById("divCadastrar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-93 w-96 rounded-sm shadow-2xl bg-pink-300/75 border-pink-500 shadow-pink-300")
            document.getElementById("divAcessar").setAttribute("class", "")
        },
        "Cadastrar" : function changeModalLogin() {
            document.getElementById("divAcessar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-120 w-96 rounded-sm shadow-2xl bg-pink-300/75 border-pink-500 shadow-pink-300")
            document.getElementById("divCadastrar").setAttribute("class", "")
        }
    }
    formsID[forms]();
}

function postar() {
    document.getElementById("divModalPostar").setAttribute("class", "");
}

function fechar() {
    document.getElementById("divModalPostar").setAttribute("class", "hidden");
}