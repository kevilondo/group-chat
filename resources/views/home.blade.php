@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="/group/create">Create a group</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-light" href="/group/join">Join a group</a>
                        </div>
                    </div> <br>

                    <div class="card col-md-8">
                        <div class="card-header">My Groups</div>

                        <div class="card-body">
                            @foreach($groups as $group)
                            <div class="row">
                                <div class="col-md-6">
                                    <h4> <a href="/group/{{$group->id}}" style="color: black;"> {{$group->name}} </a> </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Code:</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-danger">{{$group->code}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> <br>
                            <p>
                                @if ($group->messages()->latest()->first())
                                    <span class="text-danger">{{$group->messages()->latest()->first()->user->username}}</span> <small>{{$group->messages()->latest()->first()->message}}</small>
                                @endif
                            </p>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
