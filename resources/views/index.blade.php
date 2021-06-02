@extends('layout')

@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">My Tickets</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('task.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Generate Ticket
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    @foreach ($tasks as $task)
        <div class="card mt-3">
            <h5 class="card-header">
                Flight ticket

            </h5>


            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        <pre> Name: {{ $task->vardas }} {{ $task->pavarde }}    Identity number: {{$task->ak}}</pre>

                        <pre> Flight number: {{ $task->FlightNumber }}      Luggage: {{$task->bagazas}}     From {{$task->from}} To {{$task->to}}</pre>
                        <pre> Comment: {{$task->comments}}</pre>
                           <p> @if ($task->bagazas === '0kg')
                                Price: 120eur
                            @elseif ($task->bagazas === '10kg')
                                Price: 160eur
                            @else
                                Price: 210eur
                            @endif
                               <p/>

                    </div>
                    <div class="float-end">
                        <form action="{{ route('task.destroy', $task->id) }}" style="display: inline" method="POST"
                              onsubmit="return confirm('Are you sure to delete ?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endforeach

    @if (count($tasks) === 0)
        <div class="alert alert-danger p-2">
            No Tickets Found. Please Create a ticket
            <br>
            <br>
            <a href="{{ route('task.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Generate Ticket
            </a>
        </div>
    @endif

@endsection
