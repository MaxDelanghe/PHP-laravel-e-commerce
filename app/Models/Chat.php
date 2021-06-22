<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  use HasFactory;

  protected $fillable = [
      'body',
      'title',
      'dest_id',
      'author_id',
      'readed',
  ];
}
