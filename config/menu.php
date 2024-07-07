<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'home',
        'routeName' => 'dashboard',
    ],
    [
        'title' => 'Manajemen Event',
        'icon' => 'calendar_month',
        'sub' => [
            [
                'title' => 'Tambah Event',
                'routeName' => 'event.create',
            ],
            [
                'title' => 'Event Aktif',
                'routeName' => 'event.list',
                'routeParams' => [
                    'status' => 'aktif',
                ]
            ],
            [
                'title' => 'Event Selesai',
                'routeName' => 'event.list',
                'routeParams' => [
                    'status' => 'selesai',
                ]
            ],
        ]
    ],
    [
        'title' => 'Daftar Pengguna',
        'icon' => 'group',
        'routeName' => 'users.index',
    ],
];
