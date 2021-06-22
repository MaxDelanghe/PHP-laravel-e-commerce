@extends('chat.layout')

@section('content')
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Liste de mes message') }}
              </h2>
        </div>
        <div class="row" style="margin-top: 5rem;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-warning" href="{{ route('dashboard')  }}"> Retour</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">

          <table class="table table-bordered">
              <tr>
                  <th>Auteur</th>
                  <th>Titre</th>
                  <th>Message</th>
                  <th>Date</th>
              </tr>
              @foreach ($data as $key => $value)
              <tr>

                  <td>{{ $value->name }}</td>
                  <td>{{ $value->title }}</td>
                  <td>{{ $value->body }}</td>
                  <td>{{ $value->created_at }}
                  @if($value->readed == 0)
                  <font color="red"><i>(new)</i></font>
                  @endif</td>
                  <td>
                      <form action="{{ route('chat.destroy', $value->pop) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-info" href="{{ route('chat.create')}}">Repondre</a>
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
             @endforeach
          </table>
            {!! $data->links() !!}
@endsection
