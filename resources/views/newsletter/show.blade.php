@extends('layouts.app')

@section('title', $post->title . ' — Himaris Newsletter')

@section('content')

<!-- PROGRESS BAR -->
<div class="progress-bar"><div class="progress-fill" id="progressFill"></div></div>

<!-- BREADCRUMB -->
<div class="breadcrumb">
  <a href="{{ route('home') }}">Home</a>
  <span class="sep">›</span>
  <a href="{{ route('newsletter.index') }}">Newsletter</a>
  <span class="sep">›</span>
  <span>{{ Str::limit($post->title, 40) }}</span>
</div>

<!-- HERO IMAGE -->
<div class="post-hero-img">
  @if($post->thumbnail)
    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"/>
  @endif
</div>

<!-- POST CONTENT -->
<div class="post-wrap">
  <div class="post-content">
    <p class="post-tag">{{ $post->category_label }}</p>
    <h1 class="post-title">{{ $post->title }}</h1>
    <div class="post-body">
      @php
        $content = $post->content;
        $images = $post->content_images ?? [];
        $newContent = $content;
        $usedImages = [];

        // 1. Placeholder replacement (e.g. [image_1], [image_2])
        if (!empty($images)) {
            foreach ($images as $index => $image) {
                $placeholder = '[image_' . ($index + 1) . ']';
                if (str_contains($newContent, $placeholder)) {
                    $figureHtml = view('partials.body-image-figure', compact('image'))->render();
                    $newContent = str_replace($placeholder, $figureHtml, $newContent);
                    $usedImages[] = $index;
                }
            }
        }

        // Filter out images placed by placeholders
        $remainingImages = array_filter($images, function($img, $index) use ($usedImages) {
            return !in_array($index, $usedImages);
        }, ARRAY_FILTER_USE_BOTH);

        // 2. Automatic distribution of remaining images between paragraphs
        if (!empty($remainingImages)) {
            $paragraphs = array_values(array_filter(explode('</p>', $newContent), function($p) {
                return trim(strip_tags($p)) !== '';
            }));
            
            foreach ($paragraphs as &$p) {
                if (!str_ends_with(trim($p), '</p>')) {
                    $p = trim($p) . '</p>';
                }
            }
            unset($p);

            $totalParagraphs = count($paragraphs);
            $totalImages = count($remainingImages);
            $remainingImages = array_values($remainingImages);

            if ($totalParagraphs > 0) {
                $insertPositions = [];
                for ($i = 0; $i < $totalImages; $i++) {
                    $pos = (int) (($i + 1) * $totalParagraphs / ($totalImages + 1));
                    $insertPositions[$i] = min($pos - 1, $totalParagraphs - 1);
                    if ($insertPositions[$i] < 0) $insertPositions[$i] = 0;
                }

                $finalContent = '';
                foreach ($paragraphs as $index => $para) {
                    $finalContent .= $para;
                    foreach ($insertPositions as $imgIndex => $pos) {
                        if ($index === $pos) {
                            $image = $remainingImages[$imgIndex];
                            $finalContent .= view('partials.body-image-figure', compact('image'))->render();
                        }
                    }
                }
                $newContent = $finalContent;
            } else {
                foreach ($remainingImages as $image) {
                    $newContent .= view('partials.body-image-figure', compact('image'))->render();
                }
            }
        }
      @endphp

      {!! $newContent !!}
    </div>

    <div style="margin-top:32px;padding-top:20px;border-top:1px solid var(--gray-light)">
      <span class="post-tag-chip">{{ $post->category_label }}</span>
    </div>
  </div>

  <!-- SIDEBAR -->
  <div class="post-sidebar">
    <div class="post-meta-card">
      <div class="post-meta-item">
        <span class="post-meta-icon">🏷️</span>
        <div>
          <div class="post-meta-label">Category</div>
          <p class="post-meta-val">{{ $post->category_label }}</p>
        </div>
      </div>
      <div class="post-meta-item">
        <span class="post-meta-icon">📅</span>
        <div>
          <div class="post-meta-label">Published</div>
          <p class="post-meta-val">{{ $post->published_at?->format('d M Y') }}</p>
        </div>
      </div>
      <div class="post-meta-item">
        <span class="post-meta-icon">✍️</span>
        <div>
          <div class="post-meta-label">Author</div>
          <p class="post-meta-val">{{ $post->author_name ?? $post->user?->name ?? 'Unknown' }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- RELATED ARTICLES -->
@if($related->count())
<section class="section" style="background:var(--off-white)">
  <div class="container">
    <h2 class="section-heading">
      <span class="icon">📖</span>
      <span class="underline">Related Articles</span>
      <span class="icon">📖</span>
    </h2>
    <div class="articles-grid">
      @foreach($related as $rel)
        <a href="{{ route('newsletter.show', $rel->slug) }}" class="article-card reveal">
          <div class="article-card-img-wrap">
            @if($rel->thumbnail)
              <img src="{{ asset('storage/' . $rel->thumbnail) }}" alt="{{ $rel->title }}" class="article-card-img"/>
            @else
              <div class="article-card-img" style="display:flex;align-items:center;justify-content:center;font-size:3rem;background:var(--gray-light)">📰</div>
            @endif
          </div>
          <div class="article-card-body">
            <span class="article-card-tag">{{ $rel->category_label }}</span>
            <h3 class="article-card-title">{{ $rel->title }}</h3>
            <p class="article-card-meta">{{ $rel->published_at?->format('d M Y') }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif
<div style="text-align:center;padding:0 32px 48px">
  <a href="{{ route('newsletter.index') }}" class="btn-outline">
    ← Back to Newsletter
  </a>
</div>

@include('partials.social-media-publications')

@endsection