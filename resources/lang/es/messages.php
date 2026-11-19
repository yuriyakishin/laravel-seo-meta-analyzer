<?php

return [
    'form' => [
        'label' => 'Dirección de la página',
        'button' => 'Comprobar',
        'hint' => 'Gratis · sin registro · hasta :count comprobaciones por hora',
    ],

    'loading' => [
        'fetch' => 'Escaneando la página',
        'extract' => 'Buscando title, description, H1 y texto principal',
        'ai' => 'Evaluando la relevancia y la intención de búsqueda',
        'variants' => 'Preparando recomendaciones y nuevas variantes',
    ],

    'report' => [
        'again' => 'Nueva comprobación',
        'criteria' => [
            'relevance' => 'Relevancia del contenido',
            'intent' => 'Intención de búsqueda',
            'ctr' => 'Tasa de clics (CTR)',
            'technical' => 'Requisitos técnicos',
        ],
        'compare' => 'Ahora y tras la optimización',
        'current' => 'Ahora',
        'new' => 'Variante recomendada',
        'missing' => '(no hay)',
        'length' => ':count caract. · recomendado :min–:max',
        'issues' => 'Problemas',
        'recommendations' => 'Recomendaciones',
        'variants' => 'Variantes listas',
        'variant' => 'Variante :number',
        'copy' => 'Copiar',
        'copied' => 'Copiado',
        'note' => 'El número de caracteres es exacto. Compruebe que los datos de las variantes (precios, plazos) coinciden con su oferta.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'No hay title', 'text' => 'Sin title, Google inventará por sí mismo el título del snippet.'],
        'description_missing' => ['title' => 'No hay description', 'text' => 'Google tomará un fragmento aleatorio del texto de la página para el snippet.'],
        'title_length' => ['title' => 'El title tiene :length caracteres', 'text' => 'Lo recomendado son :min–:max caracteres: más corto no vende, más largo se corta.'],
        'description_length' => ['title' => 'La description tiene :length caracteres', 'text' => 'Lo recomendado son :min–:max caracteres: así todo el texto cabe en el snippet.'],
        'several_h1' => ['title' => 'La página tiene :count encabezados H1', 'text' => 'Es mejor un solo H1 que coincida en sentido con el title.'],
        'same_text' => ['title' => 'El title y la description son iguales', 'text' => 'La description debe complementar el title: un beneficio y una llamada a la acción.'],
        'thin_content' => ['title' => 'Poco texto en la página', 'text' => 'Parece que la página se genera con JavaScript. La evaluación se basa solo en las metaetiquetas y el H1.'],
    ],

    'errors' => [
        'invalid_url' => 'Introduzca la dirección completa de la página, por ejemplo https://example.com/page',
        'blocked_host' => 'Esta dirección no se puede comprobar: la página debe ser accesible desde internet',
        'unreachable' => 'No se pudo abrir el sitio. Compruebe la dirección',
        'timeout' => 'El sitio no respondió a tiempo. Inténtelo de nuevo',
        'http_error' => 'El sitio respondió con el error :status. Puede que la página esté cerrada a los bots',
        'not_html' => 'Esta dirección no es una página HTML',
        'too_large' => 'La página es demasiado grande para comprobarla',
        'too_many_redirects' => 'Demasiadas redirecciones',
        'no_content' => 'La página no tiene metaetiquetas ni texto para analizar',
        'ai_unavailable' => 'El análisis no está disponible temporalmente. Inténtelo en unos minutos',
        'ai_bad_response' => 'El análisis no está disponible temporalmente. Inténtelo en unos minutos',
        'rate_limited' => 'Demasiadas comprobaciones. Inténtelo dentro de :minutes min',
        'disabled' => 'El servicio no está disponible temporalmente',
        'generic' => 'Algo salió mal. Inténtelo de nuevo',
    ],
];
