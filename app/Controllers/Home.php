<?php namespace App\Controllers;
use App\Models\Login;
use CodeIgniter\Controller;

class Home extends Controller
{
        function __construct()
        {
                //
                
                // $db = \Config\Database::connect();
        }
        public function index()
        {
                $data['title']="Popular";
                echo view('home',$data);
        }

        public function checkUser()
        {
                
                $validationRules=$this->validate([

                        'username'=>'required',
                        'password'=>'required'

                ]);

                if (!$validationRules) {
                       return $this->index();
                }
                else
                {
                        $receiveDataUsingThis=\Config\Services::request();

                        $formUsername= $receiveDataUsingThis->getPost('username');
                         $formPassword= $receiveDataUsingThis->getPost('password');
                        
                        $login_model = new Login();
                        $user= $login_model->find(1);

                        $db_username=$user['username'];
                        $db_password=$user['password'];

                        if ($formUsername===$db_username && $formPassword===$db_password) 
                        {
                                $session = session();
                                $session->set('username',$formUsername);
                                //$user = $session->get('username');
                                
                                 return $this->response->redirect(site_url('admin/adminDashboard'));
                        }
                        else
                        {
                                $data['invalid_login']='Invalid username or password. please check again.';
                                $data['title']='Popular';
                                return view('home',$data);
                        }
                }
                
        }


        public function dashboard()
        {
                $session = session();
                $user = $session->get('username');
                $data['user']=$user;
                $data['title']="Dashboard";
                //return view('dashboard',$data);

                if (!$session->has('username')) {
                    return $this->response->redirect(site_url('home'));
                }
                else
                    return view('adminDashboard',$data);

        }

        public function logOut()
        {       
                $session = session();
                $session->remove('username');
                echo $session->get('username');
                $session->destroy();
                return $this->response->redirect(site_url('home'));
        }






}