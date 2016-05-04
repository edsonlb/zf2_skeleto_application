<?php

namespace Garagem\Controller;

error_reporting(0);  //Error and alerts

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Garagem\Form\Formulario;
use Garagem\Model\CarroEntity;

class CarrosController extends AbstractActionController
{
    
    public function getCarroMapper()
    {
        return $this->getServiceLocator()->get('CM');
    }
    
    public function indexAction()
    {
        $mapper = $this->getCarroMapper();
        return new ViewModel(array('carros' => $mapper->selectAll())); //Melhorar aqui, e buscar direto do objeto carros.
    }
    
    public function addAction(){
        $form = new Formulario();
        $carro = new CarroEntity();
        
        $form->bind($carro);
        
        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setData($request->getPost());
            if ($form->isValid()){
                $this->getCarroMapper()->saveCarro($carro);
                
                return $this->redirect()->toRoute('carros');
            }
        }
        
        return array('form' => $form);
        
    }
    
    
    public function editAction(){
        $id = (int) $this->params('id');
        
        if (!$id){
            return $this->redirect()->toRoute('carros', array('action' => 'add'));
        }
        
        $carro = $this->getCarroMapper()->getCarro($id);
        $form = new Formulario();
        $form->bind($carro);
        
        $request = $this->getRequest();
        
        if($request->isPost()){
            $form->setData($request->getPost());
            
            if ($form->isValid()){
                $this->getCarroMapper()->saveCarro($carro);
                
                return $this->redirect()->toRoute('carros');
            }
        }
        
        return array('id' => $id, 'form' => $form);
    }
    
    public function deleteAction()
    {
        $id = $this->params('id');
        $carro = $this->getCarroMapper()->getCarro($id);
        if (!$carro) {
            return $this->redirect()->toRoute('carros');
        }
    
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost()->get('del') == 'Yes') {
                $this->getCarroMapper()->deleteCarro($id);
            }
    
            return $this->redirect()->toRoute('carros');
        }
    
        return array('id' => $id, 'carro' => $carro); //Retirar o retorno do ID, pois eu uso tudo do objeto no visual.
    }


    
    
}