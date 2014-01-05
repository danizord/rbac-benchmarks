<?php

namespace Danizord\RbacBenchmarks\Traversal\Asset;

use Rbac\Role\RoleInterface;

/**
 * Interface for a hierarchical role
 *
 * A hierarchical role is a role that can have children.
 */
interface HierarchicalRoleInterface extends RoleInterface
{
    /**
     * Get child roles
     *
     * @return RoleInterface[]|Traversable
     */
    public function getChildren();
}
