@extends('app')

@section('content')

<h1 class="text-center mt-4 mb-5">{{$objekti->name}}</h1>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-dark text-center align-middle ">
  <thead>
    <tr>
      <th scope="col">Kati</th>
      <th scope="col">M2</th>
      <th scope="col">Statusi</th>
      @auth
      <th scope="col" colspan="3">Opsioni</th>
        @endauth
    </tr>
  </thead>
  <tbody>
  @foreach ($banesat as $banesa)
    <tr>
      <td>{{$banesa->kati}}</td>
      <td class="text-nowrap">{{$banesa->m2}} m2</td>
      @if($banesa->statusi =='0')
      <td class="bg-success">E lirë</td>
      @elseif($banesa->statusi =='2')
      <td class="bg-warning text-nowrap">E rezervuar</td>
      @else
      <td class="bg-danger">E shitur</td>
      @endif
      @auth
      <td class="px-0"><a class="btn btn-dark" href="{{ route('edit', $banesa->id) }}">♻️</a></td>
      <td class="px-0"><a class="btn btn-dark" href="{{ route('editdescription', $banesa->id) }}">✍🏼</a></td>
      <td class="px-0">
      @if($banesa->description != NULL)
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$banesa->id}}">
      ⚠️
  </button>

<!-- Modal -->
      <div class="modal fade" id="exampleModal-{{$banesa->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Ndryshimet për banesën: {{$banesa->m2}}m2 në katin {{$banesa->kati}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
            {{$banesa->description}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Mbyll</button>
            </div>
          </div>
        </div>
      </div>
      @endif
      </td>
        @endauth
    </tr>
       @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
    {{$banesat->links()}}
</div>
@endsection