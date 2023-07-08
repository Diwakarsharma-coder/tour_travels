@extends('dashboard.layouts.master')
@section('title','Dashboard')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product & Service</h1>
                    </div>

                    <div class="row">
                        <div class="col-10 m-5">

                        <form >
                            @csrf
                            <div class="form-group">
                                    <strong for="">Title</strong>
                                    <input type="text" name="name" class="form-control" disabled value="{{$data->title}}"/>
                            </div>

                            <div class="form-group">
                                    <strong for="">Price</strong>
                                    <input disabled type="email" name="email" id="email" class="form-control"  value="{{$data->price}}" >
                            </div>
                            <div class="form-group">
                                <strong for="">Location</strong>
                                <input disabled type="text" name="location" id="location" class="form-control" value="{{ $data->location }}">

                            </div>

                            <div class="form-group">
                                <strong for="">Day</strong>
                                <input disabled type="Number" name="day" id="day" value="{{ $data->day }}" class="form-control">

                            </div>


                            <div class="form-group">
                                <strong for="">Person</strong>
                                <input disabled type="Number" value="{{ $data->person }}" name="person" id="person" class="form-control">

                            </div>

                            <div class="form-group">
                                <strong for="">Time</strong>
                                <br>
                                @php
                                     $array = explode("|", $data->time);
                                @endphp
                                @foreach ($array as $val)
                                <label id="time_label" class="border bg-secondary text-white p-1" >{{ $val }}</label>

                                @endforeach

                            </div>


                             <div class="form-group">
                        <strong for="">Price</strong>

                            <table class="table border price_table">
                              <thead>
                                <tr>
                                  <th scope="col">Title</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Description</th>
                                  {{-- <th><a id="add-new-btn" class="btn btn-primary" >+</a></th> --}}
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($price_detail as $i => $val)
                                    <tr>
                                        <input type="hidden" name="price_detail_id[]" value="{{ $val->id }}">
                                        <td class="measurement_box"><input type="text" disabled name="price_title[]" value="{{ $val->price_title }}" class="form-control"></td>
                                        <td class="measurement_box"><input type="text" disabled name="price_value[]" value="{{ $val->price_value }}" class="form-control"></td>
                                        <td class="measurement_box"><input type="text" disabled name="price_desc[]" value="{{ $val->price_desc }}" class="form-control"></td>



                                    </tr>
                                @endforeach


                              </tbody>
                            </table>

                    </div>


                            <div class="form-group">
                                <strong>Guider</strong>
                                <select disabled class="form-select" name="guider" aria-label="Default select example">
                                  <option value=" ">Select Guider</option>
                                  <option value="1" <?php if($data->guider == 1){ echo "selected"; } ?> >Yes</option>
                                  <option value="2" <?php if($data->guider == 2){ echo "selected"; } ?> >No</option>
                                </select>
                            </div>


                                <div class="form-group">
                                    <strong>Free cancellation</strong>
                                    <select disabled class="form-select" name="cancel" aria-label="Default select example">
                                      <option value=" ">Select Free cancellation</option>
                                      <option value="1" <?php if($data->cancel == 1){ echo "selected"; } ?> >Yes</option>
                                      <option value="2" <?php if($data->cancel == 2){ echo "selected"; } ?>>No</option>
                                    </select>
                                </div>


                            <div class="form-group">
                                    <strong for="">Descrption</strong>
                                    {{-- <input disabled type="text" name="website" id="website" class="form-control"  value="{{$data->description}}"> --}}
                                    <p> {!! htmlspecialchars_decode(stripslashes($data->description)) !!}</p>
                            </div>

                            <div class="form-group">
                            <strong for="">What's Included</strong>
                            <p> {!! htmlspecialchars_decode(stripslashes($data->included)) !!}</p>

                    </div>


                     <div class="form-group">
                            <strong for="">What To Expect</strong>
                            <p> {!! htmlspecialchars_decode(stripslashes($data->expect)) !!}</p>

                    </div>


                            <div class="form-group">
                                <strong for="">Policy</strong>
                                <p > {!! htmlspecialchars_decode(stripslashes($data->description)) !!}</p>
                        </div>

                            <div class="form-group">
                                    <strong for="">Images </strong>
                                    {{-- <img src="{{ asset('images')}}/{{$data->logo}}"  width="100px" height="100px"  alt=""> --}}

                            </div>
                            @php
                            $array = explode("|", $data->image);
                            @endphp
                            @foreach($array as $val)
                                {{-- <div class="old_imageData"> --}}
                                    <img width="200px" class="old_imageData" style="border: 1px solid #ccc; margin: 5px" height="200px" src="{{ asset('product/'.$val) }}">
                                {{-- </div> --}}

                            @endforeach

                            <div class="form-group">
                                <a href="{{route('product.index')}}" class="btn btn-info">Back</a>
                            </div>

                            </form>
                        </div>

                    </div>

                </main>

@endsection
@push("after-scripts")

@endpush
