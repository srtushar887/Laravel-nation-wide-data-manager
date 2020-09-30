<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdf_file_data extends Model
{
    use HasFactory;
    protected $fillable=['filename','url'];

}
