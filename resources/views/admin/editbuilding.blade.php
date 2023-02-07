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
      <th scope="col" colspan="3">Objekti: {{$objekt->name}}</th>
    </tr>
  </thead>
  <tbody>
    <tr class="d-flex justify-content-center w-100">
      <td class="w-100">
        <a class="btn btn-success" href="{{ route('createbanesa', $objekt->id) }}">Shto banesë</a>
</td>
<td class="w-100">
        <a class="btn btn-primary" href="{{ route('apartments', $objekt->id) }}">Listo banesat</a>
</td>
<td class="w-100">
        <form method="post" action="{{route('destroybuilding', ['id' => $objekt->id, 'objektid' => $objekt->id])}}">
                  <button onclick="return confirm('A jeni i sigurtë se dëshironi të fshini objektin {{$objekt->name}} ?' )" type="submit" class="btn btn-danger">Fshij objektin</button>
                @csrf @method('DELETE')
            </form>
            </td>
    </td>
    </tr>
  </tbody>
</table>
@endsection