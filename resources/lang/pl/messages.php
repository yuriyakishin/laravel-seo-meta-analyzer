<?php

return [
    'form' => [
        'label' => 'Adres strony',
        'button' => 'Sprawdź',
        'hint' => 'Za darmo · bez rejestracji · do :count sprawdzeń na godzinę',
    ],

    'loading' => [
        'fetch' => 'Skanuję stronę',
        'extract' => 'Szukam title, description, H1 i głównego tekstu',
        'ai' => 'Oceniam zgodność z treścią i intencję wyszukiwania',
        'variants' => 'Przygotowuję rekomendacje i nowe warianty',
    ],

    'report' => [
        'again' => 'Nowe sprawdzenie',
        'criteria' => [
            'relevance' => 'Zgodność z treścią',
            'intent' => 'Intencja wyszukiwania',
            'ctr' => 'Klikalność (CTR)',
            'technical' => 'Wymagania techniczne',
        ],
        'compare' => 'Teraz i po optymalizacji',
        'current' => 'Teraz',
        'new' => 'Rekomendowany wariant',
        'missing' => '(brak)',
        'length' => ':count zn. · norma :min–:max',
        'issues' => 'Problemy',
        'recommendations' => 'Rekomendacje',
        'variants' => 'Gotowe warianty',
        'variant' => 'Wariant :number',
        'copy' => 'Kopiuj',
        'copied' => 'Skopiowano',
        'note' => 'Liczba znaków jest dokładna. Sprawdź, czy fakty w wariantach (ceny, terminy) zgadzają się z Twoją ofertą.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Brak title', 'text' => 'Bez title Google sam wymyśli nagłówek snippetu.'],
        'description_missing' => ['title' => 'Brak description', 'text' => 'Google weźmie do snippetu przypadkowy fragment tekstu strony.'],
        'title_length' => ['title' => 'Title ma :length znaków', 'text' => 'Norma to :min–:max znaków: krótszy nie sprzedaje, dłuższy zostanie obcięty.'],
        'description_length' => ['title' => 'Description ma :length znaków', 'text' => 'Norma to :min–:max znaków: wtedy cały tekst zmieści się w snippecie.'],
        'several_h1' => ['title' => 'Strona ma :count nagłówki H1', 'text' => 'Lepiej jeden H1, zgodny treścią z title.'],
        'same_text' => ['title' => 'Title i description są takie same', 'text' => 'Description powinien uzupełniać title: korzyść i wezwanie do działania.'],
        'thin_content' => ['title' => 'Mało tekstu na stronie', 'text' => 'Wygląda na to, że strona jest renderowana przez JavaScript. Ocena opiera się tylko na metatagach i H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Podaj pełny adres strony, np. https://example.com/page',
        'blocked_host' => 'Tego adresu nie można sprawdzić: strona musi być dostępna z internetu',
        'unreachable' => 'Nie udało się otworzyć strony. Sprawdź adres',
        'timeout' => 'Strona nie odpowiedziała na czas. Spróbuj ponownie',
        'http_error' => 'Strona odpowiedziała błędem :status. Możliwe, że jest zamknięta dla botów',
        'not_html' => 'Pod tym adresem nie ma strony HTML',
        'too_large' => 'Strona jest zbyt duża do sprawdzenia',
        'too_many_redirects' => 'Zbyt wiele przekierowań',
        'no_content' => 'Na stronie nie ma metatagów ani tekstu do analizy',
        'ai_unavailable' => 'Analiza jest chwilowo niedostępna. Spróbuj za kilka minut',
        'ai_bad_response' => 'Analiza jest chwilowo niedostępna. Spróbuj za kilka minut',
        'rate_limited' => 'Zbyt wiele sprawdzeń. Spróbuj za :minutes min',
        'disabled' => 'Usługa jest chwilowo niedostępna',
        'generic' => 'Coś poszło nie tak. Spróbuj ponownie',
    ],
];
