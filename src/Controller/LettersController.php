<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Letters Controller
 *
 * @property \App\Model\Table\LettersTable $Letters
 */
class LettersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Senders', 'Vias']
        ];
        $this->set('letters', $this->paginate($this->Letters));
        $this->set('_serialize', ['letters']);
    }

    /**
     * View method
     *
     * @param string|null $id Letter id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $letter = $this->Letters->get($id, [
            'contain' => ['Users', 'Senders', 'Vias', 'Dispositions', 'Evidences']
        ]);
        $this->set('letter', $letter);
        $this->set('_serialize', ['letter']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $letter = $this->Letters->newEntity();
        if ($this->request->is('post')) {
            $letter = $this->Letters->patchEntity($letter, $this->request->data);
            if ($this->Letters->save($letter)) {
                $this->Flash->success(__('The letter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The letter could not be saved. Please, try again.'));
            }
        }
        $users = $this->Letters->Users->find('list', ['limit' => 200]);
        $senders = $this->Letters->Senders->find('list', ['limit' => 200]);
        $vias = $this->Letters->Vias->find('list', ['limit' => 200]);
        $this->set(compact('letter', 'users', 'senders', 'vias'));
        $this->set('_serialize', ['letter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Letter id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $letter = $this->Letters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $letter = $this->Letters->patchEntity($letter, $this->request->data);
            if ($this->Letters->save($letter)) {
                $this->Flash->success(__('The letter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The letter could not be saved. Please, try again.'));
            }
        }
        $users = $this->Letters->Users->find('list', ['limit' => 200]);
        $senders = $this->Letters->Senders->find('list', ['limit' => 200]);
        $vias = $this->Letters->Vias->find('list', ['limit' => 200]);
        $this->set(compact('letter', 'users', 'senders', 'vias'));
        $this->set('_serialize', ['letter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Letter id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $letter = $this->Letters->get($id);
        if ($this->Letters->delete($letter)) {
            $this->Flash->success(__('The letter has been deleted.'));
        } else {
            $this->Flash->error(__('The letter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
