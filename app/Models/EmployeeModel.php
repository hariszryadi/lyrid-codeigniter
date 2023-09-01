<?php 
namespace App\Models;
use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name', 'nip', 'place_of_birth', 'date_of_birth', 'photo'];
}