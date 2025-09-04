<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];


     public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function amission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
}
