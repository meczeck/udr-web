<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'department_id',
        'course_id',
        'phone',
        'role_as'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dissertations()
    {
        return $this->hasMany(Dissertation::class, 'supervisor_id');
    }

    public function StudentDissertation()
    {
        return $this->hasOne(Dissertation::class, 'student_id');
    }

    public function studentCourse()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function userDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
