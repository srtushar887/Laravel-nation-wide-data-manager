<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_data extends Model
{
    use HasFactory;

    protected $fillable = ['practice','patient_name','account_number','dos','document_name','type','status'];

}
