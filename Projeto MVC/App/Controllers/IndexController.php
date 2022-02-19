<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;


    

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController extends Action{

       
        public function index(){


            //Chamando o conteudo da página que deverá ser acessado pelo index.
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('index', 'layout');
        }

        
    }

?>