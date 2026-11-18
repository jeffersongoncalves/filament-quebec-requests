<?php

return [
    'resource' => [
        'label' => 'Datenschutzanfrage',
        'plural_label' => 'Datenschutzanfragen',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'requester_name' => 'Antragsteller',
        'requester_email' => 'E-Mail des Antragstellers',
        'details' => 'Details',
        'response' => 'Antwort',
        'reason' => 'Gründe und herangezogene Bestimmung',
        'extension_reason' => 'Warum die Anfrage mehr Zeit braucht',
        'subject' => 'Betroffene Person',
        'subject_type' => 'Personen-Model',
        'subject_id' => 'Personen-ID',
        'verified' => 'Verifiziert',
        'due_at' => 'Fällig',
        'verified_at' => 'Verifiziert am',
        'completed_at' => 'Abgeschlossen am',
        'created_at' => 'Eingegangen am',
    ],

    'type' => [
        'access' => 'Auskunft (Art. 27)',
        'portability' => 'Übertragbarkeit (Art. 27)',
        'rectification' => 'Berichtigung (Art. 28)',
        'deletion' => 'Löschung (Art. 28)',
        'deindexation' => 'De-Indexierung (Art. 28.1)',
        'automated_decision' => 'Automatisierte Entscheidung (Art. 12.1)',
    ],

    'status' => [
        'pending' => 'Offen',
        'completed' => 'Erledigt',
        'rejected' => 'Abgelehnt',
    ],

    'filters' => [
        'overdue' => 'Überfällig (gilt als abgelehnt)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Identität prüfen',
            'description' => 'Bestätigen Sie, wer die anfragende Person ist, und verknüpfen Sie die Anfrage mit ihrem Datensatz. Vorher wird nichts exportiert oder gelöscht.',
            'not_found' => 'Kein Datensatz für diese Person gefunden.',
            'success' => 'Identität geprüft.',
        ],
        'fulfil' => [
            'label' => 'Ausführen',
            'description' => [
                'access' => 'Exportiert alle deklarierten personenbezogenen Informationen der Person in eine JSON-Datei.',
                'portability' => 'Exportiert alle deklarierten personenbezogenen Informationen der Person in eine JSON-Datei, ein strukturiertes, gängiges technisches Format.',
                'deletion' => 'Anonymisiert alle Datensätze der Person. Dies kann nicht rückgängig gemacht werden.',
            ],
            'success' => 'Anfrage ausgeführt.',
        ],
        'complete' => [
            'label' => 'Abschließen',
            'description' => 'Dieses Recht wird manuell beantwortet: Erfassen Sie die schriftliche Antwort, die Sie der Person gegeben haben.',
            'success' => 'Anfrage abgeschlossen.',
        ],
        'reject' => [
            'label' => 'Ablehnen',
            'description' => 'Nennen Sie die Gründe und die herangezogene Bestimmung und weisen Sie die Person darauf hin, dass sie sich binnen 30 Tagen an die Commission d\'accès à l\'information wenden kann (Art. 34).',
            'success' => 'Anfrage abgelehnt.',
        ],
        'extend' => [
            'label' => 'Frist verlängern',
            'description' => 'Das Gesetz für den Privatsektor sieht keine Verlängerung vor: Dies funktioniert nur, wenn quebec-requests.extension gesetzt ist.',
            'success' => 'Frist verlängert.',
        ],
        'download' => [
            'label' => 'Export herunterladen',
        ],
    ],
];
