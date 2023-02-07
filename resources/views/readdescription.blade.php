@extends('app')
  
@section('content')      
    <div class="row">  
    <h2 class="text-center mt-4 mb-3">Ndryshimet e blerësit për banesën: {{$banesa->m2}}m2 në katin {{$banesa->kati}}</h2>
    </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Përshkrimi</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$banesa->description}}</textarea>
             </div>
@endsection