<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    class AppController extends Action{

        public function entrada(){                        
            session_start();

            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
                $this->render('entrada', 'layout');
                
            }else{
                header('Location: /?login=erro');
            }
            
        }

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

        //Salvar gastos
        public function gastos(){
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

        

    }
?>

