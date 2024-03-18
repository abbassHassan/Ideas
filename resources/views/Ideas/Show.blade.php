@extends('Layout.Layout')

@section('content')
<div class="row">
  <div class="col-3">
      @include('Shared.Left-Sidebar')
  </div>
  <div class="col-6">
    @include('Shared.Success-message')
    <hr>
       <div class="mt-3">
        @include('Ideas.Shared.Idea-card')
      </div>
  </div>
  <div class="col-3">
    @include('Shared.Search-Bar')
    @include('Shared.Follow-Box')
  </div>
</div>
@endsection
  
    
    