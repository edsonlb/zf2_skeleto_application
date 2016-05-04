<?php
 namespace Garagem\Form;

 use Zend\Form\Form;
 use Zend\Stdlib\Hydrator\ClassMethods;

 class Formulario extends Form
 {
     public function __construct($name = null, $options = array())
     {
         parent::__construct('carro');

         $this->setAttribute('method', 'post');
         $this->setInputFilter(new FormularioValidacao());
         $this->setHydrator(new ClassMethods());

         $this->add(array(
             'name' => 'id',
             'type' => 'hidden',
         ));

         $this->add(array(
             'name' => 'marca',
             'type' => 'text',
             'options' => array(
                 'label' => 'Brand',
             ),
             'attributes' => array(
                 'id' => 'marca',
                 'maxlength' => 100,
                 'class' => 'form-control',
                 'placeholder' => "Audi",
             )
         ));
         
         $this->add(array(
             'name' => 'modelo',
             'type' => 'text',
             'options' => array(
                 'label' => 'Model',
             ),
             'attributes' => array(
                 'id' => 'modelo',
                 'maxlength' => 100,
                 'class' => 'form-control', 
                 'placeholder' => "A3",
             )
         ));
         
         
         $this->add(array(
             'name' => 'motor',
             'type' => 'Zend\Form\Element\Number',
             'options' => array(
                 'label' => 'Motor',
             ),
             'attributes' => array(
                 'id' => 'motor',
                 'min' => '1',
                 'max' => '4',
                 'step' => '0.2',
                 'class' => 'form-control',
             )
         ));


         $this->add(array(
             'name' => 'submit',
             'attributes' => array(
                 'type'  => 'submit',
                 'value' => 'Save',
                 'class' => 'btn btn-primary pull-right',
             ),
         ));
     }
 }