@extends('app')

@section('content')
    <div class="d-flex justify-content-center">
    <img src="/images/admin.png" width="200">
</div>
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
        <a class="btn btn-success" href="">Ndrysho madhësinë</a>
        <td><a href="/" 
                    class="btn btn-danger"
                   onclick="event.preventDefault();
                    document.getElementById(
                      'delete-form').submit();">
                 Delete 
                </a>
            </td>
        <form id="delete-form" + action="{{route('destroy', ['m2' => $apartment->m2, 'objektid' => $objekt->id])}}"
                  method="post">
                @csrf @method('DELETE')
            </form>
        
    </td>
    </tr>
       @endforeach
  </tbody>
</table>
@endsection