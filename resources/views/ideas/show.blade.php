@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shareIdea.leftSideBar')
    </div>
    <div class="col-6">
        
        @include('shareIdea.sucessMessage')
        <div class="mt-3">
            @include('shareIdea.ideaCard')
        </div>
    
    </div>
    <div class="col-3">
        @include('shareIdea.searchBar') 
        @include('shareIdea.followBar')
    </div>
</div>
@endsection
