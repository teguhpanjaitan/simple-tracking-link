@extends('layout', ['title' => '“Tracker” Logs'])

@section('content')
  <h2>“Tracker” Logs (Demo)</h2>
  <table>
    <thead>
      <tr>
        <th>#</th><th>Lead</th><th>Event</th><th>Details (JSON)</th><th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($logs as $log)
        <tr>
          <td>{{ $log->id }}</td>
          <td>
            @if($log->lead)
              {{ $log->lead->id }} — {{ $log->lead->name }} ({{ $log->lead->email }})
            @else
              —
            @endif
          </td>
          <td>{{ $log->event }}</td>
          <td><code>{{ json_encode($log->details, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) }}</code></td>
          <td>{{ $log->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $logs->links() }}
@endsection
