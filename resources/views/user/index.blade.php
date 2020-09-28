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




    </style>
@endsection
@section('user')
    <div class="row" style="margin-top: -90px;">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3" style="padding-top: 5px;">
                            <select class="form-control practicename" name="practice_id" style="margin-top: -5px;border: 2px solid goldenrod">
                                <option value="0">----SELECT PRACTICE----</option>
                                @foreach($practice as $prac)
                                    <option value="{{$prac->practice}}">{{$prac->practice}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-top: 5px;">
                            <select class="form-control type" name="type" style="margin-top: -5px;border: 2px solid goldenrod">
                                <option value="0">----SELECT TYPE----</option>
                                <option value="Demo">DEMO</option>
                                <option value="Super Bill">SUPER BILL</option>
                                <option value="Insurance Payment">INS.PAY</option>
                                <option value="Denial">DENIAL</option>
                                <option value="Medical Record">M.R</option>
                                <option value="Patient Payment">PPAY</option>
                                <option value="Refund">REFUND</option>
                                <option value="Authorization">AUTH</option>
                                <option value="Error">ERROR</option>
                                <option value="Referal">REFERAL</option>
                            </select>

                        </div>

                        <div class="col-md-2">
                            <input type="date" name="form_date" id="from_date" class="form-control from_date" placeholder="From Date" style="margin-top: -5px;border: 2px solid goldenrod">

                        </div>
                        <div class="col-md-2">
                            <input type="date" name="to_date" id="to_date" class="form-control to_date" placeholder="From Date" style="margin-top: -5px;border: 2px solid goldenrod">

                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success btn-block" style="background-color: #4267b2;margin-top: -5px" id="filter">Filter</button>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <div class="row">

                        </div>
                    </div>
                    <br>

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



    <div class="modal fade" id="userupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <button type="submit" class="btn btn-primary">Update</button>
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

        $(document).ready(function (){


            $.ajax({
                type : "POST",
                url: "{{route('update.data.date')}}",
                data : {
                    '_token' : "{{csrf_token()}}",

                },
                success:function(data){
                    console.log('success');
                }
            });








            $('#filter').click(function () {


                var type_name = $('.type').val();
                var practice_name = $('.practicename').val();
                var from_date = $('.from_date').val();
                var to_date = $('.to_date').val();
                //
                var a = new Date(from_date);
                var month = a.getMonth();
                var b = new Date(to_date);
                var month1 = b.getMonth();

                var tmont = (month1 -  month);

                if (type_name == "0"  ){
                    alert('Please Select All Field');
                }else if (practice_name == 0){
                    alert('Please Select All Field');
                }else if (from_date == ''){
                    alert('Please Select All Field');
                }else if (to_date == 0){
                    alert('Please Select All Field');
                }else if (tmont  > 1) {
                    alert('Data Can show only one moth');


                }else {
                    $('.msg').hide();

                    $('#demo').DataTable().destroy();
                    $('#demo').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "pageLength": 30,
                        "ajax": {
                            "type": "POST",
                            data:{
                                '_token' : "{{csrf_token()}}",
                                type_name: type_name,
                                practice_name : practice_name,
                                from_date : from_date,
                                to_date : to_date
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
                }









            });







        });
    </script>

@endsection
