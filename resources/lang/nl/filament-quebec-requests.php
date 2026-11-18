<?php

return [
    'resource' => [
        'label' => 'Privacyverzoek',
        'plural_label' => 'Privacyverzoeken',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'requester_name' => 'Aanvrager',
        'requester_email' => 'E-mail van de aanvrager',
        'details' => 'Details',
        'response' => 'Antwoord',
        'reason' => 'Redenen en ingeroepen bepaling',
        'extension_reason' => 'Waarom het verzoek meer tijd nodig heeft',
        'subject' => 'Betrokken persoon',
        'subject_type' => 'Persoonsmodel',
        'subject_id' => 'Persoons-ID',
        'verified' => 'Geverifieerd',
        'due_at' => 'Uiterste datum',
        'verified_at' => 'Geverifieerd op',
        'completed_at' => 'Afgesloten op',
        'created_at' => 'Ontvangen op',
    ],

    'type' => [
        'access' => 'Inzage (art. 27)',
        'portability' => 'Overdraagbaarheid (art. 27)',
        'rectification' => 'Rectificatie (art. 28)',
        'deletion' => 'Verwijdering (art. 28)',
        'deindexation' => 'De-indexering (art. 28.1)',
        'automated_decision' => 'Geautomatiseerd besluit (art. 12.1)',
    ],

    'status' => [
        'pending' => 'In behandeling',
        'completed' => 'Afgehandeld',
        'rejected' => 'Geweigerd',
    ],

    'filters' => [
        'overdue' => 'Te laat (geacht geweigerd)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Identiteit verifiëren',
            'description' => 'Bevestig wie de aanvrager is en koppel het verzoek aan diens record. Daarvoor wordt niets geëxporteerd of verwijderd.',
            'not_found' => 'Geen record gevonden voor deze persoon.',
            'success' => 'Identiteit geverifieerd.',
        ],
        'fulfil' => [
            'label' => 'Uitvoeren',
            'description' => [
                'access' => 'Exporteert alle gedeclareerde persoonlijke informatie van de persoon naar een JSON-bestand.',
                'portability' => 'Exporteert alle gedeclareerde persoonlijke informatie van de persoon naar een JSON-bestand, een gestructureerd, gangbaar technologisch formaat.',
                'deletion' => 'Anonimiseert alle records van de persoon. Dit kan niet ongedaan worden gemaakt.',
            ],
            'success' => 'Verzoek uitgevoerd.',
        ],
        'complete' => [
            'label' => 'Afronden',
            'description' => 'Dit recht wordt handmatig beantwoord: leg het schriftelijke antwoord vast dat je de persoon hebt gegeven.',
            'success' => 'Verzoek afgerond.',
        ],
        'reject' => [
            'label' => 'Weigeren',
            'description' => 'Geef de redenen en de ingeroepen bepaling, en vertel de persoon dat die zich binnen 30 dagen tot de Commission d\'accès à l\'information kan wenden (art. 34).',
            'success' => 'Verzoek geweigerd.',
        ],
        'extend' => [
            'label' => 'Termijn verlengen',
            'description' => 'De wet voor de private sector kent geen verlenging: dit werkt alleen als quebec-requests.extension is ingesteld.',
            'success' => 'Termijn verlengd.',
        ],
        'download' => [
            'label' => 'Export downloaden',
        ],
    ],
];
