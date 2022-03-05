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


            $routes['salvar'] = array(
                'route' => '/salvar',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'salvar' 
            );

            $routes['meta'] = array(
                'route' => '/meta',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'meta' 
            );

            $routes['meta_alterar'] = array(
                'route' => '/meta_alterar',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'meta_alterar' 
            );

            $routes['meta_excluir'] = array(
                'route' => '/meta_excluir',
                'controller' => 'AppController', //Conteúdo para usuário
                'action' => 'meta_excluir' 
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
            
            $routes['dados_separado'] = array(
                'route' => '/dados_separado',
                'controller' => 'DadosController', //Conteúdo de dados
                'action' => 'dados_separado' 
            );

            $routes['dados_geral'] = array(
                'route' => '/dados_geral',
                'controller' => 'DadosController', //Conteúdo de dados
                'action' => 'dados_geral' 
            );

          
            //Adicionando os atributos array criados acima na variável privada routes
            $this->setRoutes($routes);
        }

    }  
?>