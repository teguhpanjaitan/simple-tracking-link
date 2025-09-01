@extends('layout', ['title' => 'Demo Lander'])

@section('content')
<div class="card">
  <h2>Register / Lead Form</h2>
  <form method="post" action="{{ route('leads.store') }}">
    @csrf
    <div class="row">
      <label>Name</label>
      <input name="name" required />
    </div>
    <div class="row">
      <label>Email</label>
      <input type="email" name="email" required />
    </div>

    {{-- Hidden capture --}}
    <input type="hidden" name="gclid" value="{{ $gclid }}">
    <input type="hidden" name="sub_id" value="{{ $sub_id }}">

    <button type="submit">Submit Lead</button>
  </form>

  <p class="muted">URL params captured:</p>
  <div class="hint">
    gclid: <b>{{ $gclid ?: '(empty)' }}</b><br/>
    sub_id: <b>{{ $sub_id ?: '(empty)' }}</b>
  </div>
</div>

@push('head')
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXX"></script> --}}
<script>
  // window.dataLayer = window.dataLayer || [];
  // function gtag(){ dataLayer.push(arguments); }
  // gtag('js', new Date());
  // gtag('config', 'G-XXXXXXX');
  // gtag('event','lead_view',{ gclid: @json($gclid), sub_id: @json($sub_id) });
</script>
@endpush
@endsection
