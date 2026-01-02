@props([
    'title' => 'Ghada Beauty - منتجات عناية بالبشرة أصلية 100%',
    'description' => 'اكتشفي أفضل منتجات العناية بالبشرة والشعر الأصلية من Ghada Beauty. تفتيح، ترطيب، نضارة - منتجات مصرية أصلية 100%',
    'image' => null,
    'url' => null,
    'type' => 'website',
    'noindex' => false,
    'canonical' => null,
])

@php
    $siteUrl = config('app.url', url('/'));
    $ogImage = $image ?? asset('images/og-default.jpg');
    $canonicalUrl = $canonical ?? request()->url();
    $fullImageUrl = filter_var($ogImage, FILTER_VALIDATE_URL) ? $ogImage : $siteUrl . '/' . ltrim($ogImage, '/');
@endphp

{{-- Primary Meta Tags --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ Str::limit($description, 160) }}">
<meta name="keywords" content="منتجات عناية بالبشرة, كوزمتكس مصر, منتجات تفتيح, ترطيب البشرة, سيروم, كريم, غسول, Ghada Beauty, منتجات أصلية, عناية بالبشرة">
<meta name="author" content="Ghada Beauty">
<meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
<meta name="language" content="Arabic">
<meta name="revisit-after" content="7 days">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $canonicalUrl }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $url ?? $canonicalUrl }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ Str::limit($description, 200) }}">
<meta property="og:image" content="{{ $fullImageUrl }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $title }}">
<meta property="og:locale" content="ar_EG">
<meta property="og:site_name" content="Ghada Beauty">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $url ?? $canonicalUrl }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ Str::limit($description, 200) }}">
<meta name="twitter:image" content="{{ $fullImageUrl }}">
<meta name="twitter:image:alt" content="{{ $title }}">

{{-- Additional Meta Tags --}}
<meta name="theme-color" content="#ec4899">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

