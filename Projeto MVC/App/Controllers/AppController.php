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
                $this->view->gastos =  $gasto->alguns();

                
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

                //Recuperação dos gastos somados do mês
                $geral = Container::getModel('Gastos');
                $geral->__set('id_usuario', $_SESSION['id']);
                $geral->__set('mes', 2);
                $this->view->geral = $geral->alguns();

                //Recuperando todos os gastos
                $gastos = Container::getModel('Gastos');
                $gastos->__set('id_usuario', $_SESSION['id']);
                $this->view->gastos = $gastos->getAll();
                              
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

                

    }
?>

