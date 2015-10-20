<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hierarchies Controller
 *
 * @property \App\Model\Table\HierarchiesTable $Hierarchies
 */
class HierarchiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentHierarchies']
        ];
        $this->set('hierarchies', $this->paginate($this->Hierarchies));
        $this->set('_serialize', ['hierarchies']);
    }

    /**
     * View method
     *
     * @param string|null $id Hierarchy id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hierarchy = $this->Hierarchies->get($id, [
            'contain' => ['ParentHierarchies', 'ChildHierarchies']
        ]);
        $this->set('hierarchy', $hierarchy);
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hierarchy = $this->Hierarchies->newEntity();
        if ($this->request->is('post')) {
            $hierarchy = $this->Hierarchies->patchEntity($hierarchy, $this->request->data);
            if ($this->Hierarchies->save($hierarchy)) {
                $this->Flash->success(__('The hierarchy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hierarchy could not be saved. Please, try again.'));
            }
        }
        $parentHierarchies = $this->Hierarchies->ParentHierarchies->find('list', ['limit' => 200]);
        $this->set(compact('hierarchy', 'parentHierarchies'));
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hierarchy id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hierarchy = $this->Hierarchies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hierarchy = $this->Hierarchies->patchEntity($hierarchy, $this->request->data);
            if ($this->Hierarchies->save($hierarchy)) {
                $this->Flash->success(__('The hierarchy has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hierarchy could not be saved. Please, try again.'));
            }
        }
        $parentHierarchies = $this->Hierarchies->ParentHierarchies->find('list', ['limit' => 200]);
        $this->set(compact('hierarchy', 'parentHierarchies'));
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hierarchy id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hierarchy = $this->Hierarchies->get($id);
        if ($this->Hierarchies->delete($hierarchy)) {
            $this->Flash->success(__('The hierarchy has been deleted.'));
        } else {
            $this->Flash->error(__('The hierarchy could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
