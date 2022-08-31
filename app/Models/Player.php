<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'surname',
      'nationality',
      'number',
      'story',
      'height',
      'weight',
      'position',
      'is_injured',
      'born',
      'contract'
    ];
}
