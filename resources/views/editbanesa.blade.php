@extends('app')
  
@section('content')      
    <div class="row">  
    <h2 class="text-center mt-4 mb-3">Ndrysho statusin për banesën: {{$banesa->m2}}m2 në katin {{$banesa->kati}}</h2>
    </div>

<form method="post" action="{{ route('update', $banesa->id) }}">
            @method('PATCH') 
            @csrf 
            <div class="form-group">
                <label>Statusi:</label>
                <select class="form-select" aria-label="Default select example" name="statusi">
                    <option selected value="0">E lirë</option>
                    <option value="1">E shitur</option>
                    <option value="2">E rezervuar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ruaj</button>
        </form>
@endsection