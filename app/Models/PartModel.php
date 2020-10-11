<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartModel extends Model
{
    use HasFactory;
    protected $table = "parts";

    protected $fillable = [
        'part_number',
        'job_number',
        'status',
    ];
}
