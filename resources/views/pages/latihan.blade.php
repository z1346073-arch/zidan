@extends('master')
@section( 'content')
<div class="container mt-4">
        <div class="card">
            <div class="card-header bg-info
    text dark">
           <h1>{{ $destinations->name }}</h1>
           <p> {{ $destinations->description }}</p>
           <p>Location: {{ $destinations->location }}</p>
           <p>Working Days: {{$destinations->working_days}}</p>
           <p>Working Hours: {{$destinations->working_hours}}</p>
           <p>Ticket Price: {{$destinations->ticket_price}}</p>
            </div>
            
                
@endsection