<?php

require_once 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <section>
        <h3>Criar uma nova conta</h3>
        <form method="post">
            <input type="text" name="nome" id="nome" required placeholder="Nome">
            <input type="text" name="sobrenome" id="sobrenome" required placeholder="Sobrenome"><br><br>
            <input type="email" name="email" id="email" required placeholder="Email"><br><br>
            <input type="email" name="reemail" id="reemail" required placeholder="Confirme o Email"><br><br>
            <input type="password" name="senha" id="senha" required placeholder="Senha">
            <h2><strong>Aniversario</strong></h2>
            <select name="dia" id="dia">
                <option value="dia">Dia</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select name="mes" id="mes">
                <option value="mes">Mes</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abriu</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
            <select name="ano" id="ano">
                <option>Ano</option>
                <?php
                for($i = 1900; $i <= date("Y"); $i++) {
                    echo "<option value=" . $i . ">" . $i . "</option>";
                }
                ?>
            </select><br><br>
            
            <input type="checkbox" name="feminino" value="F" />Feminino
            <input type="checkbox" name="masculino" value="M" id="span"  />Masculino<br><br>
            <input type="submit" name="submint" Value="Criar Conta" class="button">
        </form>
        <?php
        require_once 'conexao.php';
        require_once 'select.php';  

        // dados para cadastro da conta
        if(!empty($_POST["nome"])) {
            $nome = addslashes($_POST["nome"]);
            $sobrenome = addslashes($_POST["sobrenome"]);
            $email = addslashes($_POST["email"]);
            $reemail = addslashes($_POST["reemail"]);
            $senha = md5(addslashes($_POST["senha"]));
            
            $dia = $_POST["dia"]; $mes= $_POST["mes"]; $ano = $_POST["ano"];
            // data de nascimento formatada para cadastro no db
            $aniver = $ano."-".$mes."-".$dia;

            // selecao de genero
            if(isset($_POST["feminino"])) {
                $sexo = $_POST["feminino"];
            }elseif(isset($_POST["masculino"])) {
                $sexo = $_POST["masculino"];
            };

            // consulta se ja existe o email cadastrado no DB
            if($email == $selEmail) {
                echo "<p class='p'>Este email ja possue uma conta cadastrada</p>";
            }else{
                $query = $pdo->query("INSERT INTO mismatch_user SET firstName = '$nome', lastName = '$sobrenome', gender = '$sexo', birthdate = '$aniver', email = '$email', senha = '$senha' ");
                 echo "<p class='p'>Parabens Sua conta foi cadastrada</p>";

            }
        }else{
            echo "<p class='p'>Preencha os dados cadastrais</p>";
        }

        ?>
    </section>
    <footer>
        <div id="footer">Created By Dionathan

        </div>
    </footer>
</body>
</html>