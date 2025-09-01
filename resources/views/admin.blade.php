@extends('layout', ['title' => 'Admin — Leads'])

@section('content')
  <h2>Admin — Leads</h2>
  <table>
    <thead>
      <tr>
        <th>#</th><th>Name</th><th>Email</th><th>gclid</th><th>sub_id</th><th>Created</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($leads as $lead)
      <tr>
        <td>{{ $lead->id }}</td>
        <td>{{ $lead->name }}</td>
        <td>{{ $lead->email }}</td>
        <td><span class="pill">{{ $lead->gclid }}</span></td>
        <td><span class="pill">{{ $lead->sub_id }}</span></td>
        <td>{{ $lead->created_at }}</td>
        <td><a href="{{ route('simulate.conversion', ['lead_id' => $lead->id]) }}">Simulate Conversion</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>

  {{ $leads->links() }}
@endsection
