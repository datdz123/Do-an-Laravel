
@if (!blank(\Request::route()))
    @if (isset($detail))
        <title></title>
        <meta name="title" content="" />
        <meta name="description"
            content="" />
        <meta name="keywords"
            content="" />

        <meta name="language" content="{{ app()->getLocale() }}" />
        <link rel="canonical" href="" />
        <meta property="og:title" content="" />
        <meta property="og:description"
            content="" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />
        <meta property="og:type" content="page" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:url" content="" />
        <meta property="og:image"
            content=""
            alt="" />
        {{--        twitter --}}
        <meta name="twitter:title" content="" />
        <meta name="twitter:description"
            content="" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:domain" content="{{ url('/') }}" />
        <meta name="twitter:url" content="">
        <meta name="twitter:image"
            content=""
            alt="" />
    @endif
@endif
@if(isset($page))
    {{-- @dd($page) --}}
    @if (!blank(\Request::route()))
        <title></title>
        <meta name="title" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <meta name="language" content="{{ app()->getLocale() }}" />
        <link rel="canonical" href="" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />
        <meta property="og:type" content="page" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:url" content="" />
        <meta property="og:image"
            content=""
            alt="" />
        {{--        twitter --}}
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:domain" content="{{ url('/') }}" />
        <meta name="twitter:url" content="">
        <meta name="twitter:image"
            content=""
            alt="" />
    @endif
@endif


{{-- <meta name="keywords" content="{{ $site->site_keywords }}">
<meta name="description" content="{{ $site->site_description }}">
@if (isset($product_detail))
    <meta property="og:url" content="{{ route('detail', ['id' => $product_detail->id, 'slug' => $product_detail->slug]) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title }}">
    @php
        $imagess = explode(',', $product_detail->images);
    @endphp
    <meta property="og:image" content="{{ $imagess[0] }}">
    <meta property="og:description" content="{{ $product_detail->description }}">
@endif --}}
