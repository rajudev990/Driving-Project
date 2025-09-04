<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseComplete extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
}
