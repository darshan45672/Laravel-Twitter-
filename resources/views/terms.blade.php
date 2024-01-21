@extends('layout.layout')
@section('title', 'Terms')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shareIdea.leftSideBar')
    </div>
    <div class="col-6">
        <h1>Terms</h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus sapiente maiores repudiandae corrupti hic veniam
        reiciendis consequatur fugit, cum nam neque, ipsa facilis qui aspernatur provident aut harum asperiores nostrum.
    </div>
    <div class="col-3">
        {{-- @include('shareIdea.searchBar') --}}
        @include('shareIdea.followBar')
    </div>
</div>
@endsection