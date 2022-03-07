<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    class DadosController extends Action{

        public function dados_separado(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                //Recuperação dos gastos                
                $ajax = Container::getModel('Dados');
                $ajax->__set('id_usuario', $_SESSION['id']); 
                $ajax->__set('mes', $_SESSION['mes']);                
                $this->view->ajax = $ajax->ajax1();

                $this->render('dados_separado', '');
                
            }else{
                header('Location: /?login=erro');
            }
            
        }

        public function dados_geral(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                //Recuperação dos gastos                
                $ajax = Container::getModel('Dados');
                $ajax->__set('id_usuario', $_SESSION['id']); 
                $ajax->__set('mes', $_SESSION['mes']);

                
                $this->view->ajax = $ajax->ajax2($ajax->__get('mes'));
                $this->render('dados_geral', '');

                
                
            }else{
                header('Location: /?login=erro');
            }
            
        }

        public function meta_salario(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                //Recuperação dos gastos                
                $ajax = Container::getModel('Dados');
                $ajax->__set('id_usuario', $_SESSION['id']);                 
                
                $this->view->ajax = $ajax->ajax3();
                $this->render('meta_salario', '');

                
                
            }else{
                header('Location: /?login=erro');
            }
            
        }
        
    }
?>