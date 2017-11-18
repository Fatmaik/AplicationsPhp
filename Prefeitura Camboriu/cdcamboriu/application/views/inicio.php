<a href="<?php echo base_url('home/inicio')?>"><img id="bandeira" src="<?php echo base_url('/assets/images/bandeira1.png')?>" alt=""></a>

<div id="div_btns">
    <?php if($_SESSION['nivel'] >= 3):?>
        <a href="cad_diaria"><button id="bnt_cadastro"> Cadastrar Diaria</button></a>
        <a href="cad_ufm"><button id="bnt_cadastro"> Cadastrar UFM</button></a>
    <?php endif;?>
</div>

<legend>Pesquisar Diarias por servidor</legend>

<form action="" id="pesquisas" method="POST">
    <select name="nome_servidor" id="Ramo do fornecedor">
        <option value="">Servidor</option>
        <?php foreach($diarias_nome as $info):?>
            <option value="<?php echo $info["servidor"];?>"><?php echo $info["servidor"];?></option>
        <?php endforeach;?>
    </select><br><br><br>
    
    <select name="mes_diaria" id="mes_selecionado" >
        <option value="">Mes opcional</option>
            <option value='2017-01-01'>Janeiro</option>
            <option value='2017-02-01'>Fevereiro</option>
            <option value='2017-03-01'>Março</option>
            <option value='2017-04-01'>Abriu</option>
            <option value='2017-05-01'>Maio</option>
            <option value='2017-06-01'>Junho</option>
            <option value='2017-07-01'>Julho</option>
            <option value='2017-08-01'>Agosto</option>
            <option value='2017-09-01'>Setembro</option>
            <option value='2017-10-01'>Outubro</option>
            <option value='2017-11-01'>Novembro</option>
            <option value='2017-12-01'>Dezembro</option>
    </select><br><br>

   <a href="/home/inicio"><button style='margin-left:10px;margin-top:1vmin'>Pesquisar</button> </a>
</form><br>

<?php if(isset($filtro_gastos)):?>
<?php foreach ($filtro_gastos as $info):?>
<legend><?php if($info['Total'] != ''){echo $relatorio_diaria . ': R$ '. $info['Total'];}else{echo 'Este servidor não obteve diária no mês selecionado';}?></legend><br>
<?php endforeach; endif?>

<table>
    <tr>
        <th>Nome do Servidor</th>
        <th>Destino</th>
        <th>Cidade</th>
        <th>Data de Saída</th>
        <th>Data de Retorno</th>
        <th>Valor Diária</th>
        <th>Total de Horas/Dias</th>
    </tr>
    <?php foreach($diarias as $info): ?>
    <tr>
        <td><?php echo $info['servidor']; ?></td>
        <td><?php echo $info['estado_destino']; ?></td>
        <td><?php echo $info['cidade_destino']; ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_saida'])); ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_retorno'])); ?></td>
        <td>R$ <?php echo $info['valor_total']; ?></td>
        <td><?php echo $info['tempo_total']; ?></td>
        <td>
        <?php 
            if($_SESSION['nivel'] == 5 && $info['confirmacao'] != "s"):
                echo"<form action='' method='POST' id='retornar' name='id_diaria'>
                    <button value=".$info["id_diaria"]." name='id_diaria'>Confirmado</button>
                    </form>";
            endif
        ?>
        </td>
        <td>
        <?php
            if($_SESSION['nivel'] == 5 && $info['confirmacao'] != "s"):
                echo"<form action='' method='POST' id='retornar'>
                    <button value=".$info["id_diaria"]." name='id_cancel_diaria'>Cancelado</button>
                    </form>";
            endif
        ?>
        </td>
    </tr>
    <?php endforeach; ?>
    
</table><br><br>

<nav>
    <ul>
        <li>
            <a href="home/inicio?pagina=0" aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>
        </li>
    </ul>
    <?php
        for ($i=0; $i < $num_paginas; $i++) { 
            $estilo = '';
            if ($pagina == $i) {
                $estilo = 'class=\"active"';
            ?>
            <li <?php echo $estilo; ?>><a href="home/inicio/?pagina=<?php echo $i; ?>"></a> </li><?php echo $i+1; ?></a></li>
            <?php }?>
            <li <?php echo $estilo;?>>
                <a href="home/inicio?pagina=<?php echo $num_paginas-1;?>" aria-label='Next'><span aria-hidden='true'>&raquo;</span> </a>
            </li>
        }
</nav>

<legend>UFMS Agente Potico</legend><br>
<table>
    <tr>
        <th>Nome do Servidor</th>
        <th>Destino</th>
        <th>Cidade</th>
        <th>Data de Saída</th>
        <th>Data de Retorno</th>
        <th>Ufm</th>
        <th>Ufm Convertido</th>
        <th>Total de Horas/Dias</th>
    </tr>
    <?php foreach($ufm as $info): ?>
    <tr>
        <td><?php echo $info['servidor']; ?></td>
        <td><?php echo $info['estado_destino']; ?></td>
        <td><?php echo $info['cidade_destino']; ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_saida'])); ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($info['data_retorno'])); ?></td>
        <td><?php echo $info['ufm']; ?></td>
        <td>R$ <?php echo $info['valor_total']; ?></td>
        <td><?php echo $info['tempo_total']; ?></td>
        <td>
        <?php 
            if($_SESSION['nivel'] == 5 && $info['confirmacao'] != "s"):
                echo"<form action='' method='POST' id='retornar'>
                    <button value=".$info["id_ufm"]." name='id_confirm_ufm'>Confirmado</button>
                    </form>";
            endif
        ?>
        </td>
        <td>
        <?php 
            if($_SESSION['nivel'] == 5 && $info['confirmacao'] != "s"):
                echo"<form action='' method='POST' id='retornar'>
                    <button value=".$info["id_ufm"]." name='id_cancel_ufm'>Cancelado</button>
                    </form>";
            endif
        ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table><br>

<!-- 
<legend>Resumo Geral de Gastos </legend>
<form action="" id="pesquisas" method="POST">
    <select name="mes" id="mes_selecionado" >
        <option value="">Mes opcional</option>
            <option value='2017-01-01'>Janeiro</option>
            <option value='2017-02-01'>Fevereiro</option>
            <option value='2017-03-01'>Março</option>
            <option value='2017-04-01'>Abriu</option>
            <option value='2017-05-01'>Maio</option>
            <option value='2017-06-01'>Junho</option>
            <option value='2017-07-01'>Julho</option>
            <option value='2017-08-01'>Agosto</option>
            <option value='2017-09-01'>Setembro</option>
            <option value='2017-10-01'>Outubro</option>
            <option value='2017-11-01'>Novembro</option>
            <option value='2017-12-01'>Dezembro</option>
    </select><br><br>
<a href=""><button>Pesquisar</button> </a>
</form> -->

<!-- <?php foreach ($gasto_diarias as $info):?>
<legend><?php if($info['Total'] != ''){echo $resultado . ': R$ '. $info['Total'];}else{echo 'Não existem diarias no mês selecionado';}?></legend><br>
<?php endforeach?> -->

<?php var_dump($paginacao);