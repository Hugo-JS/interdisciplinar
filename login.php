<?php
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    session_destroy();

    $json = file_get_contents('php://input');

    if(!empty($json)){
        header('Content-Type: application/json');

        $dados = json_decode($json);

        if (
            isset($dados) &&
            isset($dados->nome) &&
            isset($dados->email) &&
            isset($dados->rm) &&
            isset($dados->senha) &&
            isset($dados->confSenha) &&
            isset($dados->tipo) &&
            $dados->tipo == 'cadastro'
        ) {
            $nome = htmlspecialchars($dados->nome);
            $nomeRegex = "/[A-zÀ-ú '´]+/i";
            if (!preg_match_all($nomeRegex, $nome)) {
                $resposta = ['sucesso' => false, 'mensagem' => 'Nome inválido, contate o suporte.'];
                http_response_code(406); //Not Acceptable
                echo json_encode($resposta);
                exit;
            }

            $email = htmlspecialchars($dados->email);
            $emailRegex = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/i";
            if (!preg_match_all($emailRegex, $email)) {
                $resposta = ['sucesso' => false, 'mensagem' => 'Email inválido, contate o suporte.'];
                http_response_code(406); //Not Acceptable
                echo json_encode($resposta);
                exit;
            }

            $rm = htmlspecialchars($dados->rm);
            $rmRegex = "/\d/";
            if (!preg_match_all($rmRegex, $rm)) {
                $resposta = ['sucesso' => false, 'mensagem' => 'Registro de matrícula inválido, contate o suporte.'];
                http_response_code(406); //Not Acceptable
                echo json_encode($resposta);
                exit;
            }

            $senha = htmlspecialchars($dados->senha);
            $confSenha = htmlspecialchars($dados->confSenha);
            if ($senha != $confSenha) {
                $resposta = ['sucesso' => false, 'mensagem' => 'As senhas não coincidem.'];
                http_response_code(406); //Not Acceptable
                echo json_encode($resposta);
                exit;
            }
            if (strlen($senha) < 8 || strlen($senha) > 20) {
                $resposta = ['sucesso' => false, 'mensagem' => 'Insira uma senha com no mínimo 8 e máximo 20 caracteres.'];
                http_response_code(406); //Not Acceptable
                echo json_encode($resposta);
                exit;
            }

            /*require_once('./src/library/Usuario.php');

            $usuario = new Usuario(
                1, //ID
                $nome, //NOME
                $email, //EMAIL
                $rm, //RM
                $senha //SENHA
            );*/

            $usuario = [
                'id' => 1,
                'nome' => $nome,
                'email' => $email,
                'rm' => $rm,
                'senha' => $senha
            ];

            $resposta = [
                'sucesso' => true,
                'mensagem' => "Usuário cadastrado.",
                'usuario' => json_encode($usuario)
            ];
            http_response_code(201); //Created
        }

        if (
            isset($dados) &&
            isset($dados->email) &&
            isset($dados->senha) &&
            isset($dados->tipo) &&
            $dados->tipo == 'login' &&
            isset($dados->usuario)
        ) {
            $usuario = json_decode($dados->usuario);

            $email = htmlspecialchars($dados->email);
            $senha = htmlspecialchars($dados->senha);

            if (isset($usuario) && $email == $usuario->email && $senha == $usuario->senha) {             
                session_start();
                $_SESSION['usuario'] = $usuario;

                $resposta = [
                    'sucesso' => true,
                    'mensagem' => 'teste'
                ];

                http_response_code(201); //Created
                echo json_encode($resposta);
                exit;
            }

            $resposta = [
                'sucesso' => false,
                'mensagem' => 'Verifique as informações inseridas. (Login)'
            ];
            http_response_code(400); //Bad Request
        }

        if (
            !isset($dados) ||
            $dados->tipo != 'cadastro' &&
            $dados->tipo != 'login'
        ) {
            $resposta = [
                'sucesso' => false,
                'mensagem' => 'Verifique as informações inseridas. (Vazio)'
            ];
            http_response_code(400); //Bad Request
        }

        echo json_encode($resposta);

        exit;
    }
?>

<!DOCTYPE html>
<html class="min-h-dvh m-0">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Testes</title>
    <link href="./src/css/output.css" rel="stylesheet">
    <script src="./src/scripts/login.js"></script>
</head>
<body style="min-height: 100vh; margin: 0; background: linear-gradient(to right, #F8FAB4, #FEE2AD, #FFC7A7, #F08787);">

	<header>

	</header>
	<main class="">
        <div class="flex items-center justify-center min-h-dvh">
            <div id="divModalLogin" class="h-93 w-96 rounded-sm shadow-2xl bg-pink-300 border-pink-500 shadow-pink-500">
                <div class="flex justify-center">
                    <div class="flex justify-center w-full">
                        <input type="button" name="btnAcessar" value="Acessar" class="border rounded-2xl text-2xl px-10.5 mt-4 bg-amber-50 border-amber-500" onclick="changeModal('mdlAcessar')">
                    </div>
                    <div class="flex justify-center w-full">
                        <input type="button" name="btnCadastrar" value="Cadastrar" class="border rounded-2xl text-2xl px-8 mt-4 bg-amber-50 border-amber-500" onclick="changeModal('mdlCadastrar')">
                    </div>
                </div>
                <div id="divAcessar" class="">
                    <div class="flex justify-center py-4">
                        <h1 class="text-5xl">Acessar</h1>
                    </div>
                    <form id="formLogin" class="">
                        <div class="px-4">
                            <label class="block text-xl py-4" for="email-xl py-7">Email:</label>
                            <input type="text" name="txtEmail" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                            
                            <label class="block text-xl py-4" for="password">Senha:</label>
                            <input type="password" name="txtSenha" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
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
                    <form id="formCadastro" class="">
                        <div class="px-4">
                            <div class="mb-4">
                                <div class="">
                                    <label for="txtNome" class="text-xl">Nome:</label>
                                    <input type="text" name="txtNome" class="border w-88 line-clamp-5 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div>
                                    <label for="txtEmail" class="text-xl">Email:</label>
                                    <input type="text" name="txtEmail" class="border w-88 rounded-sm invalid:border-pink-500 invalid:text-pink-600 focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div>
                                    <label for="txtRm" class="text-xl">Registro de Matrícula:</label>
                                    <input type="text" name="txtRm" class="border w-88 rounded-sm invalid:border-pink-500 invalid:text-pink-600 focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div>
                                    <label for="txtSenha" class="text-xl">Senha:</label>
                                    <input type="password" name="txtSenha" class="border w-88 rounded-sm invalid:border-pink-500 invalid:text-pink-600 focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div>
                                    <label for="txtConfSenha" class="text-xl">Confirme a Senha:</label>
                                    <input type="password" name="txtConfSenha" class="border w-88 rounded-sm invalid:border-pink-500 invalid:text-pink-600 focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700">
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-end">
                                    <input type="submit" name="sbmCadastrar" value="Cadastrar" class="border p-1 rounded-2xl bg-amber-50 border-amber-500">
                                </div>
                            </div>
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