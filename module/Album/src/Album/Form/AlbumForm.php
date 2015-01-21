<?php

namespace Album\Form;

 use Zend\Form\Form;

 class AlbumForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('album');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             'options' => array(
                 'label' => 'nom',
             ),
         ));
         
         $this->add(array(
             'name' => 'artist',
             'type' => 'Text',
             'options' => array(
                 'label' => 'description',
             ),
         ));
         
         $this->add(array(
             'name' => 'image',
             'type' => 'Text',
             'options' => array(
                 'label' => 'image',
             ),
         ));
         
          $this->add(array(
             'name' => 'quantite',
             'type' => 'Text',
             'options' => array(
                 'label' => 'quantité',
             ),
         ));
          
           $this->add(array(
             'name' => 'prix',
             'type' => 'Text',
             'options' => array(
                 'label' => 'prix',
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