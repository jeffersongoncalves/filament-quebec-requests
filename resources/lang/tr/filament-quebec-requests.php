<?php

return [
    'resource' => [
        'label' => 'Gizlilik talebi',
        'plural_label' => 'Gizlilik talepleri',
    ],

    'fields' => [
        'type' => 'Hak',
        'status' => 'Durum',
        'requester_name' => 'Başvuran',
        'requester_email' => 'Başvuranın e-postası',
        'details' => 'Ayrıntılar',
        'response' => 'Yanıt',
        'reason' => 'Gerekçeler ve dayanılan hüküm',
        'extension_reason' => 'Talebin neden daha fazla zamana ihtiyacı var',
        'subject' => 'İlgili kişi',
        'subject_type' => 'Kişi modeli',
        'subject_id' => 'Kişi kimliği',
        'verified' => 'Doğrulandı',
        'due_at' => 'Son tarih',
        'verified_at' => 'Doğrulanma',
        'completed_at' => 'Kapanma',
        'created_at' => 'Alınma',
    ],

    'type' => [
        'access' => 'Erişim (md. 27)',
        'portability' => 'Taşınabilirlik (md. 27)',
        'rectification' => 'Düzeltme (md. 28)',
        'deletion' => 'Silme (md. 28)',
        'deindexation' => 'Dizinden kaldırma (md. 28.1)',
        'automated_decision' => 'Otomatik karar (md. 12.1)',
    ],

    'status' => [
        'pending' => 'Bekliyor',
        'completed' => 'Tamamlandı',
        'rejected' => 'Reddedildi',
    ],

    'filters' => [
        'overdue' => 'Gecikmiş (reddedilmiş sayılır)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Kimliği doğrula',
            'description' => 'Talep edenin kim olduğunu doğrulayın ve talebi kaydına bağlayın. Bundan önce hiçbir şey dışa aktarılmaz veya silinmez.',
            'not_found' => 'Bu kişi için kayıt bulunamadı.',
            'success' => 'Kimlik doğrulandı.',
        ],
        'fulfil' => [
            'label' => 'Yerine getir',
            'description' => [
                'access' => 'Kişinin beyan edilen tüm kişisel bilgilerini bir JSON dosyasına aktarır.',
                'portability' => 'Kişinin beyan edilen tüm kişisel bilgilerini yapılandırılmış, yaygın kullanılan teknolojik bir biçim olan JSON dosyasına aktarır.',
                'deletion' => 'Kişinin tüm kayıtlarını anonimleştirir. Bu işlem geri alınamaz.',
            ],
            'success' => 'Başvuru yerine getirildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hak elle yanıtlanır: kişiye verdiğiniz yazılı yanıtı kaydedin.',
            'success' => 'Başvuru tamamlandı.',
        ],
        'reject' => [
            'label' => 'Reddet',
            'description' => 'Gerekçeleri ve dayanılan hükmü belirtin ve kişiye 30 gün içinde Commission d\'accès à l\'information\'a başvurabileceğini bildirin (md. 34).',
            'success' => 'Talep reddedildi.',
        ],
        'extend' => [
            'label' => 'Süreyi uzat',
            'description' => 'Özel sektör yasası uzatma öngörmez: bu yalnızca quebec-requests.extension ayarlandığında çalışır.',
            'success' => 'Süre uzatıldı.',
        ],
        'download' => [
            'label' => 'Dışa aktarımı indir',
        ],
    ],
];
