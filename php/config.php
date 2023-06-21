<?php
session_start();

DEFINE("DB", "chaveamento");
DEFINE("USER", "root");
DEFINE("PASS", "");
DEFINE("HOST", "localhost");

$conn = mysqli_connect(HOST, USER, PASS, DB) or die ("Não foi possível se conectar ao banco!");

function CadastroTorneio($name){
    $query = "INSERT INTO torneio VALUES (null, '$name');";
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo '<script>alert("Cadastro realizado")</script><meta http-equiv="refresh" content="0.1;url=../config"> </meta>';
    }
}

function CadastroEsporte($name){
    $query = "INSERT INTO esporte VALUES (null, '$name');";
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo '<script>alert("Cadastro realizado")</script><meta http-equiv="refresh" content="0.1;url=../config"> </meta>';
    }
}

function CadastroPosicao($name, $esporte){
    $query = "INSERT INTO posicao VALUES (null, '$name', $esporte);";
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo '<script>alert("Cadastro realizado")</script><meta http-equiv="refresh" content="0.1;url=../config"> </meta>';
    }
}

function CadastroTime($name, $esporte){
    $query = "INSERT INTO grupo VALUES (null, '$name', $esporte);";
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo '<script>alert("Cadastro realizado")</script><meta http-equiv="refresh" content="0.1;url=../config"> </meta>';
    }
}

function CadastroJogador($name, $posicao, $grupo){
    $query = "INSERT INTO jogador VALUES (null, '$name', $posicao, $grupo)";
    $res = $GLOBALS['conn']->query($query);
    if($res){
        echo '<script>alert("Cadastro realizado")</script><meta http-equiv="refresh" content="0.1;url=../teams/?team='.$grupo.'"> </meta>';
    }
}