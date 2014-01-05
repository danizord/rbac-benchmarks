# RBAC Benchmarks

Performance tests for the new traversal strategies that I'm going to propose for the [ZF3 RBAC component prototype](https://github.com/zf-fr/rbac).

## Results
On Intel® Core™ i5 CPU M 480 @ 2.67GHz × 4
```
daniel@Danibook:~/projects/rbac-benchmarks$ php vendor/bin/athletic -p src/ -b vendor/autoload.php

Danizord\RbacBenchmarks\Traversal\GeneratorStrategyEvent
    Method Name                   Iterations    Average Time      Ops/second
    ---------------------------  ------------  --------------    -------------
    flatFirstMatch             : [1,000     ] [0.0000078084469] [128,066.44072]
    flatLastMatch              : [1,000     ] [0.0000445151329] [22,464.27079]
    hierarchicalFirstDepthMatch: [1,000     ] [0.0000128533840] [77,800.52308]
    hierarchicalLastDepthMatch : [1,000     ] [0.0000390281677] [25,622.51979]


Danizord\RbacBenchmarks\Traversal\RecursiveIteratorStrategyEvent
    Method Name                   Iterations    Average Time      Ops/second
    ---------------------------  ------------  --------------    -------------
    flatFirstMatch             : [1,000     ] [0.0000188462734] [53,060.88783]
    flatLastMatch              : [1,000     ] [0.0000955798626] [10,462.45488]
    hierarchicalFirstDepthMatch: [1,000     ] [0.0000269591808] [37,093.11519]
    hierarchicalLastDepthMatch : [1,000     ] [0.0000535430908] [18,676.54602]
```

>Yeah! PHP 5.5 Generators FTW!!!1!

## Running the tests yourself
```
$ composer install
```
```
$ php vendor/bin/athletic -p src/ -b vendor/autoload.php
```
