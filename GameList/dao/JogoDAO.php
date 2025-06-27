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

      public function listarJogos(){
            $sql = "SELECT * FROM listajogos";

            $con = Conexao::getConexao();

            $stm = $con->prepare($sql);
            $stm->execute();
            $registros = $stm->fetchAll();

            $jogos = $this->mapJogos($registros);
            return $jogos;
        }

        public function removerJogos(int $idJogo){
            $sql = " DELETE  FROM personagens  WHERE id = ?";

            $con = Conexao::getConexao();

            $stm = $con->prepare($sql);
            $stm->execute([$idJogo]);

            $registros = $stm->fetchAll();

            $jogos = $this->mapJogos($registros);
            if(count($jogos) > 0)
                return $jogos[0];
            else
                return null;


        }




     private function mapJogos(array $registros){
            $jogos = array();
            foreach($registros as $reg){
                    $jogo = null;
                    $jogo = new Jogo($reg['titulo'],$reg['genero'],$reg['data_lancamento'],$reg['console'],$reg['diretor'],$reg['img']);
                    $jogo->setId($reg['id']);
                    array_push($jogos, $jogo);
            };
            return $jogos;
        }

     
    }   

     