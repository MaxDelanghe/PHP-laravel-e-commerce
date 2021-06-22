@extends('chat.layout')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Envoyer un message') }}
  </h2>
</div>
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('chat.index') }}"> Back</a>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('chat.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Title:</strong>
        <input type="text" name="title" class="form-control" placeholder="Titre de votre message">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>content:</strong>
        <input type="text" name="body" class="form-control" placeholder="...">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>nom du destinataire:</strong>
        <input type="text" name="name" class="form-control" placeholder="...">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

</form>
@endsection
