<?php
    namespace MF\Controller;

    abstract class Action{
        protected $view;

        public function __construct(){
            $this->view = new \stdClass();
            
        }

        //Método para deixar o require_once acima dinâmico a partir dos nomes em controller.
        protected function render($view){
            
            //Método que retorna o nome da classe passada            
            $classeAtual = get_class($this);
            //Removendo App\\Controllers\\ pois é o mesmo em todos os diretórios Controller
            $classeAtual = str_replace('App\\Controllers\\', '', $classeAtual);
            //Removendo o termo Controller e deixando tudo em letra minuscula
            $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

            require_once "../App/Views/index/".$view.".phtml";
        }

    }
?>