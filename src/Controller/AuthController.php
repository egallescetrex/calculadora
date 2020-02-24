<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Auth Controller
 *
 *
 * @method \App\Model\Entity\Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    public function login()
    {
        // allow access without restriction of access policies
        $this->Authorization->skipAuthorization();

        // validate user
        $user = $this->Authentication->getIdentity();
        //$user = $this->request->getAttribute('identity');

        if ($user) {
            //dd($user);
            $redirect = $this->request->getQuery(
                'redirect',
                ['controller' => 'Pages', 'action' => 'display', 'home']
            );
            return $this->redirect($redirect);
        }

        // authenticate user
        if ($this->request->is('post')) {

            $result = $this->Authentication->getResult();

            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {

                $redirect = $this->request->getQuery(
                    'redirect',
                    ['controller' => 'Pages', 'action' => 'display', 'home']
                );

                return $this->redirect($redirect);

            } else {

                $this->Flash->error(__('Error user credentials.'));
            }
        }
    }


    public function logout()
    {
        // allow access without restriction of access policies
        $this->Authorization->skipAuthorization();

        $this->Authentication->logout();
        $this->Flash->success(__('Logout'));
        $this->redirect(['action' => 'login']);

        /* $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        } */
    }
}
