@extends('app')
  
@section('content')      
    <div class="row">  
    <h2 class="text-center mt-4 mb-3">Shto banesën për objektin: {{$objekti->name}}</h2>
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
    <form action="{{ route('storebanesa',$objekti->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
     
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>M2:</strong>
                <input type="text" name="m2" class="form-control" placeholder="M2">
            </div>
            <div class="form-group">
                <strong>Nga kati:</strong>
                <input type="text" name="ngakati" class="form-control" placeholder="Nga kati">
            </div>
            <div class="form-group">
                <strong>Kate:</strong>
                <input type="text" name="numriikateve" class="form-control" placeholder="Kate">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
      
</form>

@endsection