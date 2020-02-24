<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Role;
use Authorization\IdentityInterface;

/**
 * Role policy
 */
class RolePolicy
{
    /**
     * Check if $user can create Role
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Role $role
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Role $role)
    {
        return $user->role_id == 1; // 'super_admin'
    }

    /**
     * Check if $user can update Role
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Role $role
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Role $role)
    {
        return $user->role_id == 1; // 'super_admin'
    }

    /**
     * Check if $user can delete Role
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Role $role
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Role $role)
    {
        return (($user->role_id == 1) && ($role->id > 3)); // 'super_admin'
    }

    /**
     * Check if $user can view Role
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Role $role
     * @return bool
     */
    public function canView(IdentityInterface $user, Role $role)
    {
        return $user->role_id == 1; // 'super_admin'
    }
}
