<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Flickr</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
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
                                
                        {{ $msg }}
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
        <script src="/js/app.js"></script>
        <script>
           // console.log(app);
        </script>    
    </body>
</html>
