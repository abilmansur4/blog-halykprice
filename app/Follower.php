<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Follower extends Model
{
    protected $guarded = [];
    use NodeTrait;
}
