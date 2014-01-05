<?php

namespace Danizord\RbacBenchmarks\Traversal;

use Athletic\AthleticEvent;
use Rbac\Role\HierarchicalRole;
use Rbac\Role\Role;

class GeneratorStrategyEvent extends AthleticEvent
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new Asset\GeneratorStrategy;
    }

    /**
     * @iterations 1000
     */
    public function flatFirstMatch()
    {
        $grantedRole = new Role('1');
        $grantedRole->addPermission('permission');

        $roles    = [$grantedRole];
        $iterator = $this->strategy->traverseRoles($roles);

        foreach ($iterator as $role) {
            if ($role->hasPermission('permission')) {
                return true;
            }
        }
    }

    /**
     * @iterations 1000
     */
    public function flatLastMatch()
    {
        $grantedRole = new Role('10');
        $grantedRole->addPermission('permission');

        $roles = [
            new Role('1'),
            new Role('2'),
            new Role('3'),
            new Role('4'),
            new Role('5'),
            new Role('6'),
            new Role('7'),
            new Role('8'),
            new Role('9'),
            $grantedRole,
        ];

        $iterator = $this->strategy->traverseRoles($roles);

        foreach ($iterator as $role) {
            if ($role->hasPermission('permission')) {
                return true;
            }
        }
    }

    /**
     * @iterations 1000
     */
    public function hierarchicalFirstDepthMatch()
    {
        $grantedRole = new HierarchicalRole('child 1');
        $grantedRole->addPermission('permission');

        $parent = new HierarchicalRole('parent');
        $parent->addChild($grantedRole);

        $roles    = [$parent];
        $iterator = $this->strategy->traverseRoles($roles);

        foreach ($iterator as $role) {
            if ($role->hasPermission('permission')) {
                return true;
            }
        }
    }

    /**
     * @iterations 1000
     */
    public function hierarchicalLastDepthMatch()
    {
        $grantedRole = new HierarchicalRole('child 10');
        $grantedRole->addPermission('permission');

        $child9 = new HierarchicalRole('child 9');
        $child9->addChild($grantedRole);

        $child8 = new HierarchicalRole('child 8');
        $child8->addChild($child9);

        $child7 = new HierarchicalRole('child 7');
        $child7->addChild($child8);

        $child6 = new HierarchicalRole('child 6');
        $child6->addChild($child7);

        $child5 = new HierarchicalRole('child 5');
        $child5->addChild($child6);

        $child4 = new HierarchicalRole('child 4');
        $child4->addChild($child5);

        $child3 = new HierarchicalRole('child 3');
        $child3->addChild($child4);

        $child2 = new HierarchicalRole('child 2');
        $child2->addChild($child3);

        $child1 = new HierarchicalRole('child 1');
        $child1->addChild($child2);

        $parent = new HierarchicalRole('parent');
        $parent->addChild($child1);

        $roles    = [$parent];
        $iterator = $this->strategy->traverseRoles($roles);

        foreach ($iterator as $role) {
            if ($role->hasPermission('permission')) {
                return true;
            }
        }
    }
}
