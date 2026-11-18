<?php

return [
    'resource' => [
        'label' => '隐私请求',
        'plural_label' => '隐私请求',
    ],

    'fields' => [
        'type' => '权利',
        'status' => '状态',
        'requester_name' => '请求人',
        'requester_email' => '请求人邮箱',
        'details' => '详情',
        'response' => '答复',
        'reason' => '理由及所依据的条款',
        'extension_reason' => '请求需要更多时间的原因',
        'subject' => '当事人',
        'subject_type' => '当事人模型',
        'subject_id' => '当事人 ID',
        'verified' => '已验证',
        'due_at' => '截止日期',
        'verified_at' => '验证时间',
        'completed_at' => '关闭时间',
        'created_at' => '接收时间',
    ],

    'type' => [
        'access' => '访问（第27条）',
        'portability' => '可携带（第27条）',
        'rectification' => '更正（第28条）',
        'deletion' => '删除（第28条）',
        'deindexation' => '取消索引（第28.1条）',
        'automated_decision' => '自动化决定（第12.1条）',
    ],

    'status' => [
        'pending' => '待处理',
        'completed' => '已完成',
        'rejected' => '已拒绝',
    ],

    'filters' => [
        'overdue' => '逾期（视为拒绝）',
    ],

    'actions' => [
        'verify' => [
            'label' => '验证身份',
            'description' => '确认请求人身份并将请求关联到其记录。在此之前不会导出或删除任何内容。',
            'not_found' => '未找到此人的记录。',
            'success' => '身份已验证。',
        ],
        'fulfil' => [
            'label' => '执行',
            'description' => [
                'access' => '将此人所有已声明的个人信息导出为 JSON 文件。',
                'portability' => '将此人所有已声明的个人信息导出为 JSON 文件，这是一种结构化、常用的技术格式。',
                'deletion' => '匿名化此人的所有记录。此操作无法撤销。',
            ],
            'success' => '请求已执行。',
        ],
        'complete' => [
            'label' => '完成',
            'description' => '此权利需手动处理：记录您给予当事人的书面答复。',
            'success' => '请求已完成。',
        ],
        'reject' => [
            'label' => '拒绝',
            'description' => '说明理由及所依据的条款，并告知当事人可在30天内向 Commission d\'accès à l\'information 提出申请（第34条）。',
            'success' => '请求已拒绝。',
        ],
        'extend' => [
            'label' => '延长期限',
            'description' => '私营部门法未规定延期：仅在设置 quebec-requests.extension 时才生效。',
            'success' => '期限已延长。',
        ],
        'download' => [
            'label' => '下载导出文件',
        ],
    ],
];
