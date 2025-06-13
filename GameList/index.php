<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");


$titulo = 0;
$genero = 0;
$dataLancamento = 0;
$console = 0;
$diretor = 0;
$img = 0;

if(isset($_POST["titulo"])) {

    $titulo = ($_POST["titulo"]);
    $genero = ($_POST["genero"]);
    $dataLancamento = $_POST["dataLancamento"];
    $console = ($_POST["console"]);
    $diretor = ($_POST["diretor"]);
    $img = ($_POST['imagem']);
    
    
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <h1>GameList</h1>
    </div>

    <div class="table">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Gênero</th>
                <th>Data de Lançamento</th>
                <th>Console</th>
                <th>Diretor</th>
                <th>Excluir</th>
            </tr>


        </table>
    </div>

    <div class="form">
        <h1>Cadastro de Jogos</h1>
        <form action="" method="POST">
            <div style="margin-bottom: 10px;">
                <label for="titulo">Título: </label>
                <input type="text" name="titulo" id="titulo"
                    value="" />
            </div>

            <div style="margin-bottom: 10px;">
                <label for="genero">Gênero: </label>
                <select name="genero" id="genero">
                    <option value="">---Selecione---</option>
                    <option value="D">RPG</option>
                    <option value="F">Ficção</option>
                    <option value="R">Ação</option>
                    <option value="T">Turno</option>
                    <option value="P">Plataforma</option>
                </select>
            </div>


            <div style="margin-bottom: 10px;">
                <label for="dataLancamento">Data de Lançamento: </label>
                <input type="date" name="dataLancamento" id="dataLancamento"
                    value="" />
            </div>

            <div style="margin-bottom: 10px;">
                <label for="Console">Console: </label>
                <select name="console" id="console">
                    <option value="">---Selecione---</option>
                    <option value="X">Xbox</option>
                    <option value="Ps">Playstation</option>
                    <option value="Pc">Pc</option>
                    <option value="S">Switch</option>
                    <option value="O">Turno</option>
                </select>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="diretor">Diretor: </label>
                <input type="text" name="diretor" id="diretor"
                    value="" />
            </div>

            <div style="margin-bottom: 10px;">
                <label for="imagem">Imagem: </label>
                <input type="text" name="imagem" id="imagem"
                    value="" />
            </div>





        </form>


    </div>


</body>

</html>