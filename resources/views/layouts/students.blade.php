<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    <section class="container-fluid student">
        <div class="container">
            <div class="row">
                <button type="button" class="btn btn-primary mb-4 mt-4" data-toggle="modal" data-target="#exampleModal">
                    Add Student
                </button>
                <button type="button" class="btn btn-danger mb-4 mt-4 ml-3" data-toggle="modal" data-target="#exampleModaldeleteall">
                    Delete all selected
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning mb-4 mt-4 ml-3" data-toggle="modal" data-target="#exampleModalScrollable">
                        Recycle Data
                </button>
                
                <!-- Modal -->
                {{ Form::open(['url' => 'students/recycle','class' => 'w-100','method' => 'POST']) }}
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width: 1080px;">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="d-flex align-items-center">Student Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <span style="display:none">{{$count=1}}</span>
                                        @foreach ($recycle as $trashed)
                                        <tr>
                                            <th scope="row">{{$count++}}</th>
                                            <td>{{ $trashed->studentname}}</td>
                                            <td>{{ $trashed->studentemail }}</td>
                                            <td>{{ $trashed->studentphone }}</td>
                                            <td>{{ $trashed->studentage }}</td>
                                            <td>
                                                @if (isset($trashed->gender)) 
                                                    @if ($trashed->gender==2) 
                                                        {{'male'}}
                                                    @else 
                                                        {{'female'}}
                                                    @endif
                                                @endif
                                                @if (!isset($trashed->gender)) 
                                                    {{null}}
                                                @endif
                                            </td>
                                            <td>
                                                {{Form::checkbox('id[]', $trashed->id,false,['class' => 'checked'])}}  
                                                {{-- <input id="check_all" type="checkbox" v-on:click="action"/> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="recycle" class="btn btn-warning backstudent">Recycle</button>
                                <button type="submit" name="harddelete" class="btn btn-danger deletestudent">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}                       
                        <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger mt-2">
                                        <ul class="list-unstyled p-0">
                                            <li>{{ $error }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                            
                            {{ Form::open(['url' => 'students/insert','class' => 'w-100','method' => 'POST']) }}
                                {{Form::text('username', old('username'), ['class' => 'form-control col-md-12 float-left mt-3','placeholder' => 'Enter your username'])}}
                                {{Form::email('email', old('email'), ['class' => 'form-control col-md-12 float-left mt-3','placeholder' => 'Enter your email'])}}
                                {{Form::password('password', ['class' => 'form-control col-md-12 float-left mt-3','placeholder' => 'Enter your password'])}}
                                {{Form::number('age', old('age'), ['class' => 'form-control col-md-12 float-left mt-3','placeholder' => 'Enter your age'])}}
                                {{Form::number('phone', old('phone'), ['class' => 'form-control col-md-12 float-left mt-3','placeholder' => 'Enter your phonenumber'])}}
                                {{Form::select('gender', ['' => 'choose','1' => 'female', '2' => 'male'],old('gender') == '1'?'selected':'',['class' => 'form-control col-md-12 float-left mt-3'])}}
                                <div class="modal-footer float-right">
                                    <button type="button" class="btn btn-secondary float-right mt-3 mr-3 box" data-dismiss="modal">Close</button>
                                    {{Form::submit('Save',['class' => 'btn btn-primary mt-3 float-right submittt'])}}
                                </div>
                            {{ Form::close() }}
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you Want to delete all selected ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{ Form::open(['url' => 'students/delete/all','class' => 'w-100','method' => 'POST']) }}
                                {{Form::submit('Save changes',['class' => 'btn btn-primary mt-3 float-right'])}}
                            {{ Form::close() }}
                        </div>
                        </div>
                    </div>
                </div> --}}
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="d-flex align-items-center"><input id="check_all" type="checkbox" v-model="checkedall" v-on:click="action" class="mr-3"/> Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Delete Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <span style="display:none">{{$count=1}}</span>
                        @foreach ($students as $array)
                        <tr class={{$array->deleted_at != null? 'bg-warning':''}}>
                            <th scope="row">{{$count++}}</th>
                            <td>
                                    {{ Form::open(['url' => 'students/delete/all','class' => 'w-100','method' => 'POST']) }}
                                    <div class="modal fade" id="exampleModaldeleteall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you Want to delete all selected ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    {{Form::submit('Save changes',['class' => 'btn btn-primary float-right'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="hidden" name="_method" value="delete"> --}}
                                    {{Form::checkbox('id[]', $array->id,false,['class' => 'checked mr-3','data-val' => $array->studentname,':checked' => 'checkbox==true','v-on:click' => 'checkifcheck()'])}}
                                    <label for="checked">{{ $array->studentname }}</label>
                                    {{ Form::close() }}
                                    {{-- {{Form::checkbox('Save changes',['class' => 'btn btn-primary mt-3 float-right'])}} --}}
                                    {{-- <input class="checked mr-3" data-val="{{ $array->studentname }}" value="{{ $array->id }}" name="{{ $array->id }}" v-on:click="checkifcheck()" type="checkbox" :checked="checkbox==true"/> --}}
                                    
                                    {{-- <check-box v-model="check" :value="{{ $array->studentname }}"></check-box> --}}
                                    {{-- <check-box :array="check" value={{ $array->studentname }}></check-box> --}}
                                </td>
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

                            <td class="status" v-show="{{$array->deleted_at == null}}">Active</td>
                            <td class="statustrashed" v-show="{{$array->deleted_at != null}}">Trashed</td>

                            <td class="d-flex justify-content-center align-items-center">
                                <a href="" class="mr-3" style="color:skyblue" data-toggle="modal" data-target="#exampleModaledit{{$array->id}}"><i class="far fa-edit"></i></a>
                                <a href="" v-show="{{$array->deleted_at == null}}" class="" style="color:red" data-toggle="modal" data-target="#exampleModaldelete{{$array->id}}"><i class="far fa-trash-alt"></i></a>
                                <div class="modal fade" id="exampleModaledit{{$array->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(['url' => 'students/insert','class' => 'w-100','method' => 'POST']) }}
                                                {{Form::text('username', $array->studentname, ['class' => 'form-control col-md-12 mt-3 float-left','placeholder' => 'Enter your username'])}}
                                                {{Form::email('email', $array->studentemail, ['class' => 'form-control col-md-12 mt-3 float-left','placeholder' => 'Enter your email'])}}
                                                {{Form::password('password', ['class' => 'form-control col-md-12 mt-3 float-left','placeholder' => 'Enter your password'])}}
                                                {{Form::number('age', $array->studentage, ['class' => 'form-control col-md-12 mt-3 float-left','placeholder' => 'Enter your age'])}}
                                                {{Form::number('phone', $array->studentphone, ['class' => 'form-control col-md-12 mt-3 float-left','placeholder' => 'Enter your phonenumber'])}}
                                                {{Form::select('gender',['' => 'choose','1' => 'female', '2' => 'male'],$array->gender,['class' => 'form-control col-md-12 mt-3 float-left'])}}
                                                <div class="modal-footer float-right">
                                                    <button type="button" class="btn btn-secondary float-right mt-3 mr-3 box" data-dismiss="modal">Close</button>
                                                    {{ Form::open(['url' => 'students/delete/$array->id','class' => 'w-100','method' => 'POST']) }}
                                                        {{Form::submit('Save changes',['class' => 'btn btn-primary mt-3 float-right'])}}
                                                    {{ Form::close() }}
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal fade" id="exampleModaldelete{{$array->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete {{ $array->studentname }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{ Form::open(['url' => 'students/delete/'.$array->id,'class' => 'w-100','method' => 'POST']) }}
                                                {{Form::submit('Delete To Recycle',['class' => 'btn btn-warning mt-3 ml-3 float-right statusall recyclestudent','name'=>'recycle'])}}
                                                {{Form::submit('Delete',['class' => 'btn btn-danger mt-3 float-right deletestudent','name'=>'harddelete'])}}
                                            {{ Form::close() }}
                                        </div>
                                        </div>
                                    </div>
                                </div>
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
                {{-- {{ Form::open(['url' => 'students/insert','class' => 'w-100','method' => 'POST','v-on:submit.prevent']) }} --}}
                    {{-- {{Form::text('username', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your username'])}} --}}
                    {{-- {{Form::email('email', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your email'])}} --}}
                    {{-- {{Form::password('password', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your password'])}} --}}
                    {{-- {{Form::number('age', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your age'])}} --}}
                    {{-- {{Form::number('phone', '', ['class' => 'form-control col-md-4 float-left','placeholder' => 'Enter your phonenumber'])}} --}}
                    {{-- {{Form::select('gender', ['' => 'choose','1' => 'female', '2' => 'male'],null,['class' => 'form-control col-md-4 float-left'])}} --}}
                    {{-- {{Form::submit('submit',['class' => 'btn btn-primary col-md-4 float-left'])}} --}}
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
                {{-- {{ Form::close() }} --}}
                {{-- v-on:click="checkedall=false" type="checkbox" :checked="checkbox==true --}}
            </div>
        </div>
    </section>
    
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    {{-- <script src="/js/main.js"></script> --}}
    @if (session()->has('message'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            type: 'success',
            title: 'Student created in successfully'
        })
    </script>
    @endif
    <script>
        // setTimeout(function() { alert("my message"); }, 500);
        // setTimeout(function() { alert( "moo" ); }, 7000 );
        $(document).ready(function(){
            $('.deletestudent').click(function(){
                Swal.fire({
                    type: 'success',
                    // title: 'Oops...',
                    title: 'Deleted',
                    text: 'The student deleted successfully',
                    showConfirmButton: false,
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            })
            $('.recyclestudent').click(function(){
                Swal.fire({
                    type: 'warning',
                    // title: 'Oops...',
                    title: 'The student deleted to recycle successfully',
                    showConfirmButton: false,
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            })
            $('.backstudent').click(function(){
                Swal.fire({
                    type: 'success',
                    // title: 'Oops...',
                    title: 'The student return back successfully',
                    showConfirmButton: false,
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            })
            // $(".statustrashed").addClass('bg-warning')
            // $(".status").addClass('bg-success')
            $(".checked").click(function(){
                var x = $(this).val();
                console.log(x);
            })
        })
        new Vue({
            el:'.student',
            data:{
                checkedall:false,
                checkbox:false,
                trashed:'Trashed',
                active:'Active',
                // key:'',
                mohamed:'',
                status:false,
                check:[],
                
                value:[]
            },
            methods: {
                action:function(){
                    if(this.checkedall==false&&this.checkbox==true){
                        this.checkedall=false
                        this.checkbox=false
                    }else if(this.checkbox==false&&this.checkedall==true){
                        this.checkedall=false
                        this.checkbox=false
                    }
                    this.checkbox=!this.checkbox
                },
                warn: function (event) {
                    // now we have access to the native event
                    this.event.preventDefault()
                },
                checkifcheck:function(){
                    this.checkedall=false
                    // this.check.push(this.key)
                }
            },
        })
    </script>
    {{-- @if (session()->has('message'))
    <div class="swal2-container swal2-top-end swal2-fade swal2-shown" style="overflow-y: auto;background:none;bottom:unset;left:unset">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-show" tabindex="-1" role="alert" aria-live="polite" style="display: flex;">
            <div class="swal2-header">
                <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-error" style="display: none;">
                <span class="swal2-x-mark">
                    <span class="swal2-x-mark-line-left"></span>
                    <span class="swal2-x-mark-line-right"></span>
                </span>
            </div>
            <div class="swal2-icon swal2-question" style="display: none;"></div>
            <div class="swal2-icon swal2-warning" style="display: none;"></div>
            <div class="swal2-icon swal2-info" style="display: none;"></div>
            <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span>
                <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div>
            <img class="swal2-image" style="display: none;">
            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Signed in successfully</h2>
            <button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        </div>
        <div class="swal2-content">
            <div id="swal2-content" style="display: none;"></div>
            <input class="swal2-input" style="display: none;">
            <input type="file" class="swal2-file" style="display: none;">
            <div class="swal2-range" style="display: none;">
                <input type="range">
                <output></output>
            </div>
            <select class="swal2-select" style="display: none;"></select>
            <div class="swal2-radio" style="display: none;"></div>
            <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;">
                <input type="checkbox">
                <span class="swal2-label">
                    </span>
                </label>
                <textarea class="swal2-textarea" style="display: none;"></textarea>
                <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div>
            </div>
            <div class="swal2-actions" style="display: none;">
                <button type="button" class="swal2-confirm swal2-styled" aria-label="" style="display: none; border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>
                <button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button>
            </div>
            <div class="swal2-footer" style="display: none;"></div>
        </div>
    </div>
    @endif --}}
</body>
</html>