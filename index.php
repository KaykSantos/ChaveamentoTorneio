<?php
include('php/config.php');
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
        <p>CHAVEAMENTO</p>
        <div id="icons">
            <a href="teams/?team=1"><img src="imgs/team-icon.png" alt="Icone de time" height="40px"></a>
            <?php
                $query = "SELECT * FROM grupo;";
                $res = $GLOBALS['conn']->query($query);
                $rows = mysqli_num_rows($res);
                if($rows >= 1){
                    echo '<a href="config/"><img src="imgs/config-icon.png" alt="Icone de configuração" height="40px"></a>';
                }
            ?>        
        </div>
    </header>
    <main>
        <?php
            $query = "SELECT * FROM torneio;";
            $res = $GLOBALS['conn']->query($query);
            $rows = mysqli_num_rows($res);
            if($rows >= 1){
                echo "
                <div class='torneio'>
                </div>";
            }else{
                echo "<h1>Não há torneios cadastrados!</h1>";
            }
        ?>  
    </main>
    <footer>
        <p>&copy; Todos direitos reservados!</p>
    </footer>
</body>
</html>