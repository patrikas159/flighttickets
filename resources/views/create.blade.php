@extends('layout')

@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Generate Ticket</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> My tickets
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="card card-body bg-light p-4">
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="mb-3">

                <label for="vardas" class="form-label">First name</label>
                <input type="text" class="form-control" id="vardas" name="vardas">
            </div>
            <div class="mb-3">
                <label for="pavarde" class="form-label">Last name</label>
                <input type="text" class="form-control" id="pavarde" name="pavarde">
            </div>
            <div class="mb-3">
                <label for="ak" class="form-label">Identity number</label>
                <input type="number" class="form-control" id="ak" name="ak">
            </div>
            <div class="mb-3">
                <label for="from" class="form-label">From</label>
                <select name="from" id="from" class="form-control">
                    @foreach ($from as $from)
                        <option value="{{ $from['value'] }}">{{ $from['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">To</label>
                <select name="to" id="to" class="form-control">
                    @foreach ($to as $to)
                        <option value="{{ $to['value'] }}">{{ $to['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="FlightNumber" class="form-label">Flight number</label>
                <select name="FlightNumber" id="FlightNumber" class="form-control">
                    @foreach ($flights as $status)
                        <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="bagazas" class="form-label">Luggage</label>
                <select name="bagazas" id="bagazas" class="form-control">
                    @foreach ($bagazas as $bagazai)
                        <option value="{{ $bagazai['value'] }}">{{ $bagazai['label'] }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="comments" class="form-label">Comment</label>
                    <textarea type="text" class="form-control" id="comments" name="comments" rows="3"></textarea>
                </div>
            </div>

            <a href="{{ route('index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i>
                Save
            </button>
        </form>
    </div>

@endsection
