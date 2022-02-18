<?php
    namespace App\Controllers;

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController {

        private $view;

        public function __construct(){
            $this->view = new \stdClass();
            
        }

        public function index(){
            $this->view->dados = array('sofa', 'cadeira', 'cama');
            //Chamando o conteudo da página que deverá ser acessado pelo index.
            $this->render('index');
        }

        public function sobreNos(){
            //Chamando o conteudo da página que deverá ser acessado pelo sobre_nos
            $this->view->dados = array('sofa', 'cadeira');
            $this->render('sobreNos');
            
        }

        //Método para deixar o require_once acima dinâmico a partir dos nomes em controller.
        public function render($view){
            
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