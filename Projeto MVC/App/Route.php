<?php

    
    namespace App;

    class Route{

        /*Configurar quais são as rotas que o MVC possuem*/
        public function initRoutes(){

            $routes['home'] = array(
                'route' => '/', //Qual a rota será atingida, página que o usuário está
                'controller' => 'IndexController', //Qual controlador deverá ser usado
                'action' => 'index' //Qual a ação dentro do controlador deverá ser executada
            );

            $routes['sobre_nos'] = array(
                'route' => 'sobre_nos',
                'controller' => 'IndexController',
                'action' => 'sobreNos'
            );

        }

        
        /*Função para retornar em qual página o usuário está*/
        public function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>