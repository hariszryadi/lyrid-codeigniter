<?php 
namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $data = [
        'name'      => 'Admin',
        'email'     => 'admin@lyrid.com',
        'password'  => password_hash('admin@lyrid.com', PASSWORD_BCRYPT)
    ];
    $this->db->table('users')->insert($data);
  }
}