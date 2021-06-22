@extends('annonces.layout')
@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Details de l\' annonces') }}
          </h2>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('annonces.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre:</strong>
                {{ $annonces->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                {{ $annonces->prix }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Annee:</strong>
                {{ $annonces->year }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $annonces->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group flex">
                <img style="margin: 10px; padding: 25px;"class="img-responsive border-2 " width="460" height="345" src="/folder/images/{{ $annonces->image }}">
                <img style="margin: 10px; padding: 25px;" class="img-responsive border-2" width="460" height="345"  src="/folder/images/{{ $annonces->image2 }}">
                <img style="margin: 10px; padding: 25px;" class="img-responsive border-2" width="460" height="345" src="/folder/images/{{ $annonces->image3 }}">
            </div>
        </div>
    </div>
@endsection
