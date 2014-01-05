<?php

namespace Danizord\RbacBenchmarks\Traversal\Asset;

use Generator;
use Rbac\Role\RoleInterface;
use Traversable;

class GeneratorStrategy
{
    /**
     * @param  RoleInterface[]|Traversable $roles
     * @return Generator
     */
    public function traverseRoles($roles)
    {
        foreach ($roles as $role) {
            yield $role;

            if (!$role instanceof HierarchicalRoleInterface) {
                continue;
            }

            $children = $role->getChildren();

            foreach ($this->traverseRoles($children) as $child) {
                yield $child;
            }
        }
    }
}
