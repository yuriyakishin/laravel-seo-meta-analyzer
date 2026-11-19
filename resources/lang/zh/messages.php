<?php

declare(strict_types=1);

return [
    'form' => [
        'label' => '页面地址',
        'button' => '检查',
        'hint' => '免费 · 无需注册 · 每小时最多 :count 次检查',
    ],

    'loading' => [
        'fetch' => '正在扫描页面',
        'extract' => '正在查找 title、description、H1 和正文',
        'ai' => '正在评估内容匹配度和搜索意图',
        'variants' => '正在准备建议和新方案',
    ],

    'report' => [
        'again' => '重新检查',
        'criteria' => [
            'relevance' => '内容匹配度',
            'intent' => '搜索意图',
            'ctr' => '点击率（CTR）',
            'technical' => '技术要求',
        ],
        'compare' => '现在与优化后',
        'current' => '现在',
        'new' => '推荐方案',
        'missing' => '（无）',
        'length' => ':count 个字符 · 建议 :min–:max',
        'issues' => '问题',
        'recommendations' => '建议',
        'variants' => '现成方案',
        'variant' => '方案 :number',
        'copy' => '复制',
        'copied' => '已复制',
        'note' => '字符数准确无误。请确认方案中的事实（价格、期限）与您的实际服务一致。',
    ],

    'technical' => [
        'title_missing' => ['title' => '缺少 title', 'text' => '没有 title，Google 会自行为摘要编写标题。'],
        'description_missing' => ['title' => '缺少 description', 'text' => 'Google 会随机截取页面文字作为摘要。'],
        'title_length' => ['title' => 'title 长度为 :length 个字符', 'text' => '建议 :min–:max 个字符：太短缺乏吸引力，太长会被截断。'],
        'description_length' => ['title' => 'description 长度为 :length 个字符', 'text' => '建议 :min–:max 个字符：这样整段文字都能显示在摘要中。'],
        'several_h1' => ['title' => '页面有 :count 个 H1 标题', 'text' => '最好只有一个与 title 含义一致的 H1。'],
        'same_text' => ['title' => 'title 与 description 相同', 'text' => 'description 应补充 title：写出优势和行动号召。'],
        'thin_content' => ['title' => '页面文字太少', 'text' => '页面似乎由 JavaScript 渲染。评估仅基于 meta 标签和 H1。'],
    ],

    'errors' => [
        'invalid_url' => '请输入完整的页面地址，例如 https://example.com/page',
        'blocked_host' => '无法检查此地址：页面必须能从互联网访问',
        'unreachable' => '无法打开网站。请检查地址',
        'timeout' => '网站未及时响应。请重试',
        'http_error' => '网站返回错误 :status。页面可能禁止机器人访问',
        'not_html' => '此地址不是 HTML 页面',
        'too_large' => '页面过大，无法检查',
        'too_many_redirects' => '重定向次数过多',
        'no_content' => '页面没有可分析的 meta 标签或文字',
        'ai_unavailable' => '分析暂时不可用。请几分钟后再试',
        'ai_bad_response' => '分析暂时不可用。请几分钟后再试',
        'rate_limited' => '检查次数过多。请 :minutes 分钟后再试',
        'disabled' => '服务暂时不可用',
        'generic' => '出了点问题。请重试',
    ],
];
