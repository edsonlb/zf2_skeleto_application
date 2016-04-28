<?php
namespace Blog\Factory;

 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;
 use Blog\Service\PostService;
 
 class ListControllerFactory implements FactoryInterface
 {
     /**
      * Create service
      *
      * @param ServiceLocatorInterface $serviceLocator
      *
      * @return mixed
      */
     public function createService(ServiceLocatorInterface $serviceLocator)
     {   
         return new PostService(
             $serviceLocator->get('Blog\Mapper\PostMapperInterface')
         );
         
     }
 }
