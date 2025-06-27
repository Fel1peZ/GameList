<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");
require_once("dao/JogoDAO.php");
require_once("modelo/Jogo.php");


$msgErro = "";
$titulo = "";
$genero = "";
$dataLancamento = "";
$console = "";
$diretor = "";
$img = "";

$dao = new JogoDAO();
$jogos = array();
$jogos = $dao->listarJogos();


if (isset($_POST["titulo"])) {

    $titulo = ($_POST["titulo"]);
    $genero = ($_POST["genero"]);
    $dataLancamento = $_POST["dataLancamento"];
    $console = ($_POST["console"]);
    $diretor = ($_POST["diretor"]);
    $img = ($_POST['imagem']);



    $erros = array();
    if (! $titulo)
        array_push($erros, 'Informe o título!');
    else if (strlen($titulo) < 3 || strlen($titulo) > 50)
        array_push($erros, 'O título deve ter entre 3 e 50 caracteres!');
    else {
        //MESMA VALIDAÇAO DA AULA SÓ QUE USANDO A ORIENTAÇAO A OBJETOS
        $result = 0;
        foreach ($jogos as $j) {
            if ($titulo ==  $j->getTitulo()) {
                $result = 1;
            }
        }

        if ($result > 0)
            array_push($erros, "Já existe um jogo com este título!");
    }

    if (! $genero)
        array_push($erros, 'Informe o genero!');

    if (! $dataLancamento)
        array_push($erros, 'Informe a data de lançamento!');
    else if (validarAno($dataLancamento)== false){
    array_push($erros, 'O ano de  lançamento está inválido!');  


    }

    if (! $console)
        array_push($erros, 'Informe o console!');

    if (! $diretor)
        array_push($erros, 'Informe o diretor!');

    if (! $img)
        array_push($erros, 'Informe a imagem!');

    if (count($erros) == 0) {
        //Inserir as informações na base de dados
        $jogo = new Jogo($titulo, $genero, $dataLancamento, $console, $diretor, $img);
        $dao->cadastrarJogo($jogo);
        header("Location: index.php");
    } else {
        $msgErro = implode("<br>", $erros);
    }
}



//Funçao pra validar a data
function validarAno($data) {
    $formato = 'Y-m-d'; 
    $d = DateTime::createFromFormat($formato, $data);
    $ano =  $d->format('Y');
    if ($ano < 1952 || $ano > 2025){
        return false;
    }else{
        return true;
    }
   
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="estilo/estilos.css">
</head>

<body>

    <header>
        <img class="hollow" src="img/knight.png" alt="">
        <h1>GameList</h1>
    </header>

    <div class="main">
        <img class="steve" src="img/steve.png" alt="">
        <div class="table">
            <div id="divErro" style="color: #c6b7be;">
                <?= $msgErro ?>
            </div>

            <h2>Lista de Jogos Cadastrados</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Data de Lançamento</th>
                    <th>Console</th>
                    <th>Diretor</th>
                    <th>Imagem</th>
                    <th>Excluir</th>
                </tr>

                <?php foreach ($jogos as $j): ?>
                    <tr>
                        <td><?= $j->getId() ?></td>
                        <td><?= $j->getTitulo() ?></td>
                        <td><?php
                            if ($j->getGenero() == "R") {
                                echo "RPG";
                            }
                            if ($j->getGenero() == "F") {
                                echo "Ficção";
                            }
                            if ($j->getGenero() == "A") {
                                echo "Ação";
                            }
                            if ($j->getGenero() == "T") {
                                echo "Turno";
                            }
                            if ($j->getGenero() == "P") {
                                echo "Plataforma";
                            }
                            ?></td>
                        <td><?= $j->getDataLancamento() ?></td>
                        <td><?php
                            if ($j->getConsole() == "X") {
                                echo "Xbox";
                            }
                            if ($j->getConsole() == "Ps") {
                                echo "Playstation";
                            }
                            if ($j->getConsole() == "Pc") {
                                echo "Pc";
                            }
                            if ($j->getConsole() == "S") {
                                echo "Switch";
                            }
                            ?></td>
                        <td><?= $j->getDiretor() ?></td>
                        <td><img class="img-tabela" src="<?= $j->getImg() ?>" alt=""></td>

                        <td><button><a href="excluir.php?id=<?= $j->getId() ?>"
                                    onclick="return confirm('Confirma a exclusão?');">

                                    Excluir</a></button></td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <div class="form">
            <h2>Formulário de Cadastro de Jogos</h2>
            <form action="" method="POST">

                <div style="margin-bottom: 10px;">
                    <label for="titulo">Título: </label>
                    <input type="text" name="titulo" id="titulo"
                        value="<?= $titulo ?>" />
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="genero">Gênero: </label>
                    <select name="genero" id="genero">
                        <option value="">
                            ---Selecione---
                        </option>
                        <option value="R"
                            <?= ($genero == 'R' ? 'selected' : '') ?> >
                            RPG
                        </option>
                        <option value="F"
                            <?= ($genero == 'F' ? 'selected' : '') ?> >
                            Ficção
                        </option>
                        <option value="A"
                            <?= ($genero == 'A' ? 'selected' : '') ?> >
                            Ação
                        </option>
                        <option value="T"
                            <?= ($genero == 'T' ? 'selected' : '') ?> >
                            Turno
                        </option>
                        <option value="P"
                            <?= ($genero == 'P' ? 'selected' : '') ?> >
                            Plataforma
                        </option>
                    </select>
                </div>


                <div style="margin-bottom: 10px;">
                    <label for="dataLancamento">Data de Lançamento: </label>
                    <input type="date" name="dataLancamento" id="dataLancamento"
                        value="<?= $dataLancamento ?>" />
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="Console">Console: </label>
                    <select name="console" id="console">
                        <option value="">---Selecione---</option>
                        <option value="X"
                            <?= ($console == 'X' ? 'selected' : '') ?> >
                            Xbox
                        </option>
                        <option value="Ps"
                            <?= ($console == 'Ps' ? 'selected' : '') ?> >
                            Playstation
                        </option>
                        <option value="Pc"
                            <?= ($console == 'Pc' ? 'selected' : '') ?> >
                            Pc
                        </option>
                        <option value="S"
                            <?= ($console == 'S' ? 'selected' : '') ?> >
                            Switch
                        </option>
                    </select>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="diretor">Diretor: </label>
                    <input type="text" name="diretor" id="diretor"
                        value="<?= $diretor ?>" />
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="imagem">Imagem: </label>
                    <input type="text" name="imagem" id="imagem"
                        value="<?= $img ?>" />
                </div>


                <div style="margin-bottom: 10px;">
                    <button type="submit">Gravar</button>
                </div>



            </form>


        </div>
    </div>

</body>

</html>