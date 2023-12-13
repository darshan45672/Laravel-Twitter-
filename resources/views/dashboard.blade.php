@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shareIdea.leftSideBar')
    </div>
    <div class="col-6">
        
        @include('shareIdea.sucessMessage')
        @include('shareIdea.submitIdea')
        <hr>
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('shareIdea.ideaCard')
        </div>
        @endforeach
        <div class="mt-3"> {{ $ideas -> links() }} </div>
    </div>
    <div class="col-3">
        @include('shareIdea.searchBar')
        @include('shareIdea.followBar')
    </div>
</div>
@endsection
