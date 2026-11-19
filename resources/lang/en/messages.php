<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => 'Page address',
        'button' => 'Check',
        'hint' => 'Free · no sign-up · up to :count checks per hour',
    ],

    'loading' => [
        'fetch' => 'Scanning the page',
        'extract' => 'Finding the title, description, H1 and main text',
        'ai' => 'Rating content match and search intent',
        'variants' => 'Preparing recommendations and new variants',
    ],

    'report' => [
        'again' => 'New check',
        'criteria' => [
            'relevance' => 'Content match',
            'intent' => 'Search intent',
            'ctr' => 'Click appeal (CTR)',
            'technical' => 'Technical requirements',
        ],
        'compare' => 'Now and after optimisation',
        'current' => 'Now',
        'new' => 'Recommended variant',
        'missing' => '(none)',
        'length' => ':count chars · recommended :min–:max',
        'issues' => 'Issues',
        'recommendations' => 'Recommendations',
        'variants' => 'Ready-made variants',
        'variant' => 'Variant :number',
        'copy' => 'Copy',
        'copied' => 'Copied',
        'note' => 'Character counts are exact. Check that the facts in the variants (prices, deadlines) match your offer.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'No title', 'text' => 'Without a title Google will make up a snippet headline itself.'],
        'description_missing' => ['title' => 'No description', 'text' => 'Google will take a random piece of page text for the snippet.'],
        'title_length' => ['title' => 'Title is :length characters long', 'text' => 'Recommended :min–:max characters: shorter does not sell, longer gets cut off.'],
        'description_length' => ['title' => 'Description is :length characters long', 'text' => 'Recommended :min–:max characters: then the whole text fits into the snippet.'],
        'several_h1' => ['title' => 'The page has :count H1 headings', 'text' => 'One H1 that matches the title in meaning is better.'],
        'same_text' => ['title' => 'Title and description are the same', 'text' => 'The description should add to the title: a benefit and a call to action.'],
        'thin_content' => ['title' => 'Little text on the page', 'text' => 'The page seems to be rendered by JavaScript. The score is based on meta tags and H1 only.'],
    ],

    'errors' => [
        'invalid_url' => 'Enter the full page address, for example https://example.com/page',
        'blocked_host' => 'This address cannot be checked: the page must be reachable from the internet',
        'unreachable' => 'Could not open the site. Check the address',
        'timeout' => 'The site did not respond in time. Please try again',
        'http_error' => 'The site responded with error :status. The page may be closed to bots',
        'not_html' => 'This address is not an HTML page',
        'too_large' => 'The page is too large to check',
        'too_many_redirects' => 'Too many redirects',
        'no_content' => 'The page has no meta tags or text to analyse',
        'ai_unavailable' => 'The analysis is temporarily unavailable. Try again in a few minutes',
        'ai_bad_response' => 'The analysis is temporarily unavailable. Try again in a few minutes',
        'rate_limited' => 'Too many checks. Try again in :minutes min',
        'disabled' => 'The service is temporarily unavailable',
        'generic' => 'Something went wrong. Please try again',
    ],
];
