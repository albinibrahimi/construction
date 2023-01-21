@extends('app')

@section('content')
    <div class="d-flex justify-content-center">
    <img src="/images/admin.png" width="200">
</div>
    <div class="d-flex justify-content-center mb-4">
      <a class="btn btn-success" href="{{ route('create') }}">Shto objekt</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<table class="table  table-dark text-center align-middle">
  <thead>
    <tr>
      <th scope="col">Objekti</th>
      <th scope="col" colspan="2">Opsioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($objekts as $objekt)
    <tr>
      <td>{{$objekt->name}}</td>
      <td><a class="btn btn-primary" href="{{ route('editbuilding', $objekt->id) }}">Selekto</a></td>
    </tr>
       @endforeach
  </tbody>
</table>
@endsection