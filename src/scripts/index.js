function changeForms(forms) {
    let formsID = {
        "Acessar" : function changeModalLogin() {
            document.getElementById("divCadastrar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-96 w-96 rounded-sm shadow-2xl bg-amber-300 border-amber-500 shadow-amber-500")
            document.getElementById("divAcessar").setAttribute("class", "")
        },
        "Cadastrar" : function changeModalLogin() {
            document.getElementById("divAcessar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-120 w-96 rounded-sm shadow-2xl bg-amber-300 border-amber-500 shadow-amber-500")
            document.getElementById("divCadastrar").setAttribute("class", "")
        }
    }
    formsID[forms]();
}