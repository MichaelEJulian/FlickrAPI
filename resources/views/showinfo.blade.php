<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

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
                    <div class="col-3 text-center">
                        <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                               <a href="/search/{{ $category->name }}">{{ $category->name }}</a> 
                            </li>   
                        @endforeach            
                        </ul>
                    </div>
                    <div class="col-9">
                        {{ $msg }}
                        @if($result)
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="#" class="d-block mb-4">
                                        <img class="img-fluid" src="https://farm{{ $result->photo->farm }}.staticflickr.com/{{ $result->photo->server }}/{{ $result->photo->id }}_{{$result->photo->secret}}.jpg" alt="{{ $result->photo->id }}">
                                    </a>
                                </div>  
                                <div class="col-sm">
                                    <h3>{{ $result->photo->title->_content }} </h3>
                                    <p>
                                        {{ $result->photo->description->_content }} 
                                    </p>
                                </div>  
                                <div>
                                    <a class="btn btn-primary btn-sm" href="/search/{{ $selected_category }}"><</a>
                                </div>
                            <div>    
                        </div>
                        @else
                            No Result Found for $result->photo->id   
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
