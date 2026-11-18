<?php

return [
    'resource' => [
        'label' => 'Wniosek dotyczący prywatności',
        'plural_label' => 'Wnioski dotyczące prywatności',
    ],

    'fields' => [
        'type' => 'Prawo',
        'status' => 'Status',
        'requester_name' => 'Wnioskodawca',
        'requester_email' => 'E-mail wnioskodawcy',
        'details' => 'Szczegóły',
        'response' => 'Odpowiedź',
        'reason' => 'Uzasadnienie i powołany przepis',
        'extension_reason' => 'Dlaczego żądanie wymaga więcej czasu',
        'subject' => 'Osoba, której dotyczy',
        'subject_type' => 'Model osoby',
        'subject_id' => 'ID osoby',
        'verified' => 'Zweryfikowano',
        'due_at' => 'Termin',
        'verified_at' => 'Zweryfikowano dnia',
        'completed_at' => 'Zamknięto',
        'created_at' => 'Otrzymano',
    ],

    'type' => [
        'access' => 'Dostęp (art. 27)',
        'portability' => 'Przenoszalność (art. 27)',
        'rectification' => 'Sprostowanie (art. 28)',
        'deletion' => 'Usunięcie (art. 28)',
        'deindexation' => 'Usunięcie z indeksu (art. 28.1)',
        'automated_decision' => 'Decyzja zautomatyzowana (art. 12.1)',
    ],

    'status' => [
        'pending' => 'Oczekujące',
        'completed' => 'Zrealizowane',
        'rejected' => 'Odmówiono',
    ],

    'filters' => [
        'overdue' => 'Po terminie (uznany za odrzucony)',
    ],

    'actions' => [
        'verify' => [
            'label' => 'Zweryfikuj tożsamość',
            'description' => 'Potwierdź tożsamość wnioskodawcy i powiąż wniosek z jego rekordem. Wcześniej nic nie jest eksportowane ani usuwane.',
            'not_found' => 'Nie znaleziono rekordu tej osoby.',
            'success' => 'Tożsamość zweryfikowana.',
        ],
        'fulfil' => [
            'label' => 'Zrealizuj',
            'description' => [
                'access' => 'Eksportuje wszystkie zadeklarowane informacje osobowe tej osoby do pliku JSON.',
                'portability' => 'Eksportuje wszystkie zadeklarowane informacje osobowe tej osoby do pliku JSON, ustrukturyzowanego, powszechnie używanego formatu technologicznego.',
                'deletion' => 'Anonimizuje wszystkie rekordy tej osoby. Tej operacji nie można cofnąć.',
            ],
            'success' => 'Żądanie zrealizowane.',
        ],
        'complete' => [
            'label' => 'Zakończ',
            'description' => 'Ten wniosek obsługuje się ręcznie: zapisz pisemną odpowiedź udzieloną tej osobie.',
            'success' => 'Żądanie zakończone.',
        ],
        'reject' => [
            'label' => 'Odmów',
            'description' => 'Podaj uzasadnienie i powołany przepis oraz poinformuj osobę, że może zwrócić się do Commission d\'accès à l\'information w ciągu 30 dni (art. 34).',
            'success' => 'Wniosek odrzucony.',
        ],
        'extend' => [
            'label' => 'Przedłuż termin',
            'description' => 'Ustawa dla sektora prywatnego nie przewiduje przedłużenia: działa to tylko, gdy ustawiono quebec-requests.extension.',
            'success' => 'Termin przedłużony.',
        ],
        'download' => [
            'label' => 'Pobierz eksport',
        ],
    ],
];
