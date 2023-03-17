<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function customer() {
        return $this->hasOne(Customer::class);
    }

    public function isCustomer() {
        return $this->customer()->exists();
    }

    public function employee() {
        return $this->hasOne(Employee::class);
    }

    public function isEmployee() {
        return $this->employee()->exists();
    }

    public function manager() {
        return $this->hasOne(Manager::class);
    }

    public function isManager() {
        return $this->manager()->exists();
    }

    public function role() {
        if($this->isCustomer()) return 'Customer';
        if($this->isEmployee()) return 'Employee';
        if($this->isManager()) return 'Manager';
    }

}
