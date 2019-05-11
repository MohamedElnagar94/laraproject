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
                {!! $students->render() !!}
            </div>
        </div>
    </section>

    <script src="/js/app.js"></script>
</body>
</html>