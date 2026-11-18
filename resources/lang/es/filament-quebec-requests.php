<?php

return [
    'resource' => [
        'label' => 'Solicitud de privacidad',
        'plural_label' => 'Solicitudes de privacidad',
    ],

    'fields' => [
        'type' => 'Derecho',
        'status' => 'Estado',
        'requester_name' => 'Solicitante',
        'requester_email' => 'Correo del solicitante',
        'details' => 'Detalles',
        'response' => 'Respuesta',
        'reason' => 'Motivos y disposición invocada',
        'extension_reason' => 'Por qué la solicitud necesita más tiempo',
        'subject' => 'Persona interesada',
        'subject_type' => 'Modelo de la persona',
        'subject_id' => 'ID de la persona',
        'verified' => 'Verificado',
        'due_at' => 'Plazo',
        'verified_at' => 'Verificado el',
        'completed_at' => 'Cerrado el',
        'created_at' => 'Recibido el',
    ],

    'type' => [
        'access' => 'Acceso (art. 27)',
        'portability' => 'Portabilidad (art. 27)',
        'rectification' => 'Rectificación (art. 28)',
        'deletion' => 'Supresión (art. 28)',
        'deindexation' => 'Desindexación (art. 28.1)',
        'automated_decision' => 'Decisión automatizada (art. 12.1)',
    ],

    'status' => [
        'pending' => 'Pendiente',
        'completed' => 'Completada',
        'rejected' => 'Denegada',
    ],

    'filters' => [
        'overdue' => 'Vencida (se considera denegada)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Verificar identidad',
            'description' => 'Confirme quién es el solicitante y vincule la solicitud a su registro. Nada se exporta ni se suprime antes de esto.',
            'not_found' => 'No se encontró ningún registro de esta persona.',
            'success' => 'Identidad verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'access' => 'Exporta toda la información personal declarada de la persona a un archivo JSON.',
                'portability' => 'Exporta toda la información personal declarada de la persona a un archivo JSON, un formato tecnológico estructurado y de uso común.',
                'deletion' => 'Anonimiza todos los registros de la persona. No se puede deshacer.',
            ],
            'success' => 'Solicitud atendida.',
        ],
        'complete' => [
            'label' => 'Completar',
            'description' => 'Este derecho se atiende manualmente: registre la respuesta escrita que dio a la persona.',
            'success' => 'Solicitud completada.',
        ],
        'reject' => [
            'label' => 'Denegar',
            'description' => 'Indique los motivos y la disposición invocada, e informe a la persona de que puede acudir a la Commission d\'accès à l\'information en un plazo de 30 días (art. 34).',
            'success' => 'Solicitud denegada.',
        ],
        'extend' => [
            'label' => 'Prorrogar el plazo',
            'description' => 'La ley del sector privado no prevé prórroga: esto solo funciona cuando se define quebec-requests.extension.',
            'success' => 'Plazo prorrogado.',
        ],
        'download' => [
            'label' => 'Descargar exportación',
        ],
    ],
];
