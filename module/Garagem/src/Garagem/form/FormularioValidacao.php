<?php
 namespace Garagem\Form;

 use Zend\InputFilter\InputFilter;

 class FormularioValidacao extends InputFilter
 {
     public function __construct()
     {
         $this->add(array(
             'name' => 'id',
             'required' => true,
             'filters' => array(
                 array('name' => 'Int'),
             ),
         ));

         $this->add(array(
             'name' => 'marca',
             'required' => true,
             'filters' => array(
                 array('name' => 'StripTags'),
                 array('name' => 'StringTrim'),
             ),
             'validators' => array(
                 array(
                     'name' => 'StringLength',
                     'options' => array(
                         'encoding' => 'UTF-8',
                         'max' => 100,
                         'min' => 3
                     ),
                 ),
             ),
         ));
         
         $this->add(array(
             'name' => 'modelo',
             'required' => true,
             'filters' => array(
                 array('name' => 'StripTags'),
                 array('name' => 'StringTrim'),
             ),
             'validators' => array(
                 array(
                     'name' => 'StringLength',
                     'options' => array(
                         'encoding' => 'UTF-8',
                         'max' => 100,
                         'min' => 3
                     ),
                 ),
             ),
         ));
         
         
         $this->add(array(
             'name' => 'motor',
             'required' => false,
             'filters' => array(
                 array('name' => 'StripTags'),
                 array('name' => 'StringTrim'),
             ),
             'validators' => array(
                 array(
                     'name' => 'StringLength',
                     'options' => array(
                         'encoding' => 'UTF-8',
                         'max' => 3,
                         'min' => 1
                     ),
                 ),
             ),
         ));


     }
 }