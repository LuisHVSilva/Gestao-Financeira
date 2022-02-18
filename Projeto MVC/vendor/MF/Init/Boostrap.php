<?php
    namespace MF\Init;

    //Classe que nao pode ser instânciada, apenas herdada
    abstract class Boostrap{
        
        private $routes;

        abstract protected function initRoutes();
        
        

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

        //Método para recuperar qual url está sendo acessada pelo usuário
        protected function run($url){
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
        protected function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

    
?>