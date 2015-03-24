<?php
namespace CakeAutoAdmin\Controller;

use CakeAutoAdmin\Controller\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Hash;
use Cake\Utility\Inflector;

class AdminController extends AppController
{

    public $defaultconfig = [
        'featured' => [
            'Users'
        ]
    ];

    /**
     * Before Filter
     *
     * @param Event $event Instance event.
     * @return void|\Cake\Network\Response
     */
    public function beforeFilter(Event $event)
    {
        $auth = TableRegistry::get(Configure::read('CakeAutoAdmin.authmodel'));
        if ($this->Auth->user('id')) {
            $user = $auth->get($this->Auth->user('id'));
            $allowed = $auth->AutoAdminIsAuthorized($user);
            if (!$allowed) {
                throw new ForbiddenException('You are not authorized.');
            }
        } else {
            $session = $this->request->session();
            $session->write('Auth.redirect', $this->request->here());
            if ($this->Auth->config('loginAction')) {
                return $this->redirect($this->Auth->config('loginAction'));
            } else {
                //TO DO: Cakephp Defaults instead
                return $this->redirect(Router::url(['controller' => 'Users', 'action' => 'login', 'plugin' => false]));
            }
        }

        $modelMenu = array();
        foreach (ConnectionManager::get('default')->schemaCollection()->listTables() as $table) {
            $modelMenu[Inflector::classify($table)] = Inflector::humanize($table);
        }

        if (isset($this->request->params['model'])) {
            $table = $this->request->params['model'];
            $this->table = TableRegistry::get($table);
            if (isset($this->table->autoAdminConfig)) {
                $defaultconfig = Hash::merge($this->defaultconfig, $this->table->autoAdminConfig);
            } else {
                $defaultconfig = $this->defaultconfig;
            }
        }

        $this->set(compact(['modelMenu', 'defaultconfig']));
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading
     * components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Dashboard
     *
     * First screen that is seen when an admin logs in.
     *
     * @return void
     */
    public function dashboard()
    {
    }

    /**
     * Listing
     *
     * Contains paginated results for provided table.
     *
     * @return void
     */
    public function listing()
    {
        $records = $this->paginate($this->table);
        $this->set(compact(['records']));
    }

    /**
     * Edit
     *
     * Auto generated form to either add or edit a record in a table.
     *
     * @return void
     */
    public function edit($id = null)
    {
        //Check to ensure the model exists
        if (!isset($this->table)) {
            throw new NotFoundException('Model does not exist');
        }

        //Check to ensure the specified record exists if an id is provided
        $record = $this->table->get($id);
        if (!empty($id)) {
            if (!$record) {
                throw new NotFoundException('Record does not exist');
            }
        }

        //get columns from specified table
        $columns = $this->table->schema()->columns();
        $fields = [];
        //Iterate over columns, building an array of column properties
        foreach ($columns as $key => $column) {
            $fields[$column] = $this->table->schema()->column($column);
        }

        //Two fields we dont want to include, created and modified
        foreach (['created', 'modified'] as $field) {
            if (isset($fields[$field])) {
                unset($fields[$field]);
            }
        }

        //If post, validate table and either create or update
        if ($this->request->is('post')) {
            //If an id is passed, we want to make sure we are updating something that exists
            if (!empty($this->request->data[$this->table->alias()]['id']) && $this->request->data[$this->table->alias()]['id'] != $id) {
                throw new NotFoundException('Record does not exist');
            }

            //Save
        }

        //If creating a new record, build an array of default data
        if (empty($this->request->data)) {
            if ($id) {
                $this->request->data = $this->table->get($id)->toArray();
            } else {
                $data = array();
                foreach ($this->table->schema() as $field => $value) {
                    if (array_key_exists($field, $this->table->autoAdminConfig['default'])) {
                        $data[$field] = $this->table->autoAdminConfig['default'][$field];
                    } elseif (!empty($value['default'])) {
                        $data[$field] = $value['default'];
                    }
                }
                $this->request->data = array($this->table->alias() => $data);
            }
        }

        if ($id) {
            $prefix = 'Edit: ';
        } else {
            $prefix = 'Add: ';
        }

        $title = $prefix . Inflector::humanize($this->table->alias());
        $model = $this->table->table();

        $this->set(compact(['fields', 'title', 'model', 'record']));
    }
}
