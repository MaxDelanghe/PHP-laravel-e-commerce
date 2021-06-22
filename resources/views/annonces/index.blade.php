@extends('annonces.layout')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Liste des annonces') }}
      </h2>
</div>
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('dashboard')  }}"> Retour</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('annonces.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Prix</th>
            <th>Annee</th>
            <th>Date de l'annonce</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->prix }}€</td>
            <td>{{ $value->year }}</td>
            <td>{{ date('j F, Y', strtotime($value->created_at)) }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-info" href="{{ route('annonces.show',$value->id) }}">Show</a>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
