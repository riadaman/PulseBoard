<?php
namespace App\Services;

use App\Models\DeploymentChecks;

class DeploymentCheckServices
{

  public function getProject($perPage = 10)
    {
        return DeploymentChecks::select('id', 'name', 'is_completed')->paginate($perPage);
    }
}
