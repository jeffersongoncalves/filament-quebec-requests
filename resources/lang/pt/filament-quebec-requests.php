<?php

return [
    'resource' => [
        'label' => 'Pedido de privacidade',
        'plural_label' => 'Pedidos de privacidade',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Estado',
        'requester_name' => 'Requerente',
        'requester_email' => 'E-mail do requerente',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivos e disposição invocada',
        'extension_reason' => 'Porque é que o pedido precisa de mais tempo',
        'subject' => 'Pessoa em causa',
        'subject_type' => 'Modelo da pessoa',
        'subject_id' => 'ID da pessoa',
        'verified' => 'Verificado',
        'due_at' => 'Prazo',
        'verified_at' => 'Verificado em',
        'completed_at' => 'Encerrado em',
        'created_at' => 'Recebido em',
    ],

    'type' => [
        'access' => 'Acesso (art. 27)',
        'portability' => 'Portabilidade (art. 27)',
        'rectification' => 'Retificação (art. 28)',
        'deletion' => 'Eliminação (art. 28)',
        'deindexation' => 'Desindexação (art. 28.1)',
        'automated_decision' => 'Decisão automatizada (art. 12.1)',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluído',
        'rejected' => 'Recusado',
    ],

    'filters' => [
        'overdue' => 'Em atraso (considerado recusado)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o requerente e associe o pedido ao respetivo registo. Nada é exportado ou eliminado antes disso.',
            'not_found' => 'Nenhum registo encontrado para esta pessoa.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Executar',
            'description' => [
                'access' => 'Exporta todas as informações pessoais declaradas da pessoa para um ficheiro JSON.',
                'portability' => 'Exporta todas as informações pessoais declaradas da pessoa para um ficheiro JSON, um formato tecnológico estruturado e de uso corrente.',
                'deletion' => 'Anonimiza todos os registos da pessoa. Não é possível anular.',
            ],
            'success' => 'Pedido executado.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é tratado manualmente: registe a resposta escrita que deu à pessoa.',
            'success' => 'Pedido concluído.',
        ],
        'reject' => [
            'label' => 'Recusar',
            'description' => 'Indique os motivos e a disposição invocada, e informe a pessoa de que pode recorrer à Commission d\'accès à l\'information no prazo de 30 dias (art. 34).',
            'success' => 'Pedido recusado.',
        ],
        'extend' => [
            'label' => 'Prorrogar o prazo',
            'description' => 'A lei do setor privado não prevê prorrogação: isto só funciona quando quebec-requests.extension está definido.',
            'success' => 'Prazo prorrogado.',
        ],
        'download' => [
            'label' => 'Descarregar exportação',
        ],
    ],
];
