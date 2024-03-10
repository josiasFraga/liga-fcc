<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class PatientsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authorization.Authorization');
        //$this->Authorization->authorize(new PromocaoPolicy());
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        //$this->Authentication->addUnauthenticatedActions(['login']); // Ação de login não requer autenticação
        $this->Authorization->skipAuthorization();

        if (!$this->Authentication->getIdentity()) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        return true;
    }

    public function isAuthorized($user)
    {
        // Permitir acesso a todas as ações para usuários logados
        return $this->Authentication->getIdentity() !== null;
    }

    public function index()
    {
        
        $this->set('title', 'Pacientes');

        if ($this->request->is('post')) {
            // Get the search term from the form data
            $searchTerm = $this->request->getData('table_search');
    
            // Perform the search query based on the search term
            $query = $this->Patients
                ->find()
                ->where([
                    'or' => [
                        'Patients.name LIKE' => '%' . $searchTerm . '%',
                        'Patients.birth_date LIKE' => '%' . $searchTerm . '%',
                        'Patients.doctor LIKE' => '%' . $searchTerm . '%',
                        'Patients.lfcc_date LIKE' => '%' . $searchTerm . '%',
                        'Patients.affected_organ LIKE' => '%' . $searchTerm . '%',
                    ]
                ]);
    
            $this->paginate = [
                'limit' => 20, // Set your desired limit per page
            ];
    
            // Paginate the query before fetching the results
            $patients = $this->paginate($query);
    
            // Pass the search results to the view
            $this->set(compact('patients', 'searchTerm'));
        } else {
            // If the form has not been submitted, fetch all the service subcategories as usual
            $this->paginate = [
                // Pagination settings here
            ];
            $patients = $this->paginate($this->Patients);
            $this->set(compact('patients'));
        }
    }


    public function view($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('patient'));
    }



    public function add()
    {
        $patient = $this->Patients->newEmptyEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Patient'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Patient'));
        }
        $this->set(compact('patient'));
    }


    public function edit($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Patient'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Patient'));
        }
        $this->set(compact('patient'));
    }



    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Patient'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Patient'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
