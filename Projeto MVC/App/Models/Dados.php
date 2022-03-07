<?php

namespace App\Models;

//Classe responsável por conectar ao banco de dados
use MF\Model\Model;

class Dados extends Model
{

    //Criando atributos privados que representam as colunas do banco de dados
    private $id_usuario;
    private $mes;
    
    //Como os atributos são privados, necessário usar os métodos get e set para poder usá-los e mudá-los
    public function __get($name)
    {

        return $this->$name;
    }

    public function __set($name, $value)
    {

        $this->$name = $value;
    }
   

    public function ajax1()
    {
        $query = '
        SELECT 
            SUM(tg.valor) as valor
            , tt.descricao as tipo
            , DATE_FORMAT(tg.data, "%d/%m/%Y") as data                     
            , DATE_FORMAT(tg.data_gravada , "%d/%m/%Y") as data_gravada
        from 
            tb_gastos as tg      
            left join tb_tipos as tt on (tg.tipo = tt.id)
        where 
            tg.id_usuario = :id_usuario
            AND Month(tg.data) = :mes
        GROUP BY
            tt.descricao
            , DATE_FORMAT(tg.data, "%d/%m/%Y")
            , DATE_FORMAT(tg.data_gravada , "%d/%m/%Y")
        order by
            tg.data ASC,
            tt.descricao';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':mes', $this->__get('mes'));
        $stmt->execute();

        while ($results = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = $results;
        };

        echo json_encode($result);
    }

    public function ajax2()
    {
        $query = '
        SELECT 
            SUM(valor) as valor
            , DATE_FORMAT(data, "%d/%m/%Y") as data
        from 
            tb_gastos            
        where 
            id_usuario = :id_usuario     
            AND Month(data) = :mes       
        group by
            DATE_FORMAT(data, "%d/%m/%Y")
        order by
            data ASC';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':mes', $this->__get('mes'));
        $stmt->execute();

        while ($results = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = $results;
        };
        
        echo json_encode($result, $this->__get('mes'));
    }

    public function ajax3()
    {
        $query = "select meta, DATE_FORMAT(data, '%d/%m/%Y') as data from meta where usuario = :id_usuario";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));                
        $stmt->execute();

        while ($results = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = $results;
        };
        
        echo json_encode($result);
    }

    

}
