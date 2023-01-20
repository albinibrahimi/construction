@extends('app')

@section('content')
    <div class="d-flex justify-content-center">
    <img src="/images/admin.png" width="200">
</div>
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
        <a class="btn btn-danger" href="{{ route('createbanesa', $objekt->id) }}">Fshij objektin</a>
    </td>
    </tr>
  </tbody>
</table>
@endsection