<?php

return [
    'resource' => [
        'label' => 'Məxfilik sorğusu',
        'plural_label' => 'Məxfilik sorğuları',
    ],

    'fields' => [
        'type' => 'Hüquq',
        'status' => 'Status',
        'requester_name' => 'Sorğu edən',
        'requester_email' => 'Sorğu edənin e-poçtu',
        'details' => 'Təfərrüatlar',
        'response' => 'Cavab',
        'reason' => 'Səbəblər və əsaslanılan müddəa',
        'extension_reason' => 'Sorğunun niyə əlavə vaxta ehtiyacı var',
        'subject' => 'Aidiyyəti olan şəxs',
        'subject_type' => 'Şəxs modeli',
        'subject_id' => 'Şəxs ID-si',
        'verified' => 'Təsdiqlənib',
        'due_at' => 'Son tarix',
        'verified_at' => 'Təsdiqlənmə',
        'completed_at' => 'Bağlanma',
        'created_at' => 'Alınma',
    ],

    'type' => [
        'access' => 'Giriş (maddə 27)',
        'portability' => 'Daşınma (maddə 27)',
        'rectification' => 'Düzəliş (maddə 28)',
        'deletion' => 'Silinmə (maddə 28)',
        'deindexation' => 'İndeksdən çıxarma (maddə 28.1)',
        'automated_decision' => 'Avtomatlaşdırılmış qərar (maddə 12.1)',
    ],

    'status' => [
        'pending' => 'Gözləyir',
        'completed' => 'Tamamlandı',
        'rejected' => 'Rədd edildi',
    ],

    'filters' => [
        'overdue' => 'Gecikmiş (rədd edilmiş sayılır)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Kimliyi təsdiqlə',
            'description' => 'Sorğu verənin kim olduğunu təsdiqləyin və sorğunu onun qeydinə bağlayın. Bundan əvvəl heç nə ixrac edilmir və ya silinmir.',
            'not_found' => 'Bu şəxs üçün qeyd tapılmadı.',
            'success' => 'Kimlik təsdiqləndi.',
        ],
        'fulfil' => [
            'label' => 'İcra et',
            'description' => [
                'access' => 'Şəxsin bəyan edilmiş bütün şəxsi məlumatlarını JSON faylına ixrac edir.',
                'portability' => 'Şəxsin bəyan edilmiş bütün şəxsi məlumatlarını strukturlaşdırılmış və geniş istifadə olunan texnoloji format olan JSON faylına ixrac edir.',
                'deletion' => 'Şəxsin bütün qeydlərini anonimləşdirir. Bu geri qaytarıla bilməz.',
            ],
            'success' => 'Sorğu icra edildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hüquq əl ilə cavablandırılır: şəxsə verdiyiniz yazılı cavabı qeyd edin.',
            'success' => 'Sorğu tamamlandı.',
        ],
        'reject' => [
            'label' => 'Rədd et',
            'description' => 'Səbəbləri və əsaslanılan müddəanı göstərin və şəxsə 30 gün ərzində Commission d\'accès à l\'information-a müraciət edə biləcəyini bildirin (maddə 34).',
            'success' => 'Sorğu rədd edildi.',
        ],
        'extend' => [
            'label' => 'Müddəti uzat',
            'description' => 'Özəl sektor qanunu uzadılma nəzərdə tutmur: bu yalnız quebec-requests.extension təyin edildikdə işləyir.',
            'success' => 'Müddət uzadıldı.',
        ],
        'download' => [
            'label' => 'İxracı yüklə',
        ],
    ],
];
