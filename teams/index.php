<?php
include('../php/config.php');
if($_POST){
    if(isset($_POST['submit-jogador'])){
        CadastroJogador($_POST['name-jogador'], $_POST['select-posicao'], $_GET['team']);
    }else if(isset($_POST['submit-search'])){
        header('Location: ?team='.$_POST['search-team']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <p>Times</p>
        <a href="../"><img src="../imgs/voltar-icon.png" alt="Icone de configuração" width="50px"></a>
    </header>
    <main>
        <section>
            <form method="POST">
                <div id="search">
                    <select name="search-team" id="search-team" class="select">
                        <?php
                            $query = "SELECT * FROM grupo";
                            $res = $GLOBALS['conn']->query($query);
                            foreach($res as $row){
                                echo '<option value="'.$row['cd'].'">'.$row['nome'].'</option>';
                            }
                        ?>
                    </select>
                    <button name="submit-search">Pesquisar</button>
                </div>
                <hr>
                <div id="div-total">
                    <div id="div-left">
                        <h2>Novo jogador:</h2>
                        <div>
                            <label for="name-jogador" class="label">Nome:</label>
                            <input type="text" class="input" name="name-jogador" id="name-jogador">
                        </div>
                        <div>
                            <label for="select-posicao" class="label">Posição:</label>
                            <select name="select-posicao" id="select-posicao" class="select">
                                <?php
                                    $query = "SELECT po.cd, po.nome FROM posicao AS po, grupo AS gr WHERE po.esporte = gr.esporte AND gr.cd = ".$_GET['team'].";";
                                    $res = $GLOBALS['conn']->query($query);
                                    foreach($res as $row){
                                        echo '<option value="'.$row['cd'].'">'.$row['nome'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            <button name="submit-jogador" class="button">Cadastrar</button>
                        </div>
                    </div>
                    <div id="div-right">
                        <h2>Lista de jogadores:</h2>
                        <?php
                            $query = 'SELECT jo.nome AS jogador, po.nome AS posicao FROM jogador AS jo, posicao AS po WHERE jo.posicao = po.cd AND jo.grupo = '.$_GET['team'];
                            $res = $GLOBALS['conn']->query($query);
                            foreach($res as $row){
                                echo '<p>'.$row['jogador'].' - '.$row['posicao'].'</p>';
                            }
                        ?>
                    </div>
                </div>
            </form>            
        </section>
    </main>
    <footer>
        <p>&copy; Todos direitos reservados!</p>
    </footer>
</body>
</html>