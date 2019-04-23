<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Manufacturers Controller
 *
 * @property \App\Model\Table\ManufacturersTable $Manufacturers
 *
 * @method \App\Model\Entity\Manufacturer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManufacturersController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Manufacturer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('manufacturer', $manufacturer);
    }
}
