@extends('dashboard.layouts.master')
@section('title', 'Service')
@push('after-styles')
@endpush
@section('content')


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product & service</h1>
        </div>

        <div class="row">
            <div class="col-6 m-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('product.update', $data->id) }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <strong for="">Title</strong>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $data->title }}">
                    </div>

                    <div class="form-group">
                        <strong for="">Price</strong>
                        <input type="text" name="price" id="price" class="form-control"  value="{{ $data->price }}"
                            onkeypress="return validateNumber(event)">
                    </div>

                    <div class="form-group">
                        <strong for="">Location</strong>
                        <input type="text" name="location" id="location" class="form-control" value="{{ $data->location }}">
                      
                    </div>

                    <div class="form-group">
                        <strong for="">Day</strong>
                        <input type="Number" name="day" id="day" value="{{ $data->day }}" class="form-control">
                      
                    </div>


                    <div class="form-group">
                        <strong for="">Person</strong>
                        <input type="Number" value="{{ $data->person }}" name="person" id="person" class="form-control">
                      
                    </div>

                    <div class="form-group">
                                <strong>Guider</strong>
                                <select class="form-select" name="guider" aria-label="Default select example">
                                  <option value=" ">Select Guider</option>
                                  <option value="1" <?php if($data->guider == 1){ echo "selected"; } ?> >Yes</option>
                                  <option value="2" <?php if($data->guider == 2){ echo "selected"; } ?> >No</option>
                                </select>
                            </div>


                    <div class="form-group">
                        <strong>Free cancellation</strong>
                        <select class="form-select" name="cancel" aria-label="Default select example">
                          <option value=" ">Select Free cancellation</option>
                          <option value="1" <?php if($data->cancel == 1){ echo "selected"; } ?> >Yes</option>
                          <option value="2" <?php if($data->cancel == 2){ echo "selected"; } ?>>No</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <strong for="">Description</strong>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $data->description }}</textarea>
                       
                    </div>
                    <div class="form-group">
                            <strong for="">What's Included</strong>
                            <textarea name="included" id="included" cols="30" rows="10" class="form-control">{{ $data->included }}</textarea>
                           
                    </div>


                     <div class="form-group">
                            <strong for="">What To Expect</strong>
                            <textarea name="expect" id="expect" cols="30" rows="10" class="form-control">{{ $data->expect }}</textarea>
                           
                    </div>

                    <div class="form-group">
                        <strong for="">Policy</strong>
                        {{-- <input type="text" name="policy" id="policy" class="form-control"> --}}
                        <textarea name="policy" id="policy" cols="30" rows="10" class="form-control">{{ $data->policy }}</textarea>
                    </div>

                    <div class="form-group">
                        <strong for="">Image</strong>
                        <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                        <input type="hidden" name="old_image" id="" value="{{ $data->image}}">
                        <div class="gallery"></div>

                        @php
                        $array = explode("|", $data->image);
                        @endphp
                        @foreach($array as $val)
                            {{-- <div class="old_imageData"> --}}
                                <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('product/'.$val) }}">
                            {{-- </div> --}}

                        @endforeach

                    </div>


                    <div class="form-group mt-3">
                        <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                        <a href="{{ route('product.index') }}" class="btn btn-info">BACK</a>
                    </div>

                </form>
            </div>

        </div>

    </main>

@endsection
@push('after-scripts')

<script>
    var imagesPreview = function(input, placeToInsertImagePreview) {

    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img width="150px" height="150px" style="border:1px solde red; ">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

    };

    $('#image').on('change', function() {
        $('.old_imageData').css('display','none');

    imagesPreview(this, 'div.gallery');
    });






</script>


<script>
     CKEDITOR.on( 'instanceReady', function( ev ) {
            document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

            document.getElementById( 'eButtons' ).style.display = 'block';
        });

        function InsertHTML() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById( 'htmlArea' ).value;

            if ( editor.mode == 'wysiwyg' )
            {
                editor.insertHtml( value );
            }
            else
                alert( 'You must be in WYSIWYG mode!' );
        }

        function InsertText() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById( 'txtArea' ).value;

            if ( editor.mode == 'wysiwyg' )
            {
                editor.insertText( value );
            }
            else
                alert( 'You must be in WYSIWYG mode!' );
        }

        function SetContents() {
            var editor = CKEDITOR.instances.editor1;
            var value = document.getElementById( 'htmlArea' ).value;

            editor.setData( value );
        }

        function GetContents() {
            var editor = CKEDITOR.instances.editor1;
            alert( editor.getData() );
        }

        function ExecuteCommand( commandName ) {
            var editor = CKEDITOR.instances.editor1;

            if ( editor.mode == 'wysiwyg' )
            {
                editor.execCommand( commandName );
            }
            else
                alert( 'You must be in WYSIWYG mode!' );
        }

        function CheckDirty() {
            var editor = CKEDITOR.instances.editor1;
            alert( editor.checkDirty() );
        }

        function ResetDirty() {
            var editor = CKEDITOR.instances.editor1;
            editor.resetDirty();
            alert( 'The "IsDirty" status has been reset' );
        }

        function Focus() {
            CKEDITOR.instances.editor1.focus();
        }

        function onFocus() {
            document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
        }

        function onBlur() {
            document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
        }

            CKEDITOR.replace('description', {
                on: {
                    focus: onFocus,
                    blur: onBlur,
                    pluginsLoaded: function(evt) {
                        var doc = CKEDITOR.document,
                            ed = evt.editor;
                        if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                        if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                    }
                }
            });


             CKEDITOR.replace('policy', {
                on: {
                    focus: onFocus,
                    blur: onBlur,
                    pluginsLoaded: function(evt) {
                        var doc = CKEDITOR.document,
                            ed = evt.editor;
                        if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                        if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                    }
                }
            });
             
             CKEDITOR.replace('included', {
                on: {
                    focus: onFocus,
                    blur: onBlur,
                    pluginsLoaded: function(evt) {
                        var doc = CKEDITOR.document,
                            ed = evt.editor;
                        if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                        if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                    }
                }
            });
              CKEDITOR.replace('expect', {
                on: {
                    focus: onFocus,
                    blur: onBlur,
                    pluginsLoaded: function(evt) {
                        var doc = CKEDITOR.document,
                            ed = evt.editor;
                        if (!ed.getCommand('bold')) doc.getById('exec-bold').hide();
                        if (!ed.getCommand('link')) doc.getById('exec-link').hide();
                    }
                }
            });
        </script>

@endpush
