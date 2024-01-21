@extends('layout.layout')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shareIdea.leftSideBar')
    </div>
    <div class="col-6">
        
        @include('shareIdea.sucessMessage')
        @include('ideas.shared.submitIdea')
        <hr>
        {{-- @if (count($ideas) > 0)
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('shareIdea.ideaCard')
        </div>
        @endforeach
        @else
            No results found ...
        @endif --}}

        @forelse ($ideas as $idea)
        <div class="mt-3">
            @include('ideas.shared.ideaCard')
        </div>
        @empty
            <p class="text-center my-3"> No results found ...</p>
        @endforelse
        
        <div class="mt-3"> {{ $ideas ->withQueryString() -> links() }} </div>
    </div>
    <div class="col-3">
        @include('shareIdea.searchBar')
        @include('shareIdea.followBar')
    </div>
</div>
@endsection
