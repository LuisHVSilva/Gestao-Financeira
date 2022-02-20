<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    //Controllador para tratar o que deve acontecer dentro de cada página
    class IndexController extends Action{

       
        public function index(){

            $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
            //Chamando o conteudo da página que deverá ser acessado pelo index.
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('index', 'layout-index');
        }

        public function inscreverse(){
            $this->view->erroCadastro = false;
            $this->view->usuario = array(
                'nome' => '',
                'email' => ''
            );

            //Chamando o conteudo da página que deverá ser acessado pelo index.
            //Primeiro parâmetro -> dados que deverão aparecer na página
            //Segundo parâmetro -> Quais as caractéristicas padrões devem ser obedecidas
            $this->render('inscreverse', 'layout-index');
        }

        public function registrar(){

            //Usando a classe getModel do objeto Container (MF\model\container) para instanciar dentro do Usuario.php os valores que deverão ser usados nas querys do banco de dados.
            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $_POST['nome']);
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            
            //Verificando se pode haver um novo cadastro no banco de dados
            //Verificando se existe um email igual ao digitado no banco de dados
            if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){  

                //Salvando os dados no banco de dados
                $usuario->salvar();  

                //Passando a view para o usuário que o cadastro foi bem sucedido
                $this->render('index', 'layout');                                
                
            }else{

                $this->view->usuario = array(
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email']
                );

                $this->view->erroCadastro = true;
                $this->render('inscreverse', 'layout-index');

            };
        }
        
    }
