<?php 
    namespace App\Models;

    //Classe responsável por conectar ao banco de dados
    use MF\Model\Model;

    class Gastos extends Model{
        
        //Criando atributos privados que representam as colunas do banco de dados
        private $id;
        private $id_usuario;
        private $descricao;
        private $valor;
        private $tipo;
        private $data;

        //Como os atributos são privados, necessário usar os métodos get e set para poder usá-los e mudá-los
        public function __get($name){
        
            return $this->$name;    
        }

        public function __set($name, $value){
        
            $this->$name = $value;
        }

        //Salvar novos gastos
        public function salvar(){
            //Query sql para inserir gastos
            $query = "insert into tb_gastos(id_usuario, descricao, valor, tipo, data) values(:id_usuario,:descricao,:valor,:tipo,:data);";

            //Criando o PreparetStatment (Preparando conexão)
            $stmt = $this->db->prepare($query);

            //Atribuindo dinâmicamente os valores variados
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':valor', $this->__get('valor')); 
            $stmt->bindValue(':tipo', $this->__get('tipo')); 
            $stmt->bindValue(':data', $this->__get('data')); 
            //executando o comando sql
            $stmt->execute();

            //returnonando
            return $this;
        }

        //Recuperar gastos
        public function getAll(){
            $query = '
            SELECT 
                tg.descricao
                , tg.valor
                , tt.descricao as tipo
                , DATE_FORMAT(tg.data, "%d/%m/%Y") as data                                
                , DATE_FORMAT(tg.data_gravada , "%d/%m/%Y") as data_gravada
            from 
                tb_gastos as tg      
                left join tb_tipos as tt on (tg.tipo = tt.id)
            where 
                tg.id_usuario = :id_usuario
            order by
            tg.data';

            $stmt= $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

?>