@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')

<style>
    .error{
        color: red;
    }
</style>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product & Service</h1>
                    </div>

                    <div class="row">
                        <div class="col-10 m-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form action="{{ route('product.store') }}" method="POST" enctype='multipart/form-data' id="product_service">
                            @csrf
                            <div class="form-group">
                                    <strong for="">Title</strong>
                                    <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                    <strong for="">Price</strong>
                                    <input type="text" name="price" id="price" class="form-control" onkeypress="return validateNumber(event)">
                            </div>
                            <div class="form-group">
                                <strong for="">Location</strong>
                                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
                              
                            </div>

                            <div class="form-group">
                                <strong for="">Day</strong>
                                <input type="Number" name="day" id="day" value="{{ old('day') }}" class="form-control">
                              
                            </div>


                            <div class="form-group">
                                <strong for="">Person</strong>
                                <input type="Number" value="{{ old('person') }}" name="person" id="person" class="form-control">
                              
                            </div>


                            <div class="form-group">
                                    <strong for="">Price </strong>

                                <table class="table border price_table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Title</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Description</th>
                                      <th><a id="add-new-btn" class="btn btn-primary" >+</a></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <tr>
                                            <td class="measurement_box"><input type="text" name="price_title[]" value="{{ old('price_title[]') }}" class="form-control"></td>
                                            <td class="measurement_box"><input type="text" name="price_value[]" value="{{ old('price_value[]') }}" class="form-control"></td>
                                            <td class="measurement_box"><input type="text" name="price_desc[]" value="{{ old('price_desc[]') }}" class="form-control"></td>
                                        </tr>
                                    
                                  </tbody>
                                </table>

                                </div>


                            <div class="form-group">
                                <strong>Guider</strong>
                                <select class="form-select" name="guider" aria-label="Default select example">
                                  <option selected>Select Guider</option>
                                  <option value="1">Yes</option>
                                  <option value="2">No</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <strong>Free cancellation</strong>
                                <select class="form-select" name="cancel" aria-label="Default select example">
                                  <option selected>Select Free cancellation</option>
                                  <option value="1">Yes</option>
                                  <option value="2">No</option>
                                </select>
                            </div>


                            <div class="form-group">
                                    <strong for="">Description</strong>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                   
                            </div>

                            <div class="form-group">
                                    <strong for="">What's Included</strong>
                                    <textarea name="included" id="included" cols="30" rows="10" class="form-control"></textarea>
                                   
                            </div>


                             <div class="form-group">
                                    <strong for="">What To Expect</strong>
                                    <textarea name="expect" id="expect" cols="30" rows="10" class="form-control"></textarea>
                                   
                            </div>


                            <div class="form-group">
                                <strong for="">Policy</strong>
                                {{-- <input type="text" name="policy" id="policy" class="form-control"> --}}
                                <textarea name="policy" id="policy" cols="30" rows="10" class="form-control"></textarea>
                            </div>


                             


                            <div class="form-group">
                                    <strong for="">Image</strong>
                                    <input type="file" name="image[]" id="image" class="form-control" multiple accept="image/*">
                                    <div class="gallery"></div>
                            </div>


                            <div class="form-group mt-3">
                                <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                <a href="{{ route('product.index')}}" class="btn btn-info">BACK</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>


@endsection
@push("after-scripts")
  
  <script src="{{ asset('frontend/js/cdnjs.cloudflare.com_ajax_libs_jquery-validate_1.19.5_additional-methods.min.js') }}"></script>
<script src="{{ asset('frontend/js/cdnjs.cloudflare.com_ajax_libs_jquery-validate_1.19.5_jquery.validate.min.js') }}"></script>
<script>

     $("#add-new-btn").on("click", function(e){
      //calling method to add new row
        e.preventDefault();
      addNewRow();
    });

     function addNewRow(){
      var rowHtml='<tr>'
      +'<td class="measurement_box"><input class="form-control" name="price_title[]" type="text" /></td>'
      +'<td class="measurement_box"><input class="form-control" name="price_value[]" type="text" /></td>'
      +'<td class="measurement_box"><input class="form-control" name="price_desc[]" type="text" /></td>'
      +'<td><input type="button" value="-" class="btn btn-danger" onclick="deleteRow(this)" /></td></tr>';
      $(".price_table").append(rowHtml);
    }


     function deleteRow(ele){
      var table = $('.price_table')[0];
      var rowCount = table.rows.length;
      if(rowCount <= 1){
        alert("There is no row available to delete!");
        return;
      }
      if(ele){
        //delete specific row
        $(ele).parent().parent().remove();
      }
      else{
        //delete last row
        table.deleteRow(rowCount-1);
      }
    }

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

 <script>
     $.validator.addMethod("length_width_pice", function(value, element) {
                    var flag = true;

                    $("[name^=price_title]").each(function(i, j) {
                        $(this).parent('.measurement_box').find('small.error').remove();
                        $(this).parent('.measurement_box').find('small.error').remove();
                        if ($.trim($(this).val()) == '') {
                            flag = false;

                            $(this).parent('.measurement_box').append('<small  id="len' +
                                i +
                                '-error" class="error">Please enter price title.</small>');
                        }
                    });

                    $("[name^=price_value]").each(function(i, j) {
                        $(this).parent('.measurement_box').find('small.error').remove();
                        $(this).parent('.measurement_box').find('small.error').remove();
                        if ($.trim($(this).val()) == '') {
                            flag = false;

                            $(this).parent('.measurement_box').append('<small  id="len' +
                                i +
                                '-error" class="error">Please enter price value.</small>');
                        }
                    });


                    $("[name^=price_desc]").each(function(i, j) {
                        $(this).parent('.measurement_box').find('small.error').remove();
                        $(this).parent('.measurement_box').find('small.error').remove();
                        if ($.trim($(this).val()) == '') {
                            flag = false;

                            $(this).parent('.measurement_box').append('<small  id="len' +
                                i +
                                '-error" class="error">Please enter price description.</small>');
                        }
                    });


                    return flag;
                }, "");

   $("#product_service").validate({
            ignore: [],
            rules: {
                 
                "price_title[]": {
                    length_width_pice:true
                },
                "price_value[]": {
                    length_width_pice:true
                },
                "price_desc[]": {
                    length_width_pice:true
                },

               
            },
            messages: {
              
                
               
               

            },
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
              // console.log('test');
              form.submit();
                        
            }

        });

   


</script> 
@endpush
