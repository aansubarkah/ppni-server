<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class HierarchiesController extends AppController {

    public $limit = 25;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $limit = $this->limit;
        if (isset($this->request->query['limit'])) {
            if (is_numeric($this->request->query['limit'])) {
                $limit = $this->request->query['limit'];
            }
        }

        if (isset($this->request->query['name'])) {
            $searchName = trim($this->request->query['name']);
            $this->checkExistence($searchName, $limit);
        } else {
            $offset = 0;
            if (isset($this->request->query['page'])) {
                if (is_numeric($this->request->query['page'])) {
                    $offset = $this->request->query['page'] - 1;
                }
            }

            $query = '';
            if (isset($this->request->query['query'])) {
                if (!empty(trim($this->request->query['query']))) {
                    $query = trim($this->request->query['query']);
                }
            }

            $fetchDataOptions = [
                'conditions' => ['active' => true, 'NOT' => ['parent_id' => 0]],
                'order' => ['id' => 'ASC'],
                'limit' => $limit,
                'page' => $offset
            ];

            if (!empty(trim($query))) {
                $fetchDataOptions['conditions']['LOWER(name) LIKE'] = '%' . strtolower($query) . '%';
            }

            $this->paginate = $fetchDataOptions;
            $hierarchies = $this->paginate('Hierarchies');

            $allHierarchy = $this->Hierarchies->find('all', $fetchDataOptions);
            $total = $allHierarchy->count();

            $meta = [
                'total' => $total
            ];
            $this->set([
                'hierarchies' => $hierarchies,
                'meta' => $meta,
                '_serialize' => ['hierarchies', 'meta']
            ]);
        }
    }

    /**
     * jsTree method
     *
     * @return void
     */
    public function tree()
    {
        $query = $this->Hierarchies->find();
        $query->select(['id', 'parent'=>'parent_id', 'text'=>'name']);
        $query->where(['active'=>true]);

        $hierarchies=[];
        foreach($query as $datum){
            $opened = false;
            if($datum['id'] == 0) $opened = true;

            if($datum['parent'] == 0){
                $datum['parent'] = '#';
                $opened = true;
            }
            $hierarchies[] = [
                'id' => $datum['id'],
                'parent' => $datum['parent'],
                'text' => $datum['text'],
                'state' => ['opened' => $opened]
            ];
        }
        $this->set([
            'hierarchies' => $hierarchies,
            '_serialize' => ['hierarchies']
        ]);
    }

    public function checkExistence($name = null, $limit = 25)
    {
        $data = [
            [
                'id' => 0,
                'name' => '',
                'active' => 0
            ]
        ];

        $fetchDataOptions = [
            'order' => ['name' => 'ASC'],
            'limit' => $limit
        ];

        $query = trim(strtolower($name));

        if (!empty($query)) {
            $fetchDataOptions['conditions']['LOWER(name) LIKE'] = '%' . $query . '%';
        }
        $fetchDataOptions['conditions']['active'] = true;

        $hierarchy = $this->Hierarchies->find('all', $fetchDataOptions);

        if ($hierarchy->count() > 0) {
            $data = $hierarchy;
        }

        $this->set([
            'hierarchy' => $data,
            '_serialize' => ['hierarchy']
        ]);
    }
}
