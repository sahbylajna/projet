@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Log Viewer</h1>

    <div class="mb-4">
        <a href="{{ route('logs.delete') }}" class="btn btn-danger">Delete Log Files</a>
    </div>

    <pre>{{ $logContent }}</pre>
</div>
@endsection
