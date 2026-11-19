<?php

return [
    'form' => [
        'label' => 'Indirizzo della pagina',
        'button' => 'Verifica',
        'hint' => 'Gratis · senza registrazione · fino a :count verifiche all’ora',
    ],

    'loading' => [
        'fetch' => 'Scansione della pagina',
        'extract' => 'Ricerca di title, description, H1 e testo principale',
        'ai' => 'Valutazione di pertinenza e intento di ricerca',
        'variants' => 'Preparazione di consigli e nuove varianti',
    ],

    'report' => [
        'again' => 'Nuova verifica',
        'criteria' => [
            'relevance' => 'Pertinenza del contenuto',
            'intent' => 'Intento di ricerca',
            'ctr' => 'Percentuale di clic (CTR)',
            'technical' => 'Requisiti tecnici',
        ],
        'compare' => 'Ora e dopo l’ottimizzazione',
        'current' => 'Ora',
        'new' => 'Variante consigliata',
        'missing' => '(assente)',
        'length' => ':count caratt. · consigliato :min–:max',
        'issues' => 'Problemi',
        'recommendations' => 'Consigli',
        'variants' => 'Varianti pronte',
        'variant' => 'Variante :number',
        'copy' => 'Copia',
        'copied' => 'Copiato',
        'note' => 'Il numero di caratteri è esatto. Verifica che i fatti nelle varianti (prezzi, tempi) corrispondano alla tua offerta.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Manca il title', 'text' => 'Senza title Google inventerà da solo il titolo dello snippet.'],
        'description_missing' => ['title' => 'Manca la description', 'text' => 'Google userà un pezzo casuale del testo della pagina per lo snippet.'],
        'title_length' => ['title' => 'Il title è lungo :length caratteri', 'text' => 'Consigliati :min–:max caratteri: più corto non vende, più lungo viene tagliato.'],
        'description_length' => ['title' => 'La description è lunga :length caratteri', 'text' => 'Consigliati :min–:max caratteri: così tutto il testo entra nello snippet.'],
        'several_h1' => ['title' => 'La pagina ha :count titoli H1', 'text' => 'Meglio un solo H1, coerente con il title.'],
        'same_text' => ['title' => 'Title e description sono uguali', 'text' => 'La description deve completare il title: un vantaggio e un invito all’azione.'],
        'thin_content' => ['title' => 'Poco testo nella pagina', 'text' => 'Sembra che la pagina sia generata con JavaScript. La valutazione si basa solo sui meta tag e sull’H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Inserisci l’indirizzo completo della pagina, ad esempio https://example.com/page',
        'blocked_host' => 'Questo indirizzo non può essere verificato: la pagina deve essere raggiungibile da internet',
        'unreachable' => 'Impossibile aprire il sito. Controlla l’indirizzo',
        'timeout' => 'Il sito non ha risposto in tempo. Riprova',
        'http_error' => 'Il sito ha risposto con l’errore :status. Forse la pagina è chiusa ai bot',
        'not_html' => 'Questo indirizzo non è una pagina HTML',
        'too_large' => 'La pagina è troppo grande per la verifica',
        'too_many_redirects' => 'Troppi reindirizzamenti',
        'no_content' => 'La pagina non contiene meta tag né testo da analizzare',
        'ai_unavailable' => 'L’analisi non è temporaneamente disponibile. Riprova tra qualche minuto',
        'ai_bad_response' => 'L’analisi non è temporaneamente disponibile. Riprova tra qualche minuto',
        'rate_limited' => 'Troppe verifiche. Riprova tra :minutes min',
        'disabled' => 'Il servizio non è temporaneamente disponibile',
        'generic' => 'Qualcosa è andato storto. Riprova',
    ],
];
