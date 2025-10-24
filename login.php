<?php 
    if(isset($_POST['sbmCadastrar'])){

    }






?>

<!DOCTYPE html>
<html class="min-h-dvh m-0">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Testes</title>
    <link href="./src/css/output.css" rel="stylesheet">
    <script src="./src/scripts/index.js"></script>
</head>
<body style="min-height: 100vh; margin: 0; background: linear-gradient(to right, #F8FAB4, #FEE2AD, #FFC7A7, #F08787);">

	<header>

	</header>
	<main class="">
        <div class="flex items-center justify-center min-h-dvh">
            <div id="divModalLogin" class="h-93 w-96 rounded-sm shadow-2xl bg-pink-300 border-pink-500 shadow-pink-500">
                <div class="flex justify-center">
                    <div class="flex justify-center w-full">
                        <input type="button" name="btnAcessar" value="Acessar" class="border rounded-2xl text-2xl px-10.5 mt-4 bg-amber-50 border-amber-500" onclick="changeForms('Acessar')">
                    </div>
                    <div class="flex justify-center w-full">
                        <input type="button" name="btnCadastrar" value="Cadastrar" class="border rounded-2xl text-2xl px-8 mt-4 bg-amber-50 border-amber-500" onclick="changeForms('Cadastrar')">
                    </div>
                </div>
                <div id="divAcessar" class="">
                        <div class="flex justify-center py-4">
                            <h1 class="text-5xl">Acessar</h1>
                        </div>
                    <form class="" action="" method="">
                        <div class="px-4">
                            <label class="block text-xl py-4" for="email-xl py-7" >Email:</label>
                            <input type="email py-4" name="txtEmail" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                            <label class="block text-xl py-4" for="password">Senha:</label>
                            <input type="password py-4" name="txtSenha" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                        </div>
                        <div class="flex justify-end pr-4 py-4">
                            <input type="submit" name="sbmAcessar" value="Acessar" class="border rounded-2xl p-1 px-3 bg-amber-50 border-amber-500">
                        </div>
                    </form>
                </div>
                <div id="divCadastrar" class="hidden">
                    <div class="flex justify-center py-4">
                        <h1 class="text-5xl">Cadastrar</h1>
                    </div>
                    <form class="" action="login.php" method="">
                        <div class="px-4">
                            <label for="nome" class="block text-xl py-4">Nome:</label>
                            <input type="text" name="txtNome" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                            <label for="email" class="block text-xl py-4">Email:</label>
                            <input type="email" name="txtEmail" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                            <label for="senha" class="block text-xl py-4">Senha:</label>
                            <input type="password" name="txtSenha" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                        </div>
                        <div class="flex justify-end pr-4 py-4">
                            <input type="submit" name="sbmCadastrar" value="Cadastrar" class="border p-1 rounded-2xl bg-amber-50 border-amber-500">
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</main>
	<footer>
		
	</footer>
</body>
</html>