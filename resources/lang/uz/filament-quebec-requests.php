<?php

return [
    'resource' => [
        'label' => 'Maxfiylik so\'rovi',
        'plural_label' => 'Maxfiylik so\'rovlari',
    ],

    'fields' => [
        'type' => 'Huquq',
        'status' => 'Holat',
        'requester_name' => 'So\'rovchi',
        'requester_email' => 'So\'rovchining e-pochtasi',
        'details' => 'Tafsilotlar',
        'response' => 'Javob',
        'reason' => 'Sabablar va asos qilingan qoida',
        'extension_reason' => 'So\'rovga nima uchun ko\'proq vaqt kerak',
        'subject' => 'Tegishli shaxs',
        'subject_type' => 'Shaxs modeli',
        'subject_id' => 'Shaxs ID',
        'verified' => 'Tasdiqlangan',
        'due_at' => 'Muddat',
        'verified_at' => 'Tasdiqlangan vaqt',
        'completed_at' => 'Yopilgan vaqt',
        'created_at' => 'Qabul qilingan vaqt',
    ],

    'type' => [
        'access' => 'Kirish (27-modda)',
        'portability' => 'Ko\'chirish (27-modda)',
        'rectification' => 'Tuzatish (28-modda)',
        'deletion' => 'O\'chirish (28-modda)',
        'deindexation' => 'Indeksdan chiqarish (28.1-modda)',
        'automated_decision' => 'Avtomatlashtirilgan qaror (12.1-modda)',
    ],

    'status' => [
        'pending' => 'Kutilmoqda',
        'completed' => 'Bajarildi',
        'rejected' => 'Rad etildi',
    ],

    'filters' => [
        'overdue' => 'Muddati o\'tgan (rad etilgan hisoblanadi)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Shaxsni tasdiqlash',
            'description' => 'So\'rov yuboruvchi kimligini tasdiqlang va so\'rovni uning yozuviga bog\'lang. Bungacha hech narsa eksport qilinmaydi yoki o\'chirilmaydi.',
            'not_found' => 'Bu shaxs uchun yozuv topilmadi.',
            'success' => 'Shaxs tasdiqlandi.',
        ],
        'fulfil' => [
            'label' => 'Bajarish',
            'description' => [
                'access' => 'Shaxsning e\'lon qilingan barcha shaxsiy axborotini JSON fayliga eksport qiladi.',
                'portability' => 'Shaxsning e\'lon qilingan barcha shaxsiy axborotini tuzilgan, keng qo\'llaniladigan texnologik format bo\'lgan JSON fayliga eksport qiladi.',
                'deletion' => 'Shaxsning barcha yozuvlarini anonimlashtiradi. Buni bekor qilib bo\'lmaydi.',
            ],
            'success' => 'So\'rov bajarildi.',
        ],
        'complete' => [
            'label' => 'Yakunlash',
            'description' => 'Bu huquq qo\'lda javoblanadi: shaxsga bergan yozma javobingizni qayd eting.',
            'success' => 'So\'rov yakunlandi.',
        ],
        'reject' => [
            'label' => 'Rad etish',
            'description' => 'Sabablar va asos qilingan qoidani ko\'rsating hamda shaxsga 30 kun ichida Commission d\'accès à l\'information ga murojaat qilishi mumkinligini bildiring (34-modda).',
            'success' => 'So\'rov rad etildi.',
        ],
        'extend' => [
            'label' => 'Muddatni uzaytirish',
            'description' => 'Xususiy sektor qonuni uzaytirishni nazarda tutmaydi: bu faqat quebec-requests.extension o\'rnatilganda ishlaydi.',
            'success' => 'Muddat uzaytirildi.',
        ],
        'download' => [
            'label' => 'Eksportni yuklab olish',
        ],
    ],
];
