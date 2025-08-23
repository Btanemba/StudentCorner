@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Client Lookup Results</h2>

    <p><strong>Reference:</strong> {{ $client->client_ref }}</p>
    <p><strong>Name:</strong> {{ $client->full_name }}</p> {{-- Using your accessor --}}

    <h3>Applications</h3>
    @if($client->applications->isEmpty())
        <p>No applications found for this client.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>University</th>
                    <th>Degree</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($client->applications as $application)
                    <tr>
                        <td>{{ $application->university->name ?? 'No University Assigned' }}</td>
                        <td>{{ $application->degree }}</td>
                        <td>{{ $application->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

