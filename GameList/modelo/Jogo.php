<?php 


        class Jogo{
            private $id;
            private $titulo;
            private $genero;
            private $dataLancamento;
            private $console;
            private $diretor;
            private $img;
            

            public function __construct($titulo, $genero, $dataLancamento, $console, $diretor, $img) {
                $this->titulo = $titulo;
                $this->genero = $genero;
                $this->dataLancamento = $dataLancamento;
                $this->console = $console;
                $this->diretor = $diretor;
                $this->img = $img;
            }
            /**
             * Get the value of id
             */
            public function getId()
            {
                        return $this->id;
            }

            /**
             * Set the value of id
             */
            public function setId($id): self
            {
                        $this->id = $id;

                        return $this;
            }

            /**
             * Get the value of titulo
             */
            public function getTitulo()
            {
                        return $this->titulo;
            }

            /**
             * Set the value of titulo
             */
            public function setTitulo($titulo): self
            {
                        $this->titulo = $titulo;

                        return $this;
            }

            /**
             * Get the value of genero
             */
            public function getGenero()
            {
                        return $this->genero;
            }

            /**
             * Set the value of genero
             */
            public function setGenero($genero): self
            {
                        $this->genero = $genero;

                        return $this;
            }

            /**
             * Get the value of dataLancamento
             */
            public function getDataLancamento()
            {
                        return $this->dataLancamento;
            }

            /**
             * Set the value of dataLancamento
             */
            public function setDataLancamento($dataLancamento): self
            {
                        $this->dataLancamento = $dataLancamento;

                        return $this;
            }

            /**
             * Get the value of console
             */
            public function getConsole()
            {
                        return $this->console;
            }

            /**
             * Set the value of console
             */
            public function setConsole($console): self
            {
                        $this->console = $console;

                        return $this;
            }

            /**
             * Get the value of diretor
             */
            public function getDiretor()
            {
                        return $this->diretor;
            }

            /**
             * Set the value of diretor
             */
            public function setDiretor($diretor): self
            {
                        $this->diretor = $diretor;

                        return $this;
            }

            /**
             * Get the value of img
             */
            public function getImg()
            {
                        return $this->img;
            }

            /**
             * Set the value of img
             */
            public function setImg($img): self
            {
                        $this->img = $img;

                        return $this;
            }
        }