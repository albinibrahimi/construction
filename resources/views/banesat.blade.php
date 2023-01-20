@extends('app')

@section('content')

<h1 class="text-center mt-4 mb-5">{{$objekti->name}}</h1>
    <table class="table  table-dark text-center align-middle">
  <thead>
    <tr>
      <th scope="col">Kati</th>
      <th scope="col">M2</th>
      <th scope="col">Statusi</th>
      <th scope="col">Opsioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($banesat as $banesa)
    <tr>
      <td>{{$banesa->kati}}</td>
      <td>{{$banesa->m2}} m2</td>
      @if($banesa->statusi =='0')
      <td class="bg-success">E lirë</td>
      @elseif($banesa->statusi =='2')
      <td class="bg-warning">E rezervuar</td>
      @else
      <td class="bg-danger">E shitur</td>
      @endif
      <td><a class="btn btn-primary" href="{{ route('edit', $banesa->id) }}">Ndërro statusin</a></td>
      
    </tr>
       @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {{$banesat->links()}}
</div>
@endsection