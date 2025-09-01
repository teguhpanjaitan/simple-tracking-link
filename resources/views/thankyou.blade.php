@extends('layout', ['title' => 'Thank You'])

@section('content')
  <h2>Thank you!</h2>
  <p>Your lead has been submitted. Lead ID: <b>{{ $leadId }}</b></p>
  <p>
    Go to <a href="{{ route('admin') }}">Admin</a> or see <a href="{{ route('tracker.logs') }}">Tracker Logs</a>.
  </p>
@endsection
