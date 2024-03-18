@extends('Layout.Layout')

@section('content')
<div class="row">
  <div class="col-3">
    @include('Shared.Left-Sidebar')
  </div>
  <div class="col-6">
    @include('Shared.Success-message')
    @include('Ideas.Shared.Submit-idea')
    <hr>
    @forelse ($ideas as $idea)
      <div class="mt-3">
        @include('Ideas.Shared.Idea-card')
      </div>
    @empty
        <p class="text-center mt-4">No Results Found.</p>
    @endforelse
  </div>
  <div class="col-3">
      @include('Shared.Search-Bar')
  </div>
</div>
@endsection
  
    
    