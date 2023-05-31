<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dissertation extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'supervisor_id',
        'title',
        'abstract',
        'document',
        'year',
    ];

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
