<?php
namespace Garagem\Model;

use Zend\Db\Adapter\Adapter;
use Garagem\Model\CarroEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\HydratingResultSet;

class CarroMapper {
    
    protected $tableName = 'carros';
    protected $adaptador;
    protected $sql;
    
    public function __construct(Adapter $dbAdapter){
         
        $this->adaptador = $dbAdapter;
        $this->sql = new Sql($this->adaptador);
        $this->sql->setTable($this->tableName);
    }
    
    public function selectAll(){
        $select = $this->sql->select();
        $select->order(array('marca ASC', 'modelo ASC'));
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $resultado = $statement->execute();
        
        $carro = new CarroEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $carro);  //Verificar se conseque adicionar diretamente as classes
        $resultset->initialize($resultado);
        
        return $resultset;
    }
   
   
    public function saveCarro(CarroEntity $carro){
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($carro);
        
        if ($carro->getId()){ //Atualiza
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $carro->getId()));
        } else { //Inserir
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $resultado = $statement->execute();
        
        if (!$carro->getId()){
            $carro->setId($resultado->getGeneratedValue());
        }
        
        return $resultado;
        
    }
    
    public function getCarro($id){
        $select = $this->sql->select();
        $select->where(array('id' => $id));
        
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $resultado = $statement->execute()->current();
        
        if (!$resultado){
            $carro = new CarroEntity();
            return $carro; //Verificar se da para tirar as chaves
        }
        
        $carro = new CarroEntity();
        $hydrator = new ClassMethods();
        $hydrator->hydrate($resultado, $carro); //Verificar como isto esta funcionando, e se pode retirar.
        
        return $carro;
    }
    
    public function deleteCarro($id){
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));
        
        $statement = $this->sql->prepareStatementForSqlObject($delete);  //Verificar para juntar tudo em um arquivo mae.
        return $statement->execute();
    }
    
}