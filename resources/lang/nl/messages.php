<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Paginaadres',
        'button' => 'Controleren',
        'hint' => 'Gratis · zonder registratie · tot :count controles per uur',
    ],

    'loading' => [
        'fetch' => 'Pagina scannen',
        'extract' => 'Title, description, H1 en hoofdtekst zoeken',
        'ai' => 'Inhoudelijke match en zoekintentie beoordelen',
        'variants' => 'Aanbevelingen en nieuwe varianten voorbereiden',
    ],

    'report' => [
        'again' => 'Nieuwe controle',
        'criteria' => [
            'relevance' => 'Inhoudelijke match',
            'intent' => 'Zoekintentie',
            'ctr' => 'Klikfrequentie (CTR)',
            'technical' => 'Technische eisen',
        ],
        'compare' => 'Nu en na optimalisatie',
        'current' => 'Nu',
        'new' => 'Aanbevolen variant',
        'missing' => '(ontbreekt)',
        'length' => ':count tekens · aanbevolen :min–:max',
        'issues' => 'Problemen',
        'recommendations' => 'Aanbevelingen',
        'variants' => 'Kant-en-klare varianten',
        'variant' => 'Variant :number',
        'copy' => 'Kopiëren',
        'copied' => 'Gekopieerd',
        'note' => 'Het aantal tekens klopt precies. Controleer of de feiten in de varianten (prijzen, termijnen) bij uw aanbod passen.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Geen title', 'text' => 'Zonder title bedenkt Google zelf een kop voor de snippet.'],
        'description_missing' => ['title' => 'Geen description', 'text' => 'Google neemt een willekeurig stuk paginatekst voor de snippet.'],
        'title_length' => ['title' => 'Title is :length tekens lang', 'text' => 'Aanbevolen is :min–:max tekens: korter verkoopt niet, langer wordt afgekapt.'],
        'description_length' => ['title' => 'Description is :length tekens lang', 'text' => 'Aanbevolen is :min–:max tekens: dan past de hele tekst in de snippet.'],
        'several_h1' => ['title' => 'De pagina heeft :count H1-koppen', 'text' => 'Beter één H1 die inhoudelijk bij de title past.'],
        'same_text' => ['title' => 'Title en description zijn gelijk', 'text' => 'De description moet de title aanvullen: een voordeel en een oproep tot actie.'],
        'thin_content' => ['title' => 'Weinig tekst op de pagina', 'text' => 'De pagina lijkt met JavaScript te worden opgebouwd. De beoordeling is alleen gebaseerd op metatags en H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Vul het volledige paginaadres in, bijvoorbeeld https://example.com/page',
        'blocked_host' => 'Dit adres kan niet worden gecontroleerd: de pagina moet bereikbaar zijn via internet',
        'unreachable' => 'De site kon niet worden geopend. Controleer het adres',
        'timeout' => 'De site reageerde niet op tijd. Probeer het opnieuw',
        'http_error' => 'De site reageerde met fout :status. Mogelijk is de pagina afgesloten voor bots',
        'not_html' => 'Dit adres is geen HTML-pagina',
        'too_large' => 'De pagina is te groot om te controleren',
        'too_many_redirects' => 'Te veel omleidingen',
        'no_content' => 'De pagina heeft geen metatags of tekst om te analyseren',
        'ai_unavailable' => 'De analyse is tijdelijk niet beschikbaar. Probeer het over een paar minuten',
        'ai_bad_response' => 'De analyse is tijdelijk niet beschikbaar. Probeer het over een paar minuten',
        'rate_limited' => 'Te veel controles. Probeer het over :minutes min opnieuw',
        'disabled' => 'De dienst is tijdelijk niet beschikbaar',
        'generic' => 'Er ging iets mis. Probeer het opnieuw',
    ],
];
