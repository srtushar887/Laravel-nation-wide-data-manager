<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class all_document extends Model
{
    use HasFactory;
    protected $fillable = ['practice','patient_name','account_number','dos','document_name','type','status'];

}
