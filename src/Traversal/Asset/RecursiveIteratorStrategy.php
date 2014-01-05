<?php

namespace Danizord\RbacBenchmarks\Traversal\Asset;

use Rbac\Role\RoleInterface;
use RecursiveIteratorIterator;

class RecursiveIteratorStrategy
{
    /**
     * @param  RoleInterface[]           $roles
     * @return RecursiveIteratorIterator
     */
    public function traverseRoles(array $roles)
    {
        return new RecursiveIteratorIterator(
            new RecursiveRoleIterator($roles),
            RecursiveIteratorIterator::SELF_FIRST
        );
    }
}
