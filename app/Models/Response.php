<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'submission_id',
        'type',
        'content',
        'author_id',
        'assigned_id',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_id');
    }
}
