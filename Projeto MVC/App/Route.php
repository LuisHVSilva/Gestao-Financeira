<?php

    
    namespace App;

    class Route{

        private $routes;

        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        //Método get/set
        public function getRoutes(){
            return $this->routes;
        }

        public function setRoutes(array $routes){
            $this->routes = $routes;
        }

        /*Configurar quais são as rotas que o MVC possuem*/
        public function initRoutes(){

            $routes['home'] = array(
                'route' => '/', //Qual a rota será atingida, página que o usuário está
                'controller' => 'IndexController', //Qual controlador deverá ser usado
                'action' => 'index' //Qual a ação/método dentro do controlador deverá ser executada
            );

            $routes['sobre_nos'] = array(
                'route' => '/sobre_nos',
                'controller' => 'IndexController',
                'action' => 'sobreNos'
            );

            //Adicionando os atributos array criados acima na variável privada routes
            $this->setRoutes($routes);
        }

        //Método para recuperar qual url está sendo acessada pelo usuário
        public function run($url){
            //Loop for na variável routes, definida no método initRoutes
            foreach  ($this->getRoutes() as $key => $route){
                //Verificando se a url em questão é igual a algum dos indíces da variável route
                if ($url == $route['route']){
                    //criando variável que irá acionar o controlador específico da url passada no construtor (__construct) dentro do Controller
                    $class = "App\\Controllers\\".ucfirst($route['controller']);

                    //Instânciando uma classe controller a partir da $class acima.
                    $controller = new $class;

                    //Acionando o método da classe controller
                    $action = $route['action'];  
               
                    $controller->$action();
                    
                }
            };
        }

        
        /*Função para retornar em qual página o usuário está*/
        public function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>