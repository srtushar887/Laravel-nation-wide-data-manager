@extends('layouts.user')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <style>


        .dataTables_wrapper .dataTables_length{
            display: none;
        }

        .table.dataTable tbody th, table.dataTable tbody td{
            white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
        }

        .table .thead-light th{
            background-color: #4267B2;
            color: white;
            font-weight: bold;

        }

        thead{
            background-color: #4267B2;
            color: white;
        }





        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

            background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 150ms infinite linear;
            -moz-animation: spinner 150ms infinite linear;
            -ms-animation: spinner 150ms infinite linear;
            -o-animation: spinner 150ms infinite linear;
            animation: spinner 150ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }




    </style>
@endsection
@section('user')
    {{--    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#importDocument" style="margin-top: -32px;">Import Excel</button>--}}

    <br>
    <div class="row" style="margin-top: -100px;">
        <div class="col-lg-12">
            <div class="card" style="margin-top: -32px">
                {{$count}}
                <div class="card-body">
                    <table class="table table-striped table-bordered mb-0" id="demo">

                        <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Account Number</th>
                            <th>Dos</th>
                            <th>Document Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.update.document')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" class="form-control patientneme" name="patient_name">
                            <input type="hidden" class="form-control edit_id" name="edit_id">
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control acnum" name="account_number">
                        </div>
                        <div class="form-group">
                            <label>DOS</label>
                            <input type="date" class="form-control dosdate" name="dos">
                        </div>
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" class="form-control dcoumentname" name="document_name">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control status" name="status">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="">Update</button>
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


        function editdata(id)
        {
            var id = id;
            console.log(id);
            $.ajax({
                type : "POST",
                url : "{{route('user.get.singe.data')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    var a = new Date(data.dos);
                    var dd = String(a.getDate()).padStart(2, '0');
                    var mm = String(a.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = a.getFullYear();
                    var cc = mm + '-' + dd + '-' + yyyy;
                    var ccc = yyyy + '-' + mm + '-' + dd;


                    $('.edit_id').val(id);
                    $('.patientneme').val(data.patient_name);
                    $('.acnum').val(data.account_number);
                    $('.dosdate').val(ccc);
                    $('.dcoumentname').val(data.document_name);
                    $('.status').val(data.status);
                }
            });
        };



        // $('#updatebtn').click(function (e) {
        //     e.preventDefault();
        //
        //     var p_name = $('.practicename').val();
        //     var acnum = $('.acnum').val();
        //     var dosdate = $('.dosdate').val();
        //     var dcoumentname = $('.dcoumentname').val();
        //     var status = $('.status').val();
        //
        //
        //     console.log(p_name);
        //     console.log(acnum);
        //     console.log(dosdate);
        //     console.log(dcoumentname);
        //     console.log(status);
        //
        // })



        $(document).ready(function (){


            $('.type').change(function () {


                var type_name = $(this).val();
                var practice_name = $('.practicename').val();

                if (practice_name == "0"  ){
                    alert('Please Select Practice');
                    $('.type').val(0);
                }else if (type_name == 0){
                    alert('Please Select Type');
                    $('.type').val(0);
                }else {
                    $('.msg').hide();
                    $('#demo').hide();
                    $('#demo').DataTable().destroy();
                    $('#demo').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "pageLength": 30,
                        "bFilter": false,
                        "language": {
                            processing: '  <div class="loading">Loading&#8230;</div> '},
                        "ajax": {
                            "type": "POST",
                            data:{
                                '_token' : "{{csrf_token()}}",
                                type_name: type_name,
                                practice_name : practice_name,
                            },
                            "url": "{{route('user.get.practice.filter')}}"
                        },
                        columns: [
                            { data: 'patient_name', name: 'patient_name',class : 'text-left' },
                            { data: 'account_number', name: 'account_number',class : 'text-left' },
                            { data: 'dos', name: 'dos',class : 'text-left' },
                            { data: 'document_name', name: 'document_name',class : 'text-left' },
                            { data: 'status', name: 'status',class : 'text-left' },
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ],
                    });
                    $('#demo').show();
                }

            });







        });
    </script>


@endsection
