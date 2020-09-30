@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dist/min/dropzone.min.css')}}">

    <!-- JS -->
    <script src="{{asset('dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>

@endsection
@section('admin')

    <div class="row">
        <div class="col-md-12" style="height: 500px;">
            <div class='content'>
                <!-- Dropzone -->
                <form action="{{route('admin.pdf.file.save')}}" method="post" enctype="multipart/form-data" class='dropzone' id="my-awesome-dropzone" >
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone",{
            maxFilesize: 10,  // 10 mb
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf"
        });
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
        });
    </script>
@stop
