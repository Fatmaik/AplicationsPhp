<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <link rel="stylesheet" href="Assets/css/headerPhp/estilo.css">
    <script src="../Assets/js/library/jquery.js"></script>
    <script src="../Assets/js/jsLV.js"></script>
</head>
<body>
    <header class="cadPed">
        <div class="pedidos">Meus Pedidos</div>
        <div class="cadastro">Meu Cadastro</div>
    </header>
    
    <section>
        <img class="logo" src="Assets/css/headerPhp/img/loja.png" alt="logo">
        
        <form action="$_GET" method="LV.php" class="campoBusca">    
            <input class="procura" type="text" placeholder="O que você procura?">    
            <input class="submit" type="image" src="../Assets/css/headerPhp/img/lupa.png" value="submit">              
        </form>
        <div id="carrinhoElogin">
            <img id="acount" src="../Assets/css/headerPhp/img/account-outline.png" alt=""><p id="Plogin">Login<br> e cadastro</p>
            <img id="carrinho" src="../Assets/css/headerPhp/img/cart-outline.png" alt=""> <p id="Pcarrinho">Carrinho<br>R$  </p>
        </div>
        <ul>   
            <li class="imgMed" id="tituloMedic"><img src="../Assets/css/headerPhp/img/medicamentos.png" alt=""width="35px"></li>
            <li id="medic">Medicamentos</li>   
            <li class="imgSau"><img src="../Assets/css/headerPhp/img/saude.png" alt="" width="53px"></li>
            <li id="saude">Saude</li>
            <li class="imgBel"><img src="../Assets/css/headerPhp/img/escova.png" alt="" width="37px"></li>
            <li id="beleza">Beleza</li>
        </ul>  
    </section>
    <article class="article">
        
            <div id="boxMedicamentos">
                <img src="../Assets/css/headerPhp/img/tituloMedic.png" alt="" >
                <hr>
                <p>Alergia</p>
                <p>Diabete</p>
                <p>Emagrecimento</p>
                <p>Inflamação</p>
                <p>Anestésico</p>
                <p>Gripes</p>
                <p>Resfriados</p>
                <p>Dor</p>
                <p>Febre</p>
            </div>
            <div id="boxSaude">
                <img src="../Assets/css/headerPhp/img/tituloSaude.png" alt="logosaude">
                <hr>
                <p>Nasal</p>
                <p>Lentes</p>
                <p>Suplementos</p>
                <p>Preservativos</p>
                <p>Dentadura</p>
                <p>Protetor</p>
            </div>
            <div id="boxBeleza">
                <img src="../Assets/css/headerPhp/img/tituloBeleza.png" alt="logoBeleza">
                <hr>
                <p>Cabelo</p>
                <p>Maquiagem</p>
                <p>Mâos</p>
                <p>Pés</p> 
                <p>Perfumes</p>
                <p>Tinturas</p>
            </div>
            <div id="hr"></div>    
       
    </article>
    <div id="loginCadastro">
        
        <div id="cadastro">
            <img src="../Assets/css/headerPhp/img/account-card-details.png" alt="cadastrar" width="50px">
            
            <form action="" id="form">
                <h2>QUERO ME CADASTRAR</h2>
                
                NOME COMPLETO <span>*</span><br><input id="nome" type="text" require><br><br>
                CPF <span>*</span><br><input id="cpf" type="number" require><br><br>
                EMAIL <span>*</span><br><input id="email" type="email" require><br><br>
                
                <div id="inputsenha">
                    SENHA <span>*</span><br>
                    <input class="inputArea" type="text" require><br><br>
                </div> 

                <div id="inputresenha">
                    CONFIRME A SENHA <span>*</span><br><input class="inputArea" type="text" require><br><br>
                </div> 

                <div id="inputTel">
                    TELEFONE <span>*</span><br><input class="inputArea" type="text" require><br><br>
                </div>  
                
                <div id="inputNasc">
                    DATA DE NASCIMENTO <span>*</span><br><input class="inputArea" type="text" require><br><br>
                </div>

                <div id="inputCidade">
                    CIDADE <span>*</span><br><input type="text" require class="inputArea">
                </div>

                <div id="inputSexo">
                    SEXO <span>*</span> <br clear>
                    <select name="sexo" id="sexo">                       
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div><br><br>
                
                <input id="cadastrar" type="submit" value="Cadastrar">
             </form>
        </div>
        
        <div id="login">
            
            <img src="../Assets/css/headerPhp/img/account-key.png" alt="login" width="50px">

            
            <form id="form2" action="">
                <h2>JA POSSUO MINHA CONTA</h2>
                <img id="closePag" src="../Assets/css/headerPhp/img/x1.png" alt="fechar pagina" width="30px">
                
                <label for="email">EMAIL</label>
                <input type="email"><br><br>
                
                <label for="senha">SENHA</label>
                <input type="text"><br><br><br>

                <input id="logar" type="submit" value="Logar">


            </form><br>
            <a href="">Esqueci a senha!</a>
        </div>
    </div>
</body>
</html>