<?php
return ['Settings' => ['Maintenance' => [
    'groups' => [
        'Maintenance' => [
            'label' => 'Maintenance'
        ],
    ],
    'schema' => [
        'Maintenance.enabled' => [
            'group' => 'Maintenance',
            'type' => 'boolean',
            'required' => false,
            'default' => false,
        ],
        'Maintenance.title' => [
            'description' => 'Maintenance banner title',
            'group' => 'Maintenance',
            'type' => 'string',
            'required' => false,
        ],
        'Maintenance.className' => [
            'description' => 'Maintenance banner CSS class name',
            'group' => 'Maintenance',
            'type' => 'string',
            'required' => false,
            'default' => 'warning'
        ],
        'Maintenance.html' => [
            'description' => 'Maintenance banner CSS class name',
            'group' => 'Maintenance',
            'type' => 'text',
            'required' => false,
        ],
    ],
]]];