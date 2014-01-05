<?php

namespace Danizord\RbacBenchmarks\Traversal\Asset;

use ArrayIterator;
use Rbac\Role\RoleInterface;
use RecursiveIterator;

class RecursiveRoleIterator extends ArrayIterator implements RecursiveIterator
{
    /**
     * @return bool
     */
    public function valid()
    {
        return $this->current() instanceof RoleInterface;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        $current = $this->current();

        if (!$current instanceof HierarchicalRoleInterface) {
            return false;
        }

        if (empty($current->getChildren())) {
            return false;
        }

        return true;
    }

    /**
     * @return RecursiveRoleIterator
     */
    public function getChildren()
    {
        return new RecursiveRoleIterator($this->current()->getChildren());
    }
}
