<?php 
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index(){
        return view('login/index');
    }

    public function process()
    {
        $user = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $dataUser = $user->where([
            'email' => $email,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'email' => $dataUser['email'],
                    'name' => $dataUser['name'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('user'));
            } else {
                session()->setFlashdata('error', 'Incorrect email & password');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'User not found');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}