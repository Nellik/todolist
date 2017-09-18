<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Todo extends Eloquent
{
    protected $fillable = [
      'creator',
      'email',
      'description',
      'status',
      'image'
    ];
}
