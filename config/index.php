<?php
include('../php/config.php');
if($_POST){
    if(isset($_POST['submit-torneio'])){
        CadastroTorneio($_POST['name-torneio']);
    }else if(isset($_POST['submit-esporte'])){
        CadastroEsporte($_POST['name-esporte']);
    }else if(isset($_POST['submit-posicao'])){
        CadastroPosicao($_POST['name-posicao'], $_POST['select-posicao']);
    }else if(isset($_POST['submit-time'])){
        CadastroTime($_POST['name-time'], $_POST['select-esporte-time']);
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
        <p>Cadastros</p>
        <a href="../"><img src="../imgs/voltar-icon.png" alt="Icone de configuração" width="50px"></a>
    </header>
    <main>
        <form method="POST">
            <div class="card">
                <h2>Novo torneio:</h2>
                <div>
                    <label for="name-torneio" class="label">Nome:</label>
                    <input type="text" name="name-torneio" class="input" id="name-torneio">
                </div>
                <div>
                    <button name="submit-torneio">Cadastrar</button>
                </div>
            </div>
            <hr>
            <div class="card">
                <h2>Novo esporte:</h2>
                <div>
                    <label for="name-esporte" class="label">Nome:</label>
                    <input type="text" class="input" name="name-esporte" id="name-esporte">
                </div>
                <div>
                    <button name="submit-esporte">Cadastrar</button>
                </div>
            </div>
            <hr>
            <div class="card">
                <h2>Nova posição:</h2>
                <div>
                    <label for="name-posicao" class="label">Nome:</label>
                    <input type="text" class="input" name="name-posicao" id="name-posicao">
                </div>
                <div>
                    <label for="select-posicao" class="label">Esporte:</label>
                    <select name="select-posicao" id="select-posicao" class="select">   
                        <?php
                            $query = "SELECT * FROM esporte";
                            $res = $GLOBALS['conn']->query($query);
                            foreach($res as $row){
                                echo '<option value="'.$row['cd'].'">'.$row['nome'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <button name="submit-posicao">Cadastrar</button>
                </div>
            </div>
            <hr>
            <div class="card">
                <h2>Novo time:</h2>
                <div>
                    <label for="name-time" class="label"></label>
                    <input type="text" class="input" name="name-time" id="name-time">
                </div>
                <div>
                    <label for="select-esporte-time" class="label">Esporte:</label>
                    <select name="select-esporte-time" id="select-esporte-time" class="select">
                        <?php
                            $query = "SELECT * FROM esporte";
                            $res = $GLOBALS['conn']->query($query);
                            foreach($res as $row){
                                echo '<option value="'.$row['cd'].'">'.$row['nome'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <button name="submit-time">Cadastrar</button>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; Todos direitos reservados!</p>
    </footer>
</body>
</html>