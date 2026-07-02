@extends('layouts.app')

@section('title', 'Unsubscribed — Himaris Newsletter')

@section('content')
<div style="margin-top:var(--nav-h);min-height:60vh;display:flex;align-items:center;justify-content:center;padding:48px 24px">
  <div style="text-align:center;max-width:480px">
    <div style="font-size:3.5rem;margin-bottom:16px">👋</div>
    <h1 style="font-size:1.5rem;font-weight:700;color:var(--black);margin-bottom:10px">You've been unsubscribed</h1>
    <p style="font-size:0.93rem;color:var(--gray);line-height:1.7;margin-bottom:24px">
      <strong style="color:var(--dark)">{{ $email }}</strong> has been removed from the Himaris Newsletter mailing list.
      You won't receive any more emails from us.
    </p>
    <p style="font-size:0.82rem;color:var(--gray-mid);margin-bottom:28px">Changed your mind? You can re-subscribe any time from the footer of our website.</p>
    <a href="{{ route('home') }}" class="btn-outline">← Back to Home</a>
  </div>
</div>
@endsection
