<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\RolesTable;
use Authorization\IdentityInterface;

/**
 * Roles policy
 */
class RolesTablePolicy
{
    public function scopeIndex(IdentityInterface $user, $query)
    {
        // return $query->where(['Roles.id' => $user->getIdentifier()]);
        // return $query->where(['Roles.id' => $user->role_id]);
        return $query;
    }

    public function canIndex(IdentityInterface $user)
    {
        return $user->role_id == 1; // 'super_admin';
    }
}
