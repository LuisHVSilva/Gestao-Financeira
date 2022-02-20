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

    }
?>