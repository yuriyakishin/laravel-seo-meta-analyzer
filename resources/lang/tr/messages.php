<?php

return [
    'form' => [
        'label' => 'Sayfa adresi',
        'button' => 'Kontrol et',
        'hint' => 'Ücretsiz · kayıt gerekmez · saatte en fazla :count kontrol',
    ],

    'loading' => [
        'fetch' => 'Sayfa taranıyor',
        'extract' => 'Title, description, H1 ve ana metin aranıyor',
        'ai' => 'İçerik uyumu ve arama amacı değerlendiriliyor',
        'variants' => 'Öneriler ve yeni varyantlar hazırlanıyor',
    ],

    'report' => [
        'again' => 'Yeni kontrol',
        'criteria' => [
            'relevance' => 'İçerik uyumu',
            'intent' => 'Arama amacı',
            'ctr' => 'Tıklanma oranı (CTR)',
            'technical' => 'Teknik gereksinimler',
        ],
        'compare' => 'Şimdi ve optimizasyondan sonra',
        'current' => 'Şimdi',
        'new' => 'Önerilen varyant',
        'missing' => '(yok)',
        'length' => ':count karakter · önerilen :min–:max',
        'issues' => 'Sorunlar',
        'recommendations' => 'Öneriler',
        'variants' => 'Hazır varyantlar',
        'variant' => 'Varyant :number',
        'copy' => 'Kopyala',
        'copied' => 'Kopyalandı',
        'note' => 'Karakter sayıları kesindir. Varyantlardaki bilgilerin (fiyatlar, süreler) teklifinizle uyuştuğunu kontrol edin.',
    ],

    'technical' => [
        'title_missing' => ['title' => 'Title yok', 'text' => 'Title olmadan Google snippet başlığını kendisi uydurur.'],
        'description_missing' => ['title' => 'Description yok', 'text' => 'Google snippet için sayfa metninden rastgele bir parça alır.'],
        'title_length' => ['title' => 'Title :length karakter', 'text' => 'Önerilen :min–:max karakter: daha kısası satmaz, daha uzunu kesilir.'],
        'description_length' => ['title' => 'Description :length karakter', 'text' => 'Önerilen :min–:max karakter: böylece metnin tamamı snippet’e sığar.'],
        'several_h1' => ['title' => 'Sayfada :count H1 başlığı var', 'text' => 'Anlam olarak title ile örtüşen tek bir H1 daha iyidir.'],
        'same_text' => ['title' => 'Title ve description aynı', 'text' => 'Description title’ı tamamlamalı: bir fayda ve harekete geçirici bir çağrı.'],
        'thin_content' => ['title' => 'Sayfada az metin var', 'text' => 'Sayfa JavaScript ile oluşturuluyor gibi görünüyor. Değerlendirme yalnızca meta etiketlere ve H1’e dayanıyor.'],
    ],

    'errors' => [
        'invalid_url' => 'Sayfanın tam adresini girin, örneğin https://example.com/page',
        'blocked_host' => 'Bu adres kontrol edilemez: sayfa internetten erişilebilir olmalı',
        'unreachable' => 'Site açılamadı. Adresi kontrol edin',
        'timeout' => 'Site zamanında yanıt vermedi. Tekrar deneyin',
        'http_error' => 'Site :status hatasıyla yanıt verdi. Sayfa botlara kapalı olabilir',
        'not_html' => 'Bu adres bir HTML sayfası değil',
        'too_large' => 'Sayfa kontrol için çok büyük',
        'too_many_redirects' => 'Çok fazla yönlendirme',
        'no_content' => 'Sayfada analiz edilecek meta etiket veya metin yok',
        'ai_unavailable' => 'Analiz geçici olarak kullanılamıyor. Birkaç dakika sonra deneyin',
        'ai_bad_response' => 'Analiz geçici olarak kullanılamıyor. Birkaç dakika sonra deneyin',
        'rate_limited' => 'Çok fazla kontrol. :minutes dk sonra tekrar deneyin',
        'disabled' => 'Hizmet geçici olarak kullanılamıyor',
        'generic' => 'Bir şeyler ters gitti. Tekrar deneyin',
    ],
];
