<?php
    namespace MF\Controller;

    abstract class Action{
        protected $view;

        public function __construct(){
            $this->view = new \stdClass();
            
        }

        //Método responsável por renderizar a view
        protected function render($view, $layout){
            $this->view->page = $view;
            //Testando se o layout passado em $layout existe ou não    
            if(file_exists("../App/Views/".$layout.".phtml")){
                //Chamando o layout padrão, ou seja, as caractéristicas que serão herdadas em todas as páginas, para que seja colocado diretamente em todas as páginas, sem precisar escrever toda vez. Por exemplo o navbar, backgroud-color, ...
                require_once "../App/Views/".$layout.".phtml";
            }else{
                //Se não existir, os dados únicos de cada página irão aparecer, sem o layout geral
                $this->content();
            }
            
            
        }

        //Método para deixar o require_once acima dinâmico a partir dos nomes em controller.
        protected function content(){
           
            //Método que retorna o nome da classe passada            
            $classeAtual = get_class($this);
            //Removendo App\\Controllers\\ pois é o mesmo em todos os diretórios Controller
            $classeAtual = str_replace('App\\Controllers\\', '', $classeAtual);
            //Removendo o termo Controller e deixando tudo em letra minuscula
            $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

            require_once "../App/Views/index/".$this->view->page.".phtml";
        }

    }
?>