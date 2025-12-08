window.onload = function () {   
    localStorage.setItem("usuario", "");

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/

    document.getElementById("formLogin").addEventListener("submit", function(event){
        event.preventDefault()

        const formData = new FormData(this)
        const dados = {
            email: formData.get("txtEmail"),
            senha: formData.get("txtSenha"),
            tipo: 'login',
            usuario: localStorage.getItem("usuario")
        }

        if (!emailRegex.test(dados.email)) {
            alert("Insira um email válido.")
            return
        }

        if (dados.senha.length < 8 || dados.senha.length > 20) {
            alert("Senha inválida.")
            return
        }

        fetch("./login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {          
            if (data.sucesso) {
                window.location.href = "home.php";
            }

            this.reset()
            alert(data.mensagem)
        })
        .catch(error => console.error("Vacilou, parceria: ", error))
    })

    document.getElementById("formCadastro").addEventListener("submit", function(event){
        event.preventDefault()

        const formData = new FormData(this)
        const dados = {
            nome: formData.get("txtNome"),
            email: formData.get("txtEmail"),
            rm: formData.get("txtRm"),
            senha: formData.get("txtSenha"),
            confSenha: formData.get("txtConfSenha"),
            tipo: 'cadastro'
        }

        const nomeRegex = /^[A-zÀ-ú '´]+$/
        if(!nomeRegex.test(dados.nome)) {
            alert("Insira um nome válido.")
            return
        }

        if (!emailRegex.test(dados.email)) {
            alert("Insira um email válido.")
            return
        }

        const rmRegex = /^[0-9]+$/
        if (!rmRegex.test(dados.rm)) {
            alert("Insira um registro de matrícula válido.")
            return
        }

        if (dados.senha != dados.confSenha) {
            alert("As senhas não coincidem.")
            return
        }
        if (dados.senha.length < 8 || dados.senha.length > 20) {
            alert("Insira uma senha com no mínimo 8 e máximo 20 caracteres.")
            return
        }

        fetch("./login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dados)
        })
        .then(response => response.json())
        .then(data => {
            this.reset()
            localStorage.setItem("usuario", data.usuario)
            alert(data.mensagem)
        })
        .catch(error => console.error("Vacilou, parceria: ", error))
    })
}

function changeModal(modal) {
    switch (modal) {
        case "mdlAcessar":
            document.getElementById("divCadastrar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-93 w-96 rounded-sm shadow-2xl bg-pink-300 border-pink-500 shadow-pink-500")
            document.getElementById("divAcessar").setAttribute("class", "")
        break;
        case "mdlCadastrar":
            document.getElementById("divAcessar").setAttribute("class", "hidden")
            document.getElementById("divModalLogin").setAttribute("class", "h-133 w-96 rounded-sm shadow-2xl bg-pink-300 border-pink-500 shadow-pink-500")
            document.getElementById("divCadastrar").setAttribute("class", "")
        break;
    }
}