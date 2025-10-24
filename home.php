<?php
    require_once('./src/library/Post.php');
    require_once('./src/library/User.php');

    $users = [
        new User(1, 'Claudio', 'claudio@email.com', 'claudio123'),
        new User(2, 'Rodrigo', 'rodrigo@email.com', 'rodrigo123')
    ];
    #$claudio = new User(1, 'Claudio', 'claudio@email.com', 'claudio123');
    #$rodrigo = new User(2, 'Rodrigo', 'rodrigo@email.com', 'rodrigo123');

    if(isset($_POST['sbmPost'])){
        if(empty($_POST['txtaPost'])){
            header('Location: http://localhost/interdisciplinar/');
        }

        $userId = rand(0,1);

        $users[$userId]->setPostMk(
            new Post($_POST['txtaPost'], $users[$userId]->getName(), $users[$userId]->getId(), '')
        );

        header('Location: http://localhost/interdisciplinar/');
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
<body class="min-h-dvh m-0">
	<header>
        <div class="flex fixed left-0 top-0 justify-end w-3/10 h-screen bg-red-950">
            <div class="">
                HEADER
            </div>
        </div>
	</header>
	<main class="">
        <div id="divModalPostar" class="hidden">
            <div class="flex absolute items-center justify-center min-w-dvw min-h-dvh">
                <div class="w-1/4 min-h-128 rounded-sm shadow-2xl bg-amber-300 shadow-amber-500">
                    <div class="flex justify-end">
                        <input type="button" name="btnFecharModal" value="X" class="border rounded-2xl text-2xl m-4 px-10.5 bg-amber-50 border-amber-500" onclick="fechar()">
                    </div>
                    <form action="" method="POST" id="formPost" class="">
                        <label for="txtaPost" class="text-xl ml-5.5">Texto:</label>
                        <div class="flex justify-center mb-4">
                            <textarea name="txtaPost" form="formPost" maxlength="500" class="resize-none border w-88 h-64 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700"></textarea>
                        </div>
                        <label for="flArquivos" class="text-xl ml-6">Arquivos:</label>
                        <div class="flex justify-center mb-4">
                            <menu>
                                <input type="file" id="flArquivos" name="flArquivos" accept="image/*, .doc, .docx, .pdf" class="border w-88 rounded-sm focus:ring-2 focus:outline-none bg-amber-50 border-amber-500 focus:ring-amber-700" disabled/>
                            </menu>
                        </div>
                        <div class="flex justify-end align-bottom">
                            <input type="submit" name="sbmPost" value="Confirmar" class="border rounded-2xl m-4 p-1 px-3 bg-amber-50 border-amber-500">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="inline-block justify-center min-w-2/5 min-h-dvh bg-green-950">
                <div class="flex justify-end items-center w-full h-1/12 bg-pink-500">
                    <menu>
                        <input type="button" name="btnPostar" value="Postar" class="border rounded-2xl text-2xl m-4 px-10.5 bg-amber-50 border-amber-500" onclick="postar()">
                    </menu>
                </div>

                <div class="flex h-full bg-white">
                    <?php foreach($users as $user){ ?>
                        <?php foreach ($user->getPost() as $post) { ?>
                            <?php echo $post->getAutorName() ?>
                            <?php echo $post->getDate() ?>
                            <?php echo $post->getText() ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
	</main>
	<footer>
        <div class="flex fixed right-0 top-0 justify-start w-3/10 h-screen bg-blue-950">
            <div class="">
                FOOTER
            </div>
        </div>
	</footer>
</body>
</html>