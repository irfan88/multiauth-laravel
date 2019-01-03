@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                    @if (session('message'))
                        <p>{{ session('message') }}</p>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Semua Event</h3>
                    @foreach (App\NewEvent::get() as $event)
                        <p><strong>Event: {{ $event->name }}</strong></p>
                        <p>{{ $event->description }}</p>
                        <p>Tempat/Waktu: {{ $event->location }}, {{ $event->begin_date }} - {{ $event->finish_date }}</p>
                        @can ('be-organizer')
                            <a href="/multiauth/public/edit-event/{{ $event->id }}">Edit Event</a>
                        @endcan
                       
                        @can ('be-participant')
                            <a href="/multiauth/public/join-event/{{ $event->id }}">Join Event</a>
                        @endcan

                    @endforeach

                    <h3>Semua Organisasi</h3>
                    @foreach (App\Organization::get() as $organization)
                        <p>Nama : {{ $organization->name }}</p>
                        <p>Admin : {{ $organization->admin->name }}</p>
                        <p><a href="/multiauth/public/edit-organization/{{ $organization->id }}">Edit</a></p>
                    @endforeach
                </div>
                @can('be-organizer')
                <p><a href="{{ route('event') }}">Event</a></p>
                @endcan
                @can('be-participant')
                <p><a href="{{ route('event-history') }}">Event History</a></p>
                @endcan

                <p><a href="{{ route('settings') }}">Settings</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
