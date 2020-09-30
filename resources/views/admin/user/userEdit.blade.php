@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <style>
        .mul-select{
            width: 100%;
        }
    </style>

@endsection
@section('admin')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bootstrap Validation - Normal</h4>
                    <form class="needs-validation" novalidate="" action="{{route('admin.user.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$usr->name}}">
                                    <input type="hidden" class="form-control" name="user_edit" value="{{$usr->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$usr->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Practice</label>
                                    <select class="form-control" name="practiceid[]" multiple>
                                        @foreach($practice as $prac)
                                        <option value="{{$prac->practice}}">{{$prac->practice}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <br>
                                    <?php
                                        $user_prac = \App\Models\user_practice::where('user_id',$usr->id)->get();
                                    ?>
                                    @foreach($user_prac as $userprac)
                                        <div class="remveprcedit">
                                    <label for="validationCustom01">{{$userprac->practice_name}}</label> <i class="fas fa-trash deletepprac" data-id="{{$userprac->id}}" style="padding-left: 10px"></i>
                                        <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.deletepprac').click(function (){
                var id = $(this).data('id');
                $(this).closest('.remveprcedit').remove();
                $.ajax({
                    type : "POST",
                    url: "{{route('admin.user.practice.delete')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : id
                    },
                    success:function(data){

                    }
                });
            })

        })
    </script>
@endsection
