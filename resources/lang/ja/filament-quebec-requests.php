<?php

return [
    'resource' => [
        'label' => 'プライバシー請求',
        'plural_label' => 'プライバシー請求',
    ],

    'fields' => [
        'type' => '権利',
        'status' => 'ステータス',
        'requester_name' => '請求者',
        'requester_email' => '請求者のメール',
        'details' => '詳細',
        'response' => '回答',
        'reason' => '理由と根拠条項',
        'extension_reason' => '追加の時間が必要な理由',
        'subject' => '本人',
        'subject_type' => '本人のモデル',
        'subject_id' => '本人のID',
        'verified' => '本人確認済み',
        'due_at' => '期限',
        'verified_at' => '本人確認日時',
        'completed_at' => '完了日時',
        'created_at' => '受付日時',
    ],

    'type' => [
        'access' => 'アクセス（第27条）',
        'portability' => 'ポータビリティ（第27条）',
        'rectification' => '訂正（第28条）',
        'deletion' => '削除（第28条）',
        'deindexation' => 'インデックス削除（第28.1条）',
        'automated_decision' => '自動化された決定（第12.1条）',
    ],

    'status' => [
        'pending' => '保留中',
        'completed' => '完了',
        'rejected' => '拒否',
    ],

    'filters' => [
        'overdue' => '期限超過（拒否とみなす）',
    ],

    'actions' => [
        'verify' => [
            'label' => '本人確認',
            'description' => '請求者の身元を確認し、請求をその人のレコードに紐付けます。それまでは何もエクスポートも削除もされません。',
            'not_found' => 'この人のレコードが見つかりません。',
            'success' => '本人確認が完了しました。',
        ],
        'fulfil' => [
            'label' => '対応する',
            'description' => [
                'access' => '本人について申告されたすべての個人情報を JSON ファイルにエクスポートします。',
                'portability' => '本人について申告されたすべての個人情報を、構造化され一般的に使用される技術形式である JSON ファイルにエクスポートします。',
                'deletion' => '本人のすべてのレコードを匿名化します。元に戻せません。',
            ],
            'success' => '請求に対応しました。',
        ],
        'complete' => [
            'label' => '完了にする',
            'description' => 'この権利は手作業で対応します。本人に送った書面の回答を記録してください。',
            'success' => '請求を完了しました。',
        ],
        'reject' => [
            'label' => '拒否',
            'description' => '理由と根拠条項を示し、本人が30日以内に Commission d\'accès à l\'information に申し立てできることを伝えてください（第34条）。',
            'success' => '請求を拒否しました。',
        ],
        'extend' => [
            'label' => '期限を延長',
            'description' => '民間部門法は延長を定めていません。quebec-requests.extension が設定されている場合にのみ機能します。',
            'success' => '期限を延長しました。',
        ],
        'download' => [
            'label' => 'エクスポートをダウンロード',
        ],
    ],
];
