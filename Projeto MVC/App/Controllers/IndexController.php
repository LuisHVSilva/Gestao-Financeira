<?php
    namespace App\Controllers;
    use MF\Controller\Action;
    use App\Connection;
    use App\Models\Produto;

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController extends Action{

       
        public function index(){
            
            //$this->view->dados = array('sofa', 'cadeira', 'cama');

            //Instância de conexão
            $conn = Connection::getDb();
            
            //Instância de modelo
            $produto = new Produto($conn);

            $produtos = $produto->getProdutos();
            $this->view->dados = $produtos;

            //Chamando o conteudo da página que deverá ser acessado pelo index.
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('index', 'layout1');
        }

        public function sobreNos(){
            
            //$this->view->dados = array('sofa', 'cadeira');
            //Chamando o conteudo da página que deverá ser acessado pelo sobre_nos
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('sobreNos', 'layout2');
            
        }

        
    }

?>