<?php 
namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class EmployeeController extends Controller
{
    public function index(){
        $employeeModel = new EmployeeModel();
        $data['employees'] = $employeeModel->orderBy('id', 'DESC')->findAll();

        return view('employee/index', $data);
    }

    public function create(){
        return view('employee/create');
    }
 
    public function store() {
        helper(['form', 'url']);
         
        $validation = $this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'nip' => [
                'rules' => 'required'
            ],
            'photo' => [
                'rules' => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,300]',
            ],
        ]);

        if(!$validation) {
            return view('employee/create', [
                'validation' => $this->validator
            ]);
        } else {

            $employeeModel = new EmployeeModel();
            $dataPhoto = $this->request->getFile('photo');
    		$fileName = $dataPhoto->getRandomName();
            $employeeModel->insert([
                'name' => $this->request->getPost('name'),
                'nip' => $this->request->getPost('nip'),
                'place_of_birth' => $this->request->getPost('place_of_birth'),
                'date_of_birth' => date('Y-m-d', strtotime($this->request->getPost('date_of_birth'))),
                'photo' => $fileName
            ]);

            $dataPhoto->move('uploads/photo/', $fileName);
            session()->setFlashdata('message', 'Employee create successfully');

            return redirect()->to(base_url('employee'));
        }
    }

    public function edit($id){
        $employeeModel = new EmployeeModel();
        $data['employee'] = $employeeModel->find($id);
        return view('employee/edit', $data);
    }

    public function update($id){
        helper(['form', 'url']);
         
        $validation = $this->validate([
            'name' => [
                'rules' => 'required'
            ],
            'nip' => [
                'rules' => 'required'
            ],
            'photo' => [
                'rules' => 'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,300]',
            ],
        ]);

        if(!$validation) {
            $employeeModel = new EmployeeModel();
            return view('employee/edit', [
                'employee' => $employeeModel->find($id),
                'validation' => $this->validator
            ]);
        } else {
            $employeeModel = new EmployeeModel();

            if ($this->request->getFile('photo') != '') {
                $dataPhoto = $this->request->getFile('photo');
                $fileName = $dataPhoto->getRandomName();
                $dataPhoto->move('uploads/photo/', $fileName);

                $path = FCPATH . '/uploads/photo/' . $employeeModel->find($id)['photo'];
                if (file_exists($path)) {
                    unlink($path);
                }
            } else {
                $fileName = $employeeModel->find($id)['photo'];
            }

            $employeeModel->update($id, [
                'name' => $this->request->getPost('name'),
                'nip' => $this->request->getPost('nip'),
                'place_of_birth' => $this->request->getPost('place_of_birth'),
                'date_of_birth' => date('Y-m-d', strtotime($this->request->getPost('date_of_birth'))),
                'photo' => $fileName
            ]);

            session()->setFlashdata('message', 'Employee update successfully');

            return redirect()->to(base_url('employee'));
        }
    }
 
    public function delete($id){
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->find($id);
        
        if($employee) {
            $path = FCPATH . '/uploads/photo/' . $employeeModel->find($id)['photo'];
            if (file_exists($path)) {
                unlink($path);
            }
            $employeeModel->delete($id);
            session()->setFlashdata('message', 'Employee delete successfully');

            return redirect()->to(base_url('employee'));
        }
    }    
}