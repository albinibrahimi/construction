@extends('app')
  
@section('content')      
    <div class="row">  
    <h2 class="text-center mt-4 mb-3">Shto ndryshimet e blerësit për banesën: {{$banesa->m2}}m2 në katin {{$banesa->kati}}</h2>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ka disa probleme me inputin tuaj.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{ route('updatedescription', $banesa->id) }}">
            @method('PATCH') 
            @csrf 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Përshkrimi</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$banesa->description}}</textarea>
             </div>
            <button type="submit" class="btn btn-primary mt-2">Ruaj</button>
        </form>
@endsection