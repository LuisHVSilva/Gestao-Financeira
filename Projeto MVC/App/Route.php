<?php

    
    namespace App;

    use MF\Init\Boostrap;

    class Route extends Boostrap {

        /*Configurar quais são as rotas que o MVC possuem*/
        protected function initRoutes(){

            //Rotas antes do login
            $routes['home'] = array(
                'route' => '/', //Qual a rota será atingida, página que o usuário está
                'controller' => 'IndexController', //Qual controlador deverá ser usado
                'action' => 'index' //Qual a ação/método dentro do controlador deverá ser executada
            );

            $routes['inscreverse'] = array(
                'route' => '/inscreverse',
                'controller' => 'IndexController',
                'action' => 'inscreverse' 
            );

            $routes['registrar'] = array(
                'route' => '/registrar',
                'controller' => 'IndexController',
                'action' => 'registrar' 
            );

            //Rotas Depois do login
            $routes['autenticar'] = array(
                'route' => '/autenticar',
                'controller' => 'AuthController',//Controle de usuário
                'action' => 'autenticar' 
            );            
            
            $routes['sair'] = array(
                'route' => '/sair',
                'controller' => 'AuthController',//Controle de usuário
                'action' => 'sair' 
            );

            $routes['entrada'] = array(
                'route' => '/entrada',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'entrada' 
            );


            $routes['gastos'] = array(
                'route' => '/gastos',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'gastos' 
            );

            $routes['tabela'] = array(
                'route' => '/tabela',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'tabela' 
            );

            $routes['excluir'] = array(
                'route' => '/excluir',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'excluir' 
            );

            $routes['dashboard'] = array(
                'route' => '/dashboard',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'dashboard' 
            );
            //Adicionando os atributos array criados acima na variável privada routes
            $this->setRoutes($routes);
        }

    }  
?>