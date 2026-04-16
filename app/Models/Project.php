<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeploymentChecks;
class Project extends Model
{
    protected $fillable = [
        'name',
        'owner_email'
    ];
      public function deploymentCheck(){
        return $this->belongsTo(DeploymentChecks::class);
    }
}
