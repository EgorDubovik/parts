<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'pert_number',
        'status',
    ];
}
