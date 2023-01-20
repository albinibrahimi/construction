@extends('app')

@section('content')

                <h1 class="text-center mt-4 mb-5">Objektet</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  <div class="row">
  @foreach ($objekts as $objekt)
  <div class="col-md-4 p-3">
  <a href="{{ route('banesat',$objekt->id) }}" class="text-decoration-none text-dark">
        <img src="/images/{{$objekt->image}}" width="100%" class="rounded">
        <h5 class="mt-2 text-center">{{$objekt->name}}</h5>
    </a>
</div>

    @endforeach
  </div>
@endsection