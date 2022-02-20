<?php 
    namespace App\Models;

    //Classe responsável por conectar ao banco de dados
    use MF\Model\Model;

    class Usuario extends Model{
        
        //Criando atributos privados que representam as colunas do banco de dados
        private $id;
        private $nome;
        private $email;
        private $senha;

        //Como os atributos são privados, necessário usar os métodos get e set para poder usá-los e mudá-los
        public function __get($name){
        
            return $this->$name;    
        }

        public function __set($name, $value){
        
            $this->$name = $value;
        }

        //Salvar novos usuários
        public function salvar(){
            //Query sql para inserir usuarios.
            $query = "insert into usuarios(nome, email, senha) values(:nome,:email,:senha);";

            //Criando o PreparetStatment (Preparando conexão)
            $stmt = $this->db->prepare($query);

            //Atribuindo dinâmicamente os valores variados de nome, email e senha na query acima com o uso da função set
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', $this->__get('senha')); //Criptografando o atributo senha com um hash 32 caractéres com o método md5()

            //executando o comando sql
            $stmt->execute();

            //returnonando
            return $this;
        }

        //Verificar se o cadastro pode realmente ser feito
        public function validarCadastro(){
            $valido = true;

            //Verificando se o nome tem pelo menos 3 caractéres
            if(strlen($this->__get('nome') < 3)){
                $valido = false;
            };

            //Verificando se o email tem pelo menos 3 caractéres
            if(strlen($this->__get('email') < 3)){
                $valido = false;
            };

            //Verificando se a senha tem pelo menos 3 caractéres
            if(strlen($this->__get('senha') < 3)){
                $valido = false;
            };

            return $valido;
        }
        
        //Recuperar um usuário por e-mail
        public function getUsuarioPorEmail(){
            $query = "select nome, email from usuarios where email = :email";

            $stmt= $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        //recuperar usuário por email e saber se ja existe
        public function autenticar(){
            //Criando query de linguagem SQL para recuperar usuário por email e senha
            $query = 'SELECT id, nome, email FROM usuarios WHERE email = :email AND senha = :senha';

            //Criando o PreparetStatment (Preparando conexão)
            $stmt = $this->db->prepare($query);

            //Atribuindo dinâmicamente os valores variados de email e senha na query acima com o uso da função set
            $stmt->bindValue(':email', $this->__get('email')); 
            $stmt->bindValue(':senha', $this->__get('senha')); 

            //executando o comando sql
            $stmt->execute();

            //Criando variável para receber o unico valor existente na consulta SQL
            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            //Verificando se existe o cliente no banco
            if(!empty($usuario['id']) && !empty($usuario['nome'])){
                $this->__set('id', $usuario['id']);
                $this->__set('nome', $usuario['nome']);
            }

            
            //Retornando a lista da seleção com índices de acordo com o nome de cada coluna da tabela
            return $this;
        }
    }

?>