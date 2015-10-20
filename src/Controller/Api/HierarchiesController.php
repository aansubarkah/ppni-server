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

        if (isset($this->request->query['searchName'])) {
            $searchName = trim($this->request->query['searchName']);
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
                'order' => ['parent_id' => 'ASC'],
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
            'order' => ['Hierarchy.name' => 'ASC'],
            'limit' => $limit
        ];

        $query = trim(strtolower($name));

        if (!empty($query)) {
            $fetchDataOptions['conditions']['LOWER(Hierarchy.name) LIKE'] = '%' . $query . '%';
    }
    $fetchDataOptions['conditions']['active'] = true;

    $hierarchy = $this->Hierarchy->find('all', $fetchDataOptions);

    if ($weather->count() > 0) {
        $data = $hierarchy;
    }

    $this->set([
        'Hierarchy' => $data,
        '_serialize' => ['hierarchy']
    ]);
    }
    }
