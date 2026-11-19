<?php

return [
    'form' => [
        'label' => 'Adresa stránky',
        'button' => 'Zkontrolovat',
        'hint' => 'Zdarma · bez registrace · až :count kontrol za hodinu',
    ],

    'loading' => [
        'fetch' => 'Skenuji stránku',
        'extract' => 'Hledám title, description, H1 a hlavní text',
        'ai' => 'Hodnotím shodu s obsahem a záměr vyhledávání',
        'variants' => 'Připravuji doporučení a nové varianty',
    ],

    'report' => [
        'again' => 'Nová kontrola',
        'criteria' => [
            'relevance' => 'Shoda s obsahem',
            'intent' => 'Záměr vyhledávání',
            'ctr' => 'Míra prokliku (CTR)',
            'technical' => 'Technické požadavky',
        ],
        'compare' => 'Nyní a po optimalizaci',
        'current' => 'Nyní',
        'new' => 'Doporučená varianta',
        'missing' => '(chybí)',
        'length' => ':count zn. · doporučeno :min–:max',
        'issues' => 'Problémy',
        'recommendations' => 'Doporučení',
        'variants' => 'Hotové varianty',
        'variant' => 'Varianta :number',
        'copy' => 'Kopírovat',
        'copied' => 'Zkopírováno',
        'note' => 'Počet znaků je přesný. Zkontrolujte, že fakta ve variantách (ceny, termíny) odpovídají vaší nabídce.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Chybí title', 'text' => 'Bez title si Google nadpis snippetu vymyslí sám.'],
        'description_missing' => ['title' => 'Chybí description', 'text' => 'Google použije do snippetu náhodný kus textu stránky.'],
        'title_length' => ['title' => 'Title má :length znaků', 'text' => 'Doporučeno :min–:max znaků: kratší neprodává, delší se ořízne.'],
        'description_length' => ['title' => 'Description má :length znaků', 'text' => 'Doporučeno :min–:max znaků: pak se celý text vejde do snippetu.'],
        'several_h1' => ['title' => 'Stránka má :count nadpisy H1', 'text' => 'Lepší je jeden H1, který obsahem odpovídá title.'],
        'same_text' => ['title' => 'Title a description jsou stejné', 'text' => 'Description má doplňovat title: přínos a výzva k akci.'],
        'thin_content' => ['title' => 'Na stránce je málo textu', 'text' => 'Stránka se zřejmě vykresluje JavaScriptem. Hodnocení vychází jen z metaznaček a H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Zadejte úplnou adresu stránky, například https://example.com/page',
        'blocked_host' => 'Tuto adresu nelze zkontrolovat: stránka musí být dostupná z internetu',
        'unreachable' => 'Web se nepodařilo otevřít. Zkontrolujte adresu',
        'timeout' => 'Web neodpověděl včas. Zkuste to znovu',
        'http_error' => 'Web odpověděl chybou :status. Stránka může být pro roboty uzavřená',
        'not_html' => 'Na této adrese není HTML stránka',
        'too_large' => 'Stránka je pro kontrolu příliš velká',
        'too_many_redirects' => 'Příliš mnoho přesměrování',
        'no_content' => 'Stránka nemá metaznačky ani text k analýze',
        'ai_unavailable' => 'Analýza je dočasně nedostupná. Zkuste to za několik minut',
        'ai_bad_response' => 'Analýza je dočasně nedostupná. Zkuste to za několik minut',
        'rate_limited' => 'Příliš mnoho kontrol. Zkuste to za :minutes min',
        'disabled' => 'Služba je dočasně nedostupná',
        'generic' => 'Něco se pokazilo. Zkuste to znovu',
    ],
];
