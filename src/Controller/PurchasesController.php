<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Purchases Controller
 *
 * @property \App\Model\Table\PurchasesTable $Purchases
 *
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasesController extends AppController
{
    /**
     * Index method
     * It paginates the currently logged in user's purchases
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['Users.id' => $this->Auth->User('id')],
            'contain' => ['Users', 'Products'],
            'limit' => 10
        ];
        $purchases = $this->paginate($this->Purchases);

        $this->set(compact('purchases'));
    }
}
