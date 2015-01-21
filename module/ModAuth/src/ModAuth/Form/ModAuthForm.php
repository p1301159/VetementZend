<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace modAuth\Form;

 use Zend\Form\Form;

 class ModAuthForm extends Form
 {
     public function __construct($name = null)
             
     {
         // we want to ignore the name passed
         parent::__construct('modAuth');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'user_name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Username',
             ),
         
         ));
         $this->add(array(
             'name' => 'pass_word',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Password',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }