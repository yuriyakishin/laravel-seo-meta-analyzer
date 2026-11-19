<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Adresse de la page',
        'button' => 'Vérifier',
        'hint' => 'Gratuit · sans inscription · jusqu’à :count vérifications par heure',
    ],

    'loading' => [
        'fetch' => 'Analyse de la page',
        'extract' => 'Recherche du title, de la description, du H1 et du texte principal',
        'ai' => 'Évaluation de la pertinence et de l’intention de recherche',
        'variants' => 'Préparation des recommandations et des nouvelles variantes',
    ],

    'report' => [
        'again' => 'Nouvelle vérification',
        'criteria' => [
            'relevance' => 'Pertinence du contenu',
            'intent' => 'Intention de recherche',
            'ctr' => 'Taux de clic (CTR)',
            'technical' => 'Exigences techniques',
        ],
        'compare' => 'Maintenant et après optimisation',
        'current' => 'Maintenant',
        'new' => 'Variante recommandée',
        'missing' => '(absent)',
        'length' => ':count car. · recommandé :min–:max',
        'issues' => 'Problèmes',
        'recommendations' => 'Recommandations',
        'variants' => 'Variantes prêtes',
        'variant' => 'Variante :number',
        'copy' => 'Copier',
        'copied' => 'Copié',
        'note' => 'Le nombre de caractères est exact. Vérifiez que les faits des variantes (prix, délais) correspondent à votre offre.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Pas de title', 'text' => 'Sans title, Google invente lui-même le titre du snippet.'],
        'description_missing' => ['title' => 'Pas de description', 'text' => 'Google prendra un morceau aléatoire du texte de la page pour le snippet.'],
        'title_length' => ['title' => 'Le title fait :length caractères', 'text' => 'Recommandé : :min–:max caractères. Plus court, il ne vend pas ; plus long, il est coupé.'],
        'description_length' => ['title' => 'La description fait :length caractères', 'text' => 'Recommandé : :min–:max caractères, pour que tout le texte tienne dans le snippet.'],
        'several_h1' => ['title' => 'La page contient :count titres H1', 'text' => 'Mieux vaut un seul H1, cohérent avec le title.'],
        'same_text' => ['title' => 'Le title et la description sont identiques', 'text' => 'La description doit compléter le title : un avantage et un appel à l’action.'],
        'thin_content' => ['title' => 'Peu de texte sur la page', 'text' => 'La page semble générée en JavaScript. L’évaluation repose uniquement sur les balises meta et le H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Saisissez l’adresse complète de la page, par exemple https://example.com/page',
        'blocked_host' => 'Cette adresse ne peut pas être vérifiée : la page doit être accessible depuis Internet',
        'unreachable' => 'Impossible d’ouvrir le site. Vérifiez l’adresse',
        'timeout' => 'Le site n’a pas répondu à temps. Réessayez',
        'http_error' => 'Le site a répondu par l’erreur :status. La page est peut-être fermée aux robots',
        'not_html' => 'Cette adresse n’est pas une page HTML',
        'too_large' => 'La page est trop volumineuse pour être vérifiée',
        'too_many_redirects' => 'Trop de redirections',
        'no_content' => 'La page ne contient ni balises meta ni texte à analyser',
        'ai_unavailable' => 'L’analyse est temporairement indisponible. Réessayez dans quelques minutes',
        'ai_bad_response' => 'L’analyse est temporairement indisponible. Réessayez dans quelques minutes',
        'rate_limited' => 'Trop de vérifications. Réessayez dans :minutes min',
        'disabled' => 'Le service est temporairement indisponible',
        'generic' => 'Une erreur s’est produite. Réessayez',
    ],
];
