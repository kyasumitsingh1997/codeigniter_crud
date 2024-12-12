<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class StudentModel extends Model
{
    protected $table = 'students';

    protected $allowedFields = ['student_name','student_class','student_age','student_gender'];
 
}


?>