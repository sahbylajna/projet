@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Term' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">



            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('terms.term.update', $term->id) }}" id="edit_term_form" name="edit_term_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('terms.form', [
                                        'term' => $term,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('terms.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection

@section('js')


    <script>
        var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // Text formatting
  ['blockquote', 'code-block'],                    // Blocks
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],    // Lists
  [{ 'indent': '-1'}, { 'indent': '+1' }],        // Indentation
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],       // Headers
  ['link', 'image'],                               // Links and images
  [{ 'color': [] }, { 'background': [] }],         // Text color and background
  [{ 'align': [] }]                                // Text alignment
];
  var quill = new Quill('#editor', {
            placeholder: 'Enter Detail',
            theme: 'snow',
            modules: {
                toolbar:toolbarOptions
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#description').val(quill.container.firstChild.innerHTML);
        });


        var quill2 = new Quill('#editor2', {
            placeholder: 'Enter Detail',
            theme: 'snow',
            modules: {
                toolbar:toolbarOptions
            }
        });

        quill2.on('text-change', function(delta, oldDelta, source) {
            console.log(quill2.container.firstChild.innerHTML)
            $('#Conditionar').val(quill2.container.firstChild.innerHTML);
        });





$(document).ready(function(){

  $("#create_users_form").on("submit", function () {

    // var hvalue = $('#editor').html();
    // $(this).append("<textarea name='description' style='display:none'>"+hvalue+"</textarea>");
    // return true;
   });

});


    </script>
@endsection
