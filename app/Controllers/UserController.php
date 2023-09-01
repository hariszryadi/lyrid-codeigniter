<?php 
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();

        return view('user/index', $data);
    }

    public function create(){
        return view('user/create');
    }
 
    public function store() {
        helper(['form', 'url']);
         
        $validation = $this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required'
            ],
            'password' => [
                'rules' => 'required'
            ],
        ]);

        if(!$validation) {
            return view('user/create', [
                'validation' => $this->validator
            ]);
        } else {

            $userModel = new UserModel();
            $userModel->insert([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
            ]);

            session()->setFlashdata('message', 'User create successfully');

            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id){
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        return view('user/edit', $data);
    }

    public function update($id){
        helper(['form', 'url']);
         
        $validation = $this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'email' => [
                'rules' => 'required'
            ]
        ]);

        if(!$validation) {
            $userModel = new UserModel();
            return view('user/edit', [
                'user' => $userModel->find($id),
                'validation' => $this->validator
            ]);
        } else {

            $userModel = new UserModel();

            if ($this->request->getPost('password') != '') {
                $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
            } else {
                $password = $userModel->find($id)['password'];
            }

            $userModel->update($id, [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => $password
            ]);

            session()->setFlashdata('message', 'User update successfully');

            return redirect()->to(base_url('user'));
        }
    }
 
    public function delete($id){
        $userModel = new UserModel();
        $user = $userModel->find($id);
        
        if($user) {
            $userModel->delete($id);
            session()->setFlashdata('message', 'User delete successfully');

            return redirect()->to(base_url('user'));
        }
    }    
}