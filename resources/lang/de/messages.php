<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Seitenadresse',
        'button' => 'Prüfen',
        'hint' => 'Kostenlos · ohne Registrierung · bis zu :count Prüfungen pro Stunde',
    ],

    'loading' => [
        'fetch' => 'Seite wird gescannt',
        'extract' => 'Title, Description, H1 und Haupttext werden gesucht',
        'ai' => 'Inhaltsbezug und Suchintention werden bewertet',
        'variants' => 'Empfehlungen und neue Varianten werden erstellt',
    ],

    'report' => [
        'again' => 'Neue Prüfung',
        'criteria' => [
            'relevance' => 'Inhaltsbezug',
            'intent' => 'Suchintention',
            'ctr' => 'Klickrate (CTR)',
            'technical' => 'Technische Anforderungen',
        ],
        'compare' => 'Jetzt und nach der Optimierung',
        'current' => 'Jetzt',
        'new' => 'Empfohlene Variante',
        'missing' => '(fehlt)',
        'length' => ':count Zeichen · empfohlen :min–:max',
        'issues' => 'Probleme',
        'recommendations' => 'Empfehlungen',
        'variants' => 'Fertige Varianten',
        'variant' => 'Variante :number',
        'copy' => 'Kopieren',
        'copied' => 'Kopiert',
        'note' => 'Die Zeichenzahlen sind exakt. Prüfen Sie, ob die Fakten in den Varianten (Preise, Fristen) zu Ihrem Angebot passen.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Kein Title', 'text' => 'Ohne Title erfindet Google selbst eine Überschrift für das Snippet.'],
        'description_missing' => ['title' => 'Keine Description', 'text' => 'Google nimmt ein zufälliges Stück Seitentext für das Snippet.'],
        'title_length' => ['title' => 'Title ist :length Zeichen lang', 'text' => 'Empfohlen sind :min–:max Zeichen: kürzer verkauft nicht, länger wird abgeschnitten.'],
        'description_length' => ['title' => 'Description ist :length Zeichen lang', 'text' => 'Empfohlen sind :min–:max Zeichen: dann passt der ganze Text ins Snippet.'],
        'several_h1' => ['title' => 'Die Seite hat :count H1-Überschriften', 'text' => 'Besser ist eine H1, die inhaltlich zum Title passt.'],
        'same_text' => ['title' => 'Title und Description sind gleich', 'text' => 'Die Description sollte den Title ergänzen: Nutzen und Handlungsaufforderung.'],
        'thin_content' => ['title' => 'Wenig Text auf der Seite', 'text' => 'Die Seite wird offenbar per JavaScript aufgebaut. Die Bewertung beruht nur auf Meta-Tags und H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Geben Sie die vollständige Seitenadresse ein, z. B. https://example.com/page',
        'blocked_host' => 'Diese Adresse kann nicht geprüft werden: Die Seite muss aus dem Internet erreichbar sein',
        'unreachable' => 'Die Website konnte nicht geöffnet werden. Prüfen Sie die Adresse',
        'timeout' => 'Die Website hat nicht rechtzeitig geantwortet. Versuchen Sie es erneut',
        'http_error' => 'Die Website hat mit Fehler :status geantwortet. Die Seite ist möglicherweise für Bots gesperrt',
        'not_html' => 'Unter dieser Adresse befindet sich keine HTML-Seite',
        'too_large' => 'Die Seite ist zu groß für die Prüfung',
        'too_many_redirects' => 'Zu viele Weiterleitungen',
        'no_content' => 'Die Seite enthält keine Meta-Tags und keinen Text zur Analyse',
        'ai_unavailable' => 'Die Analyse ist vorübergehend nicht verfügbar. Versuchen Sie es in ein paar Minuten',
        'ai_bad_response' => 'Die Analyse ist vorübergehend nicht verfügbar. Versuchen Sie es in ein paar Minuten',
        'rate_limited' => 'Zu viele Prüfungen. Versuchen Sie es in :minutes Min. erneut',
        'disabled' => 'Der Dienst ist vorübergehend nicht verfügbar',
        'generic' => 'Etwas ist schiefgelaufen. Versuchen Sie es erneut',
    ],
];
