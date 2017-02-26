<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>addScore</title>
    <link rel="stylesheet" href="css/addScore.css">
</head>
<body>
    <?php
    require_once 'header.php';
    require_once 'conexao.php';

    if(isset($_POST["submit"])) {
        $name = addslashes($_POST["name"]);
        $score = addslashes($_POST["score"]);
        $print = $_FILES["prints"];
        
        // armazenar nome da imagem em uma var para o INSERT ser concluido sem erro
        // o nome esta recevendo varios tipos de unificaçao como md5 e time()
        $imgName = md5($print['name']) . time() . $print['name']; 
        
        // Condicao para informar que nao foram informados os dados do Score
        if(!empty($name) && !empty($score) && !empty($print)) {

            // select nome e score para comparar , logo abaixo
            $sql = $pdo->query("SELECT * FROM guitars WHERE nome='$name' AND score='$score'");
            // recevendo o nome e score para comparacao da existencia do mesmo nome com a mesma pontuacao
            foreach($sql->fetchAll() as $info) {
                $n = $info["nome"];
                $s = $info["score"];
            }
            // variaveis globais para que a o codigo abaixo consiga acessar o valor de nome e score armazenados no DB    
            global $n;
            global $s;
        
            if(isset($name) == $n && isset($score) == $s) {
                echo "<p class='p'>Impossivel Cadastrar A mesma Pontuacao</p>";
            }else{
                // tipos de arquivos aceitos no cadastro do Score
                $jpeg = "image/jpeg";
                $png = "image/png";
                $jpg = "image/jpg";

                if($print['type'] == $jpeg || $print['type'] == $jpg || $print['type'] == $png ) {
                    // armazenando a imagen no diretorio escolhido
                    move_uploaded_file($print['tmp_name'], 'imagens/'.$imgName/*$print["name"]*/);
                    // e tambem no DB
                    $sql = $pdo->query("INSERT INTO guitars SET nome = '$name', score = '$score', screenshot = '$imgName' ");
                    
                    echo "<p class='p'>Done</p>";
                }else{
                    echo "<p class='p'>The Archive Must be jpg, jpeg or png</p>";
                }
            }
       }else{
            echo "<p class='p'>Inform your Name and Score</p>";
        }
    }
    ?>
    <article><br>
        <div id="form"><br>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Name" required><br><br>
                <input type="number" name="score" id="score" placeholder="Score" required><br><br>
                <label for="arquivo">Insert Your PrintScreen </label>
                <input type="file" name="prints" id="print" required><br><br>
                
                <input type="submit" name="submit" value="Send">
            </form>
        </div>
        <button class="button" type="button"><a href="index.php">Home</a></button>
    </article>
</body>
</html>