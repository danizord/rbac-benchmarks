<?php

namespace Danizord\RbacBenchmarks\Traversal\Asset;

use Rbac\Role\Role;

class HierarchicalRole extends Role implements HierarchicalRoleInterface
{
    /**
     * @var array|RoleInterface[]
     */
    protected $children = [];

    /**
     * {@inheritDoc}
     */
    public function getChildren()
    {
        return $this->children[$this->index];
    }

    /**
     * Add a child role
     *
     * @param RoleInterface $child
     */
    public function addChild(RoleInterface $child)
    {
        $this->children[] = $child;
    }
}
