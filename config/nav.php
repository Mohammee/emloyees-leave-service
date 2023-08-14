<?php

return [

    ['title' => 'Dashboard', 'route' => 'admin.index', 'active' => 'admin.index'],
    [
        'title' => 'Employees',
        'route' => 'admin.employees.index',
        'active' => 'admin.employees.*',
        'sub' => [
        ['title' => 'Employees Control', 'route' => 'admin.employees.index', 'active' => 'admin.employees.index'],
        ['title' => 'Add Employee', 'route' => 'admin.employees.create', 'active' => 'admin.employees.create'],
        ]
    ],

    [
        'title' => 'Leaves',
        'route' => 'admin.leaves.index',
        'active' => 'admin.leaves.*',
        'sub' => [
            ['title' => 'Leaves Control', 'route' => 'admin.leaves.index', 'active' => 'admin.leaves.index'],
            ['title' => 'Add Leave', 'route' => 'admin.leaves.create', 'active' => 'admin.leaves.create'],
        ]
    ],

    ['title' => 'Leave Requests', 'route' => 'admin.leaveRequests.index', 'active' => 'admin.leaveRequests.*'],

];
