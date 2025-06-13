<?php   

require_once("modelo/Jogo.php");
require_once("util/Conexao.php");



    class JogoDAO{

        public function cadastrarJogo(Jogo $jogo){
            $sql = "INSERT INTO listajogos 
            (id, titulo, genero, data_lancamento, console, diretor, img)
            VALUES
            (?, ?, ?, ?, ?, ?, ?)";
        
       
        $con = Conexao::getConexao();

        $stm = $con->prepare($sql);

        $stm->execute(array($jogo->getId(),
                                $jogo->getTitulo(),
                                $jogo->getGenero(),
                                $jogo->getDataLancamento(),
                                $jogo->getConsole(),
                                $jogo->getDiretor(),
                                $jogo->getImg(),
        ));
        
     }
    }   

     