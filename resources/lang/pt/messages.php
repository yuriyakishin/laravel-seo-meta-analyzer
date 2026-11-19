<?php

return [
    'form' => [
        'label' => 'Endereço da página',
        'button' => 'Verificar',
        'hint' => 'Grátis · sem registo · até :count verificações por hora',
    ],

    'loading' => [
        'fetch' => 'A analisar a página',
        'extract' => 'A procurar title, description, H1 e texto principal',
        'ai' => 'A avaliar a relevância e a intenção de pesquisa',
        'variants' => 'A preparar recomendações e novas variantes',
    ],

    'report' => [
        'again' => 'Nova verificação',
        'criteria' => [
            'relevance' => 'Relevância do conteúdo',
            'intent' => 'Intenção de pesquisa',
            'ctr' => 'Taxa de cliques (CTR)',
            'technical' => 'Requisitos técnicos',
        ],
        'compare' => 'Agora e após a otimização',
        'current' => 'Agora',
        'new' => 'Variante recomendada',
        'missing' => '(não existe)',
        'length' => ':count caract. · recomendado :min–:max',
        'issues' => 'Problemas',
        'recommendations' => 'Recomendações',
        'variants' => 'Variantes prontas',
        'variant' => 'Variante :number',
        'copy' => 'Copiar',
        'copied' => 'Copiado',
        'note' => 'O número de caracteres é exato. Confirme que os factos nas variantes (preços, prazos) correspondem à sua oferta.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Sem title', 'text' => 'Sem title, o Google inventa sozinho o título do snippet.'],
        'description_missing' => ['title' => 'Sem description', 'text' => 'O Google usará um pedaço aleatório do texto da página no snippet.'],
        'title_length' => ['title' => 'O title tem :length caracteres', 'text' => 'Recomendado: :min–:max caracteres. Mais curto não vende, mais longo é cortado.'],
        'description_length' => ['title' => 'A description tem :length caracteres', 'text' => 'Recomendado: :min–:max caracteres, para o texto caber inteiro no snippet.'],
        'several_h1' => ['title' => 'A página tem :count títulos H1', 'text' => 'É melhor um só H1, coerente com o title.'],
        'same_text' => ['title' => 'Title e description são iguais', 'text' => 'A description deve complementar o title: um benefício e uma chamada à ação.'],
        'thin_content' => ['title' => 'Pouco texto na página', 'text' => 'Parece que a página é gerada por JavaScript. A avaliação baseia-se apenas nas meta tags e no H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Indique o endereço completo da página, por exemplo https://example.com/page',
        'blocked_host' => 'Este endereço não pode ser verificado: a página tem de estar acessível a partir da internet',
        'unreachable' => 'Não foi possível abrir o site. Verifique o endereço',
        'timeout' => 'O site não respondeu a tempo. Tente novamente',
        'http_error' => 'O site respondeu com o erro :status. A página pode estar fechada a bots',
        'not_html' => 'Este endereço não é uma página HTML',
        'too_large' => 'A página é demasiado grande para verificar',
        'too_many_redirects' => 'Demasiados redirecionamentos',
        'no_content' => 'A página não tem meta tags nem texto para analisar',
        'ai_unavailable' => 'A análise está temporariamente indisponível. Tente dentro de alguns minutos',
        'ai_bad_response' => 'A análise está temporariamente indisponível. Tente dentro de alguns minutos',
        'rate_limited' => 'Demasiadas verificações. Tente dentro de :minutes min',
        'disabled' => 'O serviço está temporariamente indisponível',
        'generic' => 'Algo correu mal. Tente novamente',
    ],
];
