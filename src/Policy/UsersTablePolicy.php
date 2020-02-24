<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Cake\Controller\Controller;
use Authorization\IdentityInterface;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function scopeIndex(IdentityInterface $user, $query)
    {
        // return $query->where(['Users.id' => $user->getIdentifier()]);
        // return $query->where(['Users.id' => $user->id]);
        return $query;
    }

    public function canIndex(IdentityInterface $user)
    {
        return $user->role_id == 1;
    }
}
