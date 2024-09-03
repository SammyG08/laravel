@extends('layout.base')

@section('content')

<div class="container w-25 mt-2 p-3">
    <form action="{{route('find.user')}}" class="form-group">
        <div class="container text-center">
            <input type="search" class="form-control w-75 border border-2 d-inline p-2 " name="search" placeholder="Search for user here...">
            <div class="d-inline"><button class="btn btn-primary btn-md ms-2 p-2 d-inline text-white" type="submit">Search</button></div>
        </div>
    </form>
</div>
<div class="container w-50 mt-4 p-4">
    @if (isset($results))
        @if ($results->count())
            @foreach ($results as $result)
               
               <div class="container w-50 mt-4 p-3">
                <a href="{{route('user.posts', $result)}}" class="text-dark text-decoration-none d-block ps-4 fs-5">{{$result->name}}</a>
                <small class="text-muted d-inline ps-4 fw-bold"><small class = "fw-bold text-dark">@</small>{{$result->username}}</small>
               </div> 
            @endforeach
        @endif
    @endif
</div>


@endsection