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
    <tr><th scope="col" colspan="3">Banesat për objektin: {{$objekt->name}}</th></tr>
    <tr>
      <th scope="col">Banesat</th>
      <th scope="col" colspan="2">Opsioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($apartments as $apartment)
    <tr>
      <td>{{$apartment->m2}}m2</td>
      <td>
        <a class="btn btn-success" href="{{route('editapartment', ['m2' => $apartment->m2, 'objektid' => $objekt->id])}}">Ndrysho madhësinë</a>
        <td>
        <form method="post" action="{{route('destroy', ['m2' => $apartment->m2, 'objektid' => $objekt->id])}}">
                  <button onclick="return confirm('A jeni i sigurtë se dëshironi të fshini banesën me madhësi {{$apartment->m2}}m2 ?' )" type="submit" class="btn btn-danger">Fshije banesën</button>
                @csrf @method('DELETE')
            </form>
        
    </td>
    </tr>
       @endforeach
  </tbody>
</table>
@endsection