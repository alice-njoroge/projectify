<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * mass assignable fields
     * @var array
     */
    protected $fillable = [
      'body',
      'completed'
    ];

    /**
     * Get the project for this task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
