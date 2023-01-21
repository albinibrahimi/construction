@extends('app')
  
@section('content')      
    <div class="row">  
    <h2 class="text-center mt-4 mb-3">Ndrysho madhësinë për banesën: {{$metrat}}m2 në objektin {{$objekt->name}}</h2>
    </div>

<form method="post" action="{{route('updateapartment', ['m2' => $metrat, 'objektid' => $objekt->id])}}">
            @method('PATCH') 
            @csrf 
            <div class="form-group">
                <label>M2:</label>
                <input type="text" name="m2" value="{{$metrat}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ruaj</button>
        </form>
@endsection