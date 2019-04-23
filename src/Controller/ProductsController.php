<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // paginate only the products that are available
        $this->paginate = [
            'conditions' => [
                'Products.is_available' => 1,
            ],
            'contain' => ['Categories', 'Manufacturers'],
            'limit' => 8
        ];

        // when there are items in the cart; don't show items already in cart
        $cart = $this->fetchCart();
        if (!empty($cart)) {
            $this->paginate['conditions']['Products.id NOT IN'] = $cart;
        }

        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [
                'Categories',
                'Manufacturers',
                'Reviews' => [
                    'Customers' => [
                        'Users'
                    ]
                ]
            ]
        ]);

        $this->set('product', $product);
    }

    /**
     * Cart method
     * It renders all products that are in the cart
     * 
     * @return \Cake\Http\Response|void
     */
    public function cart ()
    {
        $cart = $this->fetchCart();
        $products = [];

        // if there are items in the cart the paginate them
        // else the empty array declared before will be set
        if (!empty($cart)) {
            $this->paginate = [
                'conditions' => ['Products.id IN' => $cart],
                'contain' => ['Categories', 'Manufacturers'],
                'limit' => 8
            ];
            $products = $this->paginate($this->Products);
        }

        $this->set(compact('products'));
    }

    /**
     * Function to add products to the cart
     * Takes the product's id
     * 
     * @param integer $productId
     * 
     * @return \Cake\Http\Response|void
     */
    public function addToCart ($productId)
    {
        $cart = $this->fetchCart();
        array_push($cart, $productId);
        $this->getRequest()
             ->getSession()
             ->write('cart', $cart);
        
        $this->Flash->success(__('Item successfully added to cart.'));
        $this->redirect($this->referer());
    }

    /**
     * Function to remove products from the cart
     * It takes a product id and uses it to filter the cart array
     * 
     * @param integer $productId
     * 
     * @return \Cake\Http\Response|void
     */
    public function removeFromCart ($productId)
    {
        $cart = $this->fetchCart();

        if (empty($cart)) {
            $this->Flash->error(__('Dude, there are no items in in the cart.'));
            $this->redirect(['action' => 'cart', 'controller' => 'Products']);
        } else {
            // filter the cart by the passed $productId
            // the `use` keyword gives the callable access to the calling function's scope
            $cart = array_filter($cart, function ($val, $key) use ($productId) {
                return $val !== $productId;
            }, ARRAY_FILTER_USE_BOTH);

            //write the update cart back into the session
            $this->getRequest()
                 ->getSession()
                 ->write('cart', $cart);

            $this->Flash->success(__('Item successfully removed from cart.'));
        }
        $this->redirect(['action' => 'cart', 'controller' => 'Products']);
    }

    /**
     * Function to fetch the cart
     * Checks if the cart array is set in the session
     * If not then return an empty array; else return the cart
     * 
     * @return array
     */
    public function fetchCart ()
    {
        $session = $this->getRequest()
                        ->getSession();

        return $session->check('cart') ? $session->read('cart') : [];
    }

    /**
     * Function to reset the cart
     * It fetches the cart and sets it to null
     * 
     * @return null
     */
    public function resetCart () {
        $cart = $this->fetchCart();
        $cart = null;

        $this->getRequest()
             ->getSession()
             ->write('cart', $cart);
    }

    /**
     * Function to checkout items
     * It updates the status of the products in the database
     * After that it resets the cart in the session
     * 
     * @return \Cake\Http\Response|void
     */
    public function checkout () {
        $cart = $this->fetchCart();

        if (empty($cart)) {
            $this->Flash->error(__('Dude, there are no items in in the cart.'));
            $this->redirect(['action' => 'index', 'controller' => 'Products']);
        } else {
            foreach ($cart as $key => $val) {
                $this->createPurchase($this->Auth->User('id'), $val);
                $this->sell($val);
            }
    
            $this->resetCart();
    
            $this->Flash->success(__('The checkout was successful.'));
            $this->redirect(['action' => 'index', 'controller' => 'Products']);
        }
    }

    /**
     * Purchase method
     * This method creates a purchases given a userId and productId
     * 
     * @param integer $userId
     * @param integer $productId
     * 
     * @return boolean
     */
    public function createPurchase ($userId, $productId)
    {
        $purchase = $this->Products
                         ->Users
                         ->Purchases
                         ->newEntity();

        $purchase = $this->Products
                         ->Users
                         ->Purchases
                         ->patchEntity(
                            $purchase,
                            [
                                'user_id' => $userId,
                                'product_id' => $productId
                            ]
                        );

        return $this->Products
                    ->Users
                    ->Purchases
                    ->save($purchase);
    }

    /**
     * Sell function
     * This function marks a product as not available thus selling it
     * It takes a productId
     * 
     * @param integer $productId
     * 
     * @return boolean
     */
    public function sell ($productId)
    {
        $product = $this->Products
                        ->get($productId);

        $product = $this->Products
                        ->patchEntity(
                            $product,
                            ['is_available' => 0]
                        );
        
        return $this->Products
                    ->save($product);
    }

    /**
     * Method to fetch a single active discount on a product
     * 
     * @param integer $productId
     * 
     * @return float|null
     */
    public function getProductDiscount ($productId)
    {
        $discount = $this->Products
                         ->Discounts
                         ->find()
                         ->where(['product_id' => $productId, 'is_active' => 1])
                         ->first();

        return $discount;
    }
}
