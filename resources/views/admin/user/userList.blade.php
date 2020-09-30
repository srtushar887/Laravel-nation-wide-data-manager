@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">


    <style>
        .table.dataTable tbody th, table.dataTable tbody td{
            white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
        }

        .table .thead-light th{
            background-color: #4267B2;
            color: white;

        }

        thead{
            background-color: #4267B2;
            color: white;
        }


    </style>
@endsection
@section('admin')

    <br>
    <div class="row" style="margin-top: -100px">

        <div class="col-lg-12">
            <button class="btn btn-success pull-right btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Create New User</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User List</h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0" id="users">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="adminuseredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.update')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control name" name="name">
                            <input type="hidden" class="form-control edituser" name="user_edit">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Practice</label>
                            <p>asdasda</p> <i class="fas fa-trash"></i>
                            <select class="form-control" multiple>
                                <option>dasdasd</option>
                                <option>asdasdas</option>
                                <option>asdasd</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="adminuserdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this user ?
                            <input type="hidden" class="form-control userdelete" name="user_delete">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>



        function userdelete(id) {
            $('.userdelete').val(id);
        }


        function useredit(id)
        {
            var id = id;
            $.ajax({
                type : "POST",
                url : "{{route('admin.get.single.user')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.edituser').val(id);
                    $('.name').val(data.name);
                    $('.email').val(data.email);
                }
            });
        };




        $(document).ready(function (){
            $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 25,
                "lengthMenu": [[25, 50,75, -1], [25, 50,75, "All"]],
                "bSort": false,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('admin.get.users')}}"
                },
                columns: [
                    { data: 'name', name: 'name',class : 'text-left' },
                    { data: 'email', name: 'email',class : 'text-left' },
                    { data: 'created_at', name: 'created_at',class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })
    </script>
@endsection

