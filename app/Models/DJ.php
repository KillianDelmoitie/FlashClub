<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DJ extends Model
{
    use HasFactory;
    protected $table = 'dj';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'picture', 'priority', 'snapchat', 'facebook', 'instagram', 'linkedin', 'mix'];
}
