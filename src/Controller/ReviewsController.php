<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 *
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => ['Customers' => ['Users'], 'Products']
        ]);

        $this->set('review', $review);
    }

    /**
     * Add method
     * Add a review to a product given a productId
     * 
     * @param integer $productId
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($productId = null)
    {
        $review = $this->Reviews->newEntity();
        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            $review->customer_id = $this->Reviews
                                        ->Customers
                                        ->find()
                                        ->where(['user_id' => $this->Auth->User('id')])
                                        ->first()
                                        ->id;
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['controller' => 'Products', 'action' => 'view', $productId]);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $this->set(compact('review', 'productId'));
    }
}