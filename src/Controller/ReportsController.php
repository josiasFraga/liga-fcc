<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class ReportsController extends AppController
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

        $data_inicial = date('Y-m-01');
        $data_final = date('Y-m-t');
    
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (!empty($data['start_date'])) {
                $data_inicial = $data['start_date'];
            }
            if (!empty($data['end_date'])) {
                $data_final = $data['end_date'];
            }
        }

        $conditions = [
            'date_of_death >=' => $data_inicial,
            'date_of_death <=' => $data_final
        ];

        $this->loadModel('Patients');
        
        $patients = $this->Patients->find('all')
        ->where($conditions)
        ->orderAsc('date_of_death')
        ->all()
        ->toList();

        // Agrupar os registros por mês e calcular o total de óbitos para cada mês
        $monthlyTotals = [];
        foreach ($patients as $patient) {
            $monthYear = $patient->date_of_death->format('Y-m');
            if (!isset($monthlyTotals[$monthYear])) {
                $monthlyTotals[$monthYear] = 0;
            }
            $monthlyTotals[$monthYear]++;
        }
    
        $totalDeaths = count($patients);
    
        $this->set(compact('patients', 'totalDeaths', 'data_inicial', 'data_final', 'monthlyTotals'));

    }
}