<?php
    namespace App\Controllers;

    use MF\Controller\Action;    
    use MF\Model\Container;

    class AuthController extends Action{

        public function autenticar(){
            
            //Criando uma instância no Usuario
            $usuario = Container::getModel('Usuario');
            
            //Atribuindo os valore de email e senha na instância Usuario
            $usuario->__set('email', $_POST['email']);
            $usuario->__set('senha', $_POST['senha']);

            //Autenticando o usuário a partir de uma instância            
            $usuario->autenticar();

            //Se o usuário foi checado, existe um id
            if(!empty($usuario->__get('id')) && !empty($usuario->__get('nome'))){
                session_start();

                $_SESSION['id'] = $usuario->__get('id');
                $_SESSION['nome'] = $usuario->__get('nome');
                
                header ('Location: /entrada');
            } else{
                header('Location: /?login=erro');
            }
        }

        public function sair(){
            session_start();
            session_destroy();
            header('Location: /');
        }
    }
?>