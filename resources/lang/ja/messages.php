<?php

return [
    'form' => [
        'label' => 'ページのURL',
        'button' => 'チェック',
        'hint' => '無料 · 登録不要 · 1時間に最大:count回まで',
    ],

    'loading' => [
        'fetch' => 'ページをスキャンしています',
        'extract' => 'title、description、H1、本文を探しています',
        'ai' => '内容との一致と検索意図を評価しています',
        'variants' => '改善案と新しい候補を作成しています',
    ],

    'report' => [
        'again' => '新しいチェック',
        'criteria' => [
            'relevance' => '内容との一致',
            'intent' => '検索意図',
            'ctr' => 'クリック率（CTR）',
            'technical' => '技術要件',
        ],
        'compare' => '現在と最適化後',
        'current' => '現在',
        'new' => '推奨案',
        'missing' => '（なし）',
        'length' => ':count文字 · 推奨 :min–:max',
        'issues' => '問題点',
        'recommendations' => '改善案',
        'variants' => 'すぐ使える候補',
        'variant' => '候補 :number',
        'copy' => 'コピー',
        'copied' => 'コピーしました',
        'note' => '文字数は正確です。候補内の事実（価格、期間など）がご自身の提供内容と一致しているか確認してください。',
    ],

    'technical' => [
        'title_missing' => ['title' => 'titleがありません', 'text' => 'titleがないと、Googleがスニペットの見出しを自動で作ります。'],
        'description_missing' => ['title' => 'descriptionがありません', 'text' => 'Googleはページ本文の任意の一部をスニペットに使います。'],
        'title_length' => ['title' => 'titleの長さが:length文字です', 'text' => '推奨は:min–:max文字です。短すぎると訴求力がなく、長すぎると省略されます。'],
        'description_length' => ['title' => 'descriptionの長さが:length文字です', 'text' => '推奨は:min–:max文字です。この範囲なら全文がスニペットに収まります。'],
        'several_h1' => ['title' => 'ページにH1見出しが:count個あります', 'text' => 'titleと内容が一致するH1は1つが望ましいです。'],
        'same_text' => ['title' => 'titleとdescriptionが同じです', 'text' => 'descriptionはtitleを補うべきです：メリットと行動の呼びかけを入れましょう。'],
        'thin_content' => ['title' => 'ページの本文が少なすぎます', 'text' => 'ページはJavaScriptで描画されているようです。評価はメタタグとH1のみに基づいています。'],
    ],

    'errors' => [
        'invalid_url' => 'ページの完全なURLを入力してください（例：https://example.com/page）',
        'blocked_host' => 'このURLはチェックできません：インターネットからアクセスできるページである必要があります',
        'unreachable' => 'サイトを開けませんでした。URLを確認してください',
        'timeout' => 'サイトが時間内に応答しませんでした。もう一度お試しください',
        'http_error' => 'サイトがエラー:statusを返しました。ページがボットに対して閉じられている可能性があります',
        'not_html' => 'このURLはHTMLページではありません',
        'too_large' => 'ページが大きすぎてチェックできません',
        'too_many_redirects' => 'リダイレクトが多すぎます',
        'no_content' => 'ページに分析できるメタタグや本文がありません',
        'ai_unavailable' => '分析は一時的に利用できません。数分後にお試しください',
        'ai_bad_response' => '分析は一時的に利用できません。数分後にお試しください',
        'rate_limited' => 'チェック回数が多すぎます。:minutes分後にお試しください',
        'disabled' => 'サービスは一時的に利用できません',
        'generic' => '問題が発生しました。もう一度お試しください',
    ],
];
