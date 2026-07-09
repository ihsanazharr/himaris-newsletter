{{-- Unified Body Image Figure Component --}}
@if(!empty($image['image']))
  <figure class="post-body-figure">
    <img
      src="{{ asset('storage/' . $image['image']) }}"
      alt="{{ $image['alt'] ?? '' }}"
    />
    @if(!empty($image['caption']) || !empty($image['copyright']))
      <figcaption class="post-body-caption">
        @if(!empty($image['caption']))
          <span>{{ $image['caption'] }}</span>
        @endif
        @if(!empty($image['copyright']))
          <small>© {{ $image['copyright'] }}</small>
        @endif
      </figcaption>
    @endif
  </figure>
@endif
