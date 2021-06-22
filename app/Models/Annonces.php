<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    use HasFactory;

    protected $fillable = [
      'author_id',
      'title',
      'description',
      'prix',
      'year',
      'image',
      'image2',
      'image3',
    ];
}
