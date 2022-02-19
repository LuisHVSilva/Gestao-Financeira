<?php

    
    namespace App;

    use MF\Init\Boostrap;

    class Route extends Boostrap {

        /*Configurar quais são as rotas que o MVC possuem*/
        protected function initRoutes(){

            $routes['home'] = array(
                'route' => '/', //Qual a rota será atingida, página que o usuário está
                'controller' => 'IndexController', //Qual controlador deverá ser usado
                'action' => 'index' //Qual a ação/método dentro do controlador deverá ser executada
            );


            //Adicionando os atributos array criados acima na variável privada routes
            $this->setRoutes($routes);
        }

    }  
?>