<?php

return [
    'resource' => [
        'label' => 'Demande relative à la vie privée',
        'plural_label' => 'Demandes relatives à la vie privée',
    ],

    'fields' => [
        'type' => 'Droit',
        'status' => 'Statut',
        'requester_name' => 'Demandeur',
        'requester_email' => 'E-mail du demandeur',
        'details' => 'Détails',
        'response' => 'Réponse',
        'reason' => 'Motifs et disposition invoquée',
        'extension_reason' => 'Pourquoi la demande nécessite plus de temps',
        'subject' => 'Personne concernée',
        'subject_type' => 'Modèle de la personne',
        'subject_id' => 'ID de la personne',
        'verified' => 'Vérifié',
        'due_at' => 'Échéance',
        'verified_at' => 'Vérifié le',
        'completed_at' => 'Clôturé le',
        'created_at' => 'Reçu le',
    ],

    'type' => [
        'access' => 'Accès (art. 27)',
        'portability' => 'Portabilité (art. 27)',
        'rectification' => 'Rectification (art. 28)',
        'deletion' => 'Suppression (art. 28)',
        'deindexation' => 'Désindexation (art. 28.1)',
        'automated_decision' => 'Décision automatisée (art. 12.1)',
    ],

    'status' => [
        'pending' => 'En attente',
        'completed' => 'Traitée',
        'rejected' => 'Refusée',
    ],

    'filters' => [
        'overdue' => 'En retard (réputée refusée)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Vérifier l\'identité',
            'description' => 'Confirmez l\'identité du demandeur et liez la demande à son dossier. Rien n\'est exporté ni supprimé avant cela.',
            'not_found' => 'Aucun dossier trouvé pour cette personne.',
            'success' => 'Identité vérifiée.',
        ],
        'fulfil' => [
            'label' => 'Traiter',
            'description' => [
                'access' => 'Exporte tous les renseignements personnels déclarés de la personne dans un fichier JSON.',
                'portability' => 'Exporte tous les renseignements personnels déclarés de la personne dans un fichier JSON, un format technologique structuré et couramment utilisé.',
                'deletion' => 'Anonymise tous les dossiers de la personne. Cette action est irréversible.',
            ],
            'success' => 'Demande traitée.',
        ],
        'complete' => [
            'label' => 'Clôturer',
            'description' => 'Ce droit est traité manuellement : consignez la réponse écrite que vous avez donnée à la personne.',
            'success' => 'Demande clôturée.',
        ],
        'reject' => [
            'label' => 'Refuser',
            'description' => 'Indiquez les motifs et la disposition invoquée, et informez la personne qu\'elle peut s\'adresser à la Commission d\'accès à l\'information dans les 30 jours (art. 34).',
            'success' => 'Demande refusée.',
        ],
        'extend' => [
            'label' => 'Prolonger le délai',
            'description' => 'La loi sur le secteur privé ne prévoit aucune prolongation : cela ne fonctionne que si quebec-requests.extension est défini.',
            'success' => 'Délai prolongé.',
        ],
        'download' => [
            'label' => 'Télécharger l\'export',
        ],
    ],
];
