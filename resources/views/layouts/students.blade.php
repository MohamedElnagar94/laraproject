<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                      </tr>
                    </thead>
                    <tbody>
                        <span style="display:none">{{$count=1}}</span>
                        @foreach ($students as $array)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{ $array->studentname }}</td>
                            <td>{{ $array->studentemail }}</td>
                            <td>{{ $array->studentphone }}</td>
                            <td>{{ $array->studentage }}</td>
                            {{-- <td>{{ $array->gender == 2 ? 'male' : 'female' }}</td> --}}
                            <td>
                                @if (isset($array->gender)) 
                                    @if ($array->gender==2) 
                                        {{'male'}}
                                    @else 
                                        {{'female'}}
                                    @endif
                                @endif
                                @if (!isset($array->gender)) 
                                    {{null}}
                                @endif
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $students->render() !!} --}}
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                {{ Form::open(['url' => 'students/insert','class' => 'w-100','method' => 'POST']) }}
                    {{Form::text('username', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your username'])}}
                    {{Form::email('email', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your email'])}}
                    {{Form::password('password', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your password'])}}
                    {{Form::number('age', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your age'])}}
                    {{Form::number('phone', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your phonenumber'])}}
                    {{Form::select('gender', ['0' => 'choose','1' => 'female', '2' => 'male'],null,['class' => 'form-control col-md-4 float-left'])}}
                    {{Form::submit('submit',['class' => 'btn btn-primary col-md-4 float-left'])}}
                    {{-- {{Form::date('name', \Carbon\Carbon::now(), ['class' => 'form-control'])}} --}}
                    {{-- {{Form::file('image', ['class' => 'form-control'])}} --}}
                    {{-- {{Form::select('size', ['L' => 'Large', 'S' => 'Small'], 'S')}} --}}
                    {{-- {{Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...'])}} --}}
                    {{-- {{Form::select('animal',[
                        'Cats' => ['leopard' => 'Leopard'],
                        'Dogs' => ['spaniel' => 'Spaniel'],
                    ])}} --}}
                    {{-- {{Form::selectRange('number', 10, 20)}} --}}
                    {{-- {{Form::selectMonth('month')}} --}}
                    {{-- {{link_to('mohamed', $title = null, $attributes = [], $secure = null)}} --}}
                    {{-- {{link_to_asset('foo/bar.zip', $title = null, $attributes = [], $secure = null)}} --}}
                {{ Form::close() }}
            </div>
        </div>
    </section>

    <script src="/js/app.js"></script>
</body>
</html>