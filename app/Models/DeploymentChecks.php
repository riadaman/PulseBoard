<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects;
class DeploymentChecks extends Model
{
     protected $fillable = [
        'project_id',
        'title',
        'is_completed'

    ];
      public function project(){
        return $this->hasMany(Project::class);
    }
}
