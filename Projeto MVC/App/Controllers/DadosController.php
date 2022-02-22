<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    class DadosController extends Action{

        public function dados(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

                //Recuperação dos gastos                
                $ajax = Container::getModel('Gastos');
                $ajax->__set('id_usuario', $_SESSION['id']);
                $this->view->ajax = $ajax->ajax();

                $this->render('dados', '');
                
            }else{
                header('Location: /?login=erro');
            }
            
        }
    }
?>