<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/newslist.css') }}" />

</head>

<body>

    @yield('form-header') 

    @csrf

        <div class="container">
    
            <!-- Page Heading -->
            <h1 class="my-2">@yield('head1') <small>@yield('head2')</small></h1><br />

            <!-- errors -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) 
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-6 mb-4">

                    @yield('fields')
    
                    <div class="form-group" style="text-align: right;">
                        <br />
                        <button type="reset" class="btn btn-info" style="float: left;">Сбросить</button>
                        <button type="button" class="btn btn-primary" onclick="f_submit('new')">Создать</button>
                        <button type="button" class="btn btn-success" onclick="f_submit('edit')">Сохранить</button>
                        <button type="button" class="btn btn-danger" onclick="f_submit('del')">Удалить</button>
                        
                        @yield('buttonSubmitJS')

                    </div>
        
                </div>
                <div class="col-lg-6 mb-4">
                
                    @yield('newsRow')

                </div>
          </div>
    
        </div>
    
    </form>

</body>
</html>