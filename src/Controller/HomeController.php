<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{

      public function initialize(){
        parent::initialize();
      }

       public function beforeFilter(Event $event){
        parent::beforeFilter($event);
      }

      public function index(){
        $this->viewBuilder()->layout('default_2');
      }


      public function sendFish(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
               $data = $this->request->data;
               $this->RequestHandler->renderAs($this, 'json');

               $this->loadModel('Fishes');
               $fish = $this->Fishes->newEntity($data);
               if($this->Fishes->save($fish))
               {
                    $response = ['message'=>'ok'];
                    $this->set(compact('response'));
                    $this->set('_serialize',['response']);
               }else
                 throw new Exception\ForbiddenException(__('ForbiddenException'));

            }
        }
    }
}
