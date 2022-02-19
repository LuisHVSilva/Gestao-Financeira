<?php
    namespace App\Controllers;
    use MF\Controller\Action;    
    use MF\Model\Container;

    use App\Models\Produto;
    use App\Models\Info;

    

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController extends Action{

       
        public function index(){

            $produto = Container::getModel('Produto');
            
            $produtos = $produto->getProdutos();
            $this->view->dados = $produtos;

            //Chamando o conteudo da página que deverá ser acessado pelo index.
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('index', 'layout1');
        }

        public function sobreNos(){

            $info = Container::getModel('Info');

            $informacoes = $info->getInfo();
            $this->view->dados = $informacoes;
            
            //Chamando o conteudo da página que deverá ser acessado pelo sobre_nos
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('sobreNos', 'layout2');
            
        }

        
    }

?>