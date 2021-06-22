@extends('annonces.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('annonces.index') }}"> Back</a>
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

<form enctype="multipart/form-data" action="{{ route('annonces.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Titre de votre annonce">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                <input type="text" name="prix" class="form-control" placeholder="prix ex: 10000">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Annee:</strong>
                <input type="text" name="year" class="form-control" placeholder="annee ex: 2006">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Entree ici une description"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Photo 1:</strong>
               <input type="file" name="image" class="form-control">
           </div>
       </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Photo 2:</strong>
              <input type="file" name="image2" class="form-control">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Photo 3:</strong>
             <input type="file" name="image3" class="form-control">
         </div>
     </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
