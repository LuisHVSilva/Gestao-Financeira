<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    class AppController extends Action{
        
        //Action de página
        //Entrar na página entrada
        public function entrada(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                $gasto = Container::getModel('Gastos');
          
                $gasto->__set('id_usuario', $_SESSION['id']);   
                $gasto->__set('mes', date('m'));
                
                $this->view->gastos =  $gasto->alguns();
                $this->view->meta =  $gasto->meta_procurar();
                
                
                
                $this->render('entrada', 'layout');
                
            }else{
                header('Location: /?login=erro');
            }
            
        }

        //Action de página
        //Entrar na página tabela
        public function tabela(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                //Recuperação dos gastos

                $gasto = Container::getModel('Gastos');

                $gasto->__set('id_usuario', $_SESSION['id']);                
                $this->view->gastos =  $gasto->getAll();
                $this->render('tabela', 'layout');

            }else{
                header('Location: /?login=erro');
            }
            
        }

        //Action de página
        //Entrar na página dashboard
        public function dashboard(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
                
                if($_POST == null){
                    $_SESSION['mes'] = date('m');
                    
                } else {
                    $_SESSION['mes'] = $_POST['mes'];                    
                }                               

                //Recuperação dos gastos somados do mês
                $geral = Container::getModel('Gastos');
                $geral->__set('id_usuario', $_SESSION['id']);
                $geral->__set('mes', $_SESSION['mes']);                
                $this->view->geral = $geral->alguns();

                //Recuperando todos os gastos
                $this->view->gastos = $geral->getAll();

                //Recuperando a meta
                $this->view->meta =  $geral->meta_procurar();
                
                
                
                $this->render('dashboard', 'layout');
                
            }else{
                header('Location: /?login=erro');
            }
            
        }

        //Action de Banco de Dados
        //Salvar gastos
        public function salvar(){
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){                
                
                $gastos = Container::getModel('Gastos');                
                $gastos->__set('id_usuario', $_SESSION['id']);
                $gastos->__set('descricao', $_POST['descricao']);
                $gastos->__set('valor', $_POST['valor']);
                $gastos->__set('tipo', $_POST['tipo']);
                $gastos->__set('data', $_POST['data']);
                
                $gastos->salvar();

                header('Location: /entrada');
                
            }else{
                header('Location: /?login=erro');
            }            
        }

        //Action de Banco de Dados
        //excluir gastos
        public function excluir(){
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){                
                
                $gastos = Container::getModel('Gastos');                                
                $gastos->__set('id', $_GET['id']);                  
                
                $gastos->delete();

                header('Location: /tabela');
                
            }else{
                header('Location: /?login=erro');
            }            
        }       

        //Action de Banco de Dados
        //Adicionar meta de gastos
        public function meta(){
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){                
                
                $gastos = Container::getModel('Gastos');                
                $gastos->__set('salario', $_POST['salario']);
                $gastos->__set('meta', $_POST['meta']);
                $gastos->__set('id_usuario', $_SESSION['id']);   
                
                $gastos->meta_adicionar();

                header('Location: /entrada');
                
            }else{
                header('Location: /?login=erro');
            }            
        } 

        //Action de Banco de Dados
        //Alterar meta de gastos
        public function meta_alterar(){
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){                
                
                $gastos = Container::getModel('Gastos');                
                $gastos->__set('salario', $_POST['salario']);
                $gastos->__set('meta', $_POST['meta']);
                $gastos->__set('id_usuario', $_SESSION['id']);   
                
                $gastos->meta_alterar();

                header('Location: /entrada');
                
            }else{
                header('Location: /?login=erro');
            }            
        }

        //Action de Banco de Dados
        //excluir metas
        public function meta_excluir(){
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){                
                   
                $gastos = Container::getModel('Gastos');                                
                $gastos->__set('id_usuario', $_GET['id_usuario']);                  
                
                $gastos->meta_excluir();

                header('Location: /entrada');
            }else{
                header('Location: /?login=erro');
            }            
        } 
    }
?>

