<?php

return [
    'resource' => [
        'label' => 'Solicitação de privacidade',
        'plural_label' => 'Solicitações de privacidade',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Status',
        'requester_name' => 'Solicitante',
        'requester_email' => 'E-mail do solicitante',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivos e dispositivo legal invocado',
        'extension_reason' => 'Por que o pedido precisa de mais tempo',
        'subject' => 'Pessoa envolvida',
        'subject_type' => 'Model da pessoa',
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
        'deletion' => 'Exclusão (art. 28)',
        'deindexation' => 'Desindexação (art. 28.1)',
        'automated_decision' => 'Decisão automatizada (art. 12.1)',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluída',
        'rejected' => 'Recusada',
    ],

    'filters' => [
        'overdue' => 'Atrasada (considerada recusada)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o solicitante e vincule a solicitação ao registro dele. Nada é exportado ou excluído antes disso.',
            'not_found' => 'Nenhum registro encontrado para esta pessoa.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'access' => 'Exporta todas as informações pessoais declaradas da pessoa para um arquivo JSON.',
                'portability' => 'Exporta todas as informações pessoais declaradas da pessoa para um arquivo JSON, um formato tecnológico estruturado e de uso comum.',
                'deletion' => 'Anonimiza todos os registros da pessoa. Isso não pode ser desfeito.',
            ],
            'success' => 'Solicitação atendida.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é atendido manualmente: registre a resposta escrita que você deu à pessoa.',
            'success' => 'Solicitação concluída.',
        ],
        'reject' => [
            'label' => 'Recusar',
            'description' => 'Informe os motivos e o dispositivo legal invocado, e avise a pessoa de que ela pode recorrer à Commission d\'accès à l\'information em até 30 dias (art. 34).',
            'success' => 'Solicitação recusada.',
        ],
        'extend' => [
            'label' => 'Prorrogar o prazo',
            'description' => 'A lei do setor privado não prevê prorrogação: isto só funciona quando quebec-requests.extension está definido.',
            'success' => 'Prazo prorrogado.',
        ],
        'download' => [
            'label' => 'Baixar exportação',
        ],
    ],
];
