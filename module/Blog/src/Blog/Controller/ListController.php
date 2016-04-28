<?php
 namespace Blog\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Blog\Service\PostServiceInterface;

 class ListController extends AbstractActionController
 {
     /**
      * @var \Blog\Service\PostServiceInterface
      */
     protected $postService;
     
     public function __construct(PostServiceInterface $postService)
     {
         $this->postService = $postService;
     }
 }