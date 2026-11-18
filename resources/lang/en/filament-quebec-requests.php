<?php

return [
    'resource' => [
        'label' => 'Privacy request',
        'plural_label' => 'Privacy requests',
    ],

    'fields' => [
        'type' => 'Right',
        'status' => 'Status',
        'requester_name' => 'Requester',
        'requester_email' => 'Requester email',
        'details' => 'Details',
        'response' => 'Response',
        'reason' => 'Reasons and provision relied on',
        'extension_reason' => 'Why the request needs more time',
        'subject' => 'Person concerned',
        'subject_type' => 'Person model',
        'subject_id' => 'Person ID',
        'verified' => 'Verified',
        'due_at' => 'Due',
        'verified_at' => 'Verified at',
        'completed_at' => 'Closed at',
        'created_at' => 'Received at',
    ],

    'type' => [
        'access' => 'Access (s. 27)',
        'portability' => 'Portability (s. 27)',
        'rectification' => 'Rectification (s. 28)',
        'deletion' => 'Deletion (s. 28)',
        'deindexation' => 'De-indexation (s. 28.1)',
        'automated_decision' => 'Automated decision (s. 12.1)',
    ],

    'status' => [
        'pending' => 'Pending',
        'completed' => 'Completed',
        'rejected' => 'Refused',
    ],

    'filters' => [
        'overdue' => 'Overdue (deemed refused)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Verify identity',
            'description' => 'Confirm who the requester is and link the request to their record. Nothing is exported or deleted before this.',
            'not_found' => 'No record found for this person.',
            'success' => 'Identity verified.',
        ],
        'fulfil' => [
            'label' => 'Fulfil',
            'description' => [
                'access' => 'Export every declared personal information of the person to a JSON file.',
                'portability' => 'Export every declared personal information of the person to a JSON file, a structured, commonly used technological format.',
                'deletion' => 'Anonymize every record of the person. This cannot be undone.',
            ],
            'success' => 'Request fulfilled.',
        ],
        'complete' => [
            'label' => 'Complete',
            'description' => 'This right is answered by hand: record the written answer you gave the person.',
            'success' => 'Request completed.',
        ],
        'reject' => [
            'label' => 'Refuse',
            'description' => 'Give the reasons and the provision relied on, and tell the person they may apply to the Commission d\'accès à l\'information within 30 days (s. 34).',
            'success' => 'Request refused.',
        ],
        'extend' => [
            'label' => 'Extend the deadline',
            'description' => 'The private sector act sets no extension: this only works when quebec-requests.extension is set.',
            'success' => 'Deadline extended.',
        ],
        'download' => [
            'label' => 'Download export',
        ],
    ],
];
