@extends('layouts.app')

@section('content')

        <div class="container text-center">
            <h1>{{ $selected_category }} Photo Gallery</h1>
        </div>    
        <div class="container">
            <div class="content">
                <div class="row mb-5">
                    @if(count($categories) != 0)
                    <div class="col-4 text-center">
                        <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                               <a href="/search/{{ $category->name }}">{{ $category->name }}</a> 
                            </li>   
                        @endforeach            
                        </ul>
                    </div>
                    <div class="col-8">
                                
                        @if ($msg)
                        <ul class="alert alert-danger">
                            <li>{{ $msg }}</li>
                        </ul>
                        @endif
                        @if(count($results) != 0)
                        <div class="container">
                            <div class="row text-center text-lg-left">
                            @foreach($results as $result)
                            <div class="col-lg-3 col-md-4 col-10">
                                <a href="/show/{{ $selected_category }}/{{ $result->id }}" class="d-block mb-4 h-100">
                                        <img class="img-fluid" src="https://farm{{ $result->farm }}.staticflickr.com/{{ $result->server }}/{{ $result->id }}_{{$result->secret}}_q.jpg" alt="{{ $category->name }}">
                                </a>
                            </div>  
                          @endforeach  
                      
                            <div>    
                        </div>
                        @else
                            No Result Found for {{ $selected_category }}    
                        @endif
                    </div>
                    @else
                        No Flickr Category Found
                    @endif
                    
                </div>
            </div>
        </div>
@endsection