<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
     'controllers' => array(
         'invokables' => array(
             'ModAuth\Controller\ModAuth' => 'ModAuth\Controller\ModAuthController',
         ),
     ),
    
     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'modAuth' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/modAuth[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'ModAuth\Controller\ModAuth',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
    
    
     'view_manager' => array(
         'template_path_stack' => array(
             'modAuth' => __DIR__ . '/../view',
         ),
     ),
 );
