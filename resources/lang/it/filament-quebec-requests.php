<?php

return [
    'resource' => [
        'label' => 'Richiesta sulla privacy',
        'plural_label' => 'Richieste sulla privacy',
    ],

    'fields' => [
        'type' => 'Diritto',
        'status' => 'Stato',
        'requester_name' => 'Richiedente',
        'requester_email' => 'Email del richiedente',
        'details' => 'Dettagli',
        'response' => 'Risposta',
        'reason' => 'Motivi e disposizione invocata',
        'extension_reason' => 'Perché la richiesta richiede più tempo',
        'subject' => 'Persona interessata',
        'subject_type' => 'Modello della persona',
        'subject_id' => 'ID della persona',
        'verified' => 'Verificato',
        'due_at' => 'Scadenza',
        'verified_at' => 'Verificato il',
        'completed_at' => 'Chiuso il',
        'created_at' => 'Ricevuto il',
    ],

    'type' => [
        'access' => 'Accesso (art. 27)',
        'portability' => 'Portabilità (art. 27)',
        'rectification' => 'Rettifica (art. 28)',
        'deletion' => 'Cancellazione (art. 28)',
        'deindexation' => 'Deindicizzazione (art. 28.1)',
        'automated_decision' => 'Decisione automatizzata (art. 12.1)',
    ],

    'status' => [
        'pending' => 'In attesa',
        'completed' => 'Completata',
        'rejected' => 'Rifiutata',
    ],

    'filters' => [
        'overdue' => 'Scaduta (si considera rifiutata)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Verifica identità',
            'description' => 'Conferma chi è il richiedente e collega la richiesta al suo record. Prima di questo non viene esportato né cancellato nulla.',
            'not_found' => 'Nessun record trovato per questa persona.',
            'success' => 'Identità verificata.',
        ],
        'fulfil' => [
            'label' => 'Evadi',
            'description' => [
                'access' => 'Esporta tutte le informazioni personali dichiarate della persona in un file JSON.',
                'portability' => 'Esporta tutte le informazioni personali dichiarate della persona in un file JSON, un formato tecnologico strutturato e di uso comune.',
                'deletion' => 'Anonimizza tutti i record della persona. Non può essere annullato.',
            ],
            'success' => 'Richiesta evasa.',
        ],
        'complete' => [
            'label' => 'Completa',
            'description' => 'Questo diritto viene gestito manualmente: registra la risposta scritta data alla persona.',
            'success' => 'Richiesta completata.',
        ],
        'reject' => [
            'label' => 'Rifiuta',
            'description' => 'Indica i motivi e la disposizione invocata e informa la persona che può rivolgersi alla Commission d\'accès à l\'information entro 30 giorni (art. 34).',
            'success' => 'Richiesta rifiutata.',
        ],
        'extend' => [
            'label' => 'Prorogare la scadenza',
            'description' => 'La legge sul settore privato non prevede proroghe: funziona solo se quebec-requests.extension è impostato.',
            'success' => 'Termine prorogato.',
        ],
        'download' => [
            'label' => 'Scarica esportazione',
        ],
    ],
];
