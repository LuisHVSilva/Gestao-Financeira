<?php
    namespace App\Controllers;
    use MF\Controller\Action;

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController extends Action{

       
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

        
    }

?>