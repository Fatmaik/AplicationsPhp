<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="css/adm.css">
</head>
<body>
    <form method="post">
        <table width="1400px">
            <tr class='tdHead'>
                <td>Name</td>
                <td>Score</td>
                <td>ScreenShot</td>
                <td>Aproved Score</td>
                <td>Aprove id</td>
                <td>Delete id</td>
            </tr>
        <?php    
            require_once 'conexao.php';
            // session recebe logado na pagina de acesso caso user e senha estiverem corretos;
            if($_SESSION["logado"] != TRUE) {
                header('Location: acesso.php');
            }
            
            echo "<h1>GUITAR WARS HIGHT SCORE - ADMINISTRATION</h1><br>";
            echo "<h3>Display Designed To Admin Only</h3><hr>";

            $sql = $pdo->query("SELECT * FROM guitars");

            foreach($sql->fetchAll() as $info) {
                // $nome = $info['nome'];
                $id = $info['id'];
                echo "<tr>";
                echo "<td>" . $info['nome'] . "</td>";
                echo "<td>" . $info['score'] . "</td>";
                echo "<td>" . $info['screenshot'] . "</td>";
                
                echo "<td>" . $info['aproved'] . "</td>";
                echo "<td><input type='submit' name='aprove' value='$id' ></td>";
                echo "<td><input type='submit' name='sub' value='$id'></td>";
                echo "</tr>";
            }

            // condition to remove Scores from DB
            if(isset($_POST["sub"])) {
                // $sub e o valor de id que esta armazenado no value do submit logo acima
                $sub = $_POST["sub"];
                $pdo->query("DELETE FROM guitars WHERE id='$sub' ");
                
                header("Location: admin.php");
            }
            // condition to aprove the Score to insert on index.php
            if(isset($_POST["aprove"])) {
                $apr = $_POST["aprove"];
                $pdo->query("UPDATE guitars SET aproved = 'Aprovado' WHERE id= '$apr' ");
                header("Location: admin.php");
            }
        
        ?>
         </table>
    </form>
</body>
</html>

