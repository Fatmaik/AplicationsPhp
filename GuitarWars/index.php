<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <?php
    require_once 'header.php';
    ?>
    <article><br>
        <div id="index">
            <h3>
                <b>Welcome, Guitar Warrior, do you have what it takes to crack the high score list?<br>
                If so, just add your own score.</b>
            <p class="melhores">Here the List of the 10 Betters</p></h3>
            <a class="button" href="addScore.php">Add Score</a>
            <h4 class="champ">The Better Guitar Warrior is:</h4>
            
            <?php
            require_once 'conexao.php';
            
            // only displayed if de adm have aproved the score
            $sel = $pdo->query("SELECT * FROM guitars WHERE aproved = 'Aprovado' ORDER BY score DESC, date ASC   ");
            

            foreach($sel->fetchAll() as $i => $info) {
                // count to display the positions and better scores
                $i = $i + 2; 
                $img = $info['screenshot'];
                echo "<br><p class='melhor'><span>Nome: ";
                echo $info["nome"] . "<br>";
                echo "Score: " . $info["score"] . "</span><br>";
                echo '<img src=imagens/'. $img .' width="130px"><br>';
                echo "Date: </td></tr>" . $info["date"] . "</p><br>";
                  
                // lista dos 10 melhores 
                if($i == 11) {
                    break;
                }
                echo "<h4 class='champ'>".$i. " Place </h4>";
            }
            ?>
            
            
        </div>
    </article>
    
</body>
</html>