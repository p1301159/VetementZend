<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ModAuth\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use ModAuth\Model\ModAuth;          
 use ModAuth\Form\ModAuthForm; 

 class ModAuthController extends AbstractActionController
 {
     protected $modAuthTable;
     
     public function indexAction()
     {
         return new ViewModel(array(
             'modAuths' => $this->getModAuthTable()->fetchAll(),
         ));
     }

     public function addAction()
     {
         $form = new ModAuthForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $modAuth = new ModAuth();
             $form->setInputFilter($modAuth->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $modAuth->exchangeArray($form->getData());
                 $this->getModAuthTable()->saveModAuth($modAuth);

                 // Redirect to list of modAuths
                 return $this->redirect()->toRoute('success');
             }
         }
         return array('form' => $form);
     }

     public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('modAuth', array(
                        'action' => 'add'
            ));
        }

        // Get the ModAuth with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $modAuth = $this->getModAuthTable()->getModAuth($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('modAuth', array(
                        'action' => 'index'
            ));
        }

        $form = new ModAuthForm();
        $form->bind($modAuth);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($modAuth->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getModAuthTable()->saveModAuth($modAuth);

                // Redirect to list of modAuths
                return $this->redirect()->toRoute('modAuth');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('modAuth');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getModAuthTable()->deleteModAuth($id);
             }

             // Redirect to list of modAuths
             return $this->redirect()->toRoute('modAuth');
         }

         return array(
             'id'    => $id,
             'modAuth' => $this->getModAuthTable()->getModAuth($id)
         );
     }
     
     public function getModAuthTable()
     {
         if (!$this->modAuthTable) {
             $sm = $this->getServiceLocator();
             $this->modAuthTable = $sm->get('ModAuth\Model\ModAuthTable');
         }
         return $this->modAuthTable;
     }
     
     
 }
