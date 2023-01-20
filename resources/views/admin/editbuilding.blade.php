@extends('app')

@section('content')
    <div class="d-flex justify-content-center">
    <img src="/images/admin.png" width="200">
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<table class="table  table-dark text-center align-middle">
  <thead>
    <tr>
      <th scope="col">Objekti: {{$objekt->name}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <a class="btn btn-success" href="{{ route('createbanesa', $objekt->id) }}">Shto banesë</a>
        <a class="btn btn-primary" href="{{ route('apartments', $objekt->id) }}">Listo banesat</a>
        <a href="/" 
                    class="btn btn-danger"
                   onclick="event.preventDefault();
                    document.getElementById(
                      'delete-form').submit();">
                 Fshij Objektin 
                </a>
            </td>
        <form id="delete-form" + action="{{route('destroybuilding', ['id' => $objekt->id, 'objektid' => $objekt->id])}}"
                  method="post">
                @csrf @method('DELETE')
            </form>
        
    </td>
    </tr>
  </tbody>
</table>
@endsection