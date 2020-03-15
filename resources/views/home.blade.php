@extends('layout.examinee-layout-master')
@section('content')
    @php
        $i = 1;
    @endphp
    <div class="card">
        <div class="card-body">
            <div><h5 id="noOfQuestions">No. of Questions : {{ $noOfQuestions }}</h5></div>
        </div>
    </div>
    @foreach($multipleChoice as $question)
     <div class="row" id="{{ uniqid() }}">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-body">
                     <h4>Q{{ $i++ }}</h4>
                     <div class="clearfix"></div>
                     <hr>
                     <h4 class="row">
                         <div class="col-md-6" id="question-{{$question->id}}"> {!! $question->content !!}</div>
                     </h4>
                     <table class="table table-hover table-condensed table-striped table-bordered">
                         <tbody>
                             <form>
                                 @foreach($question->choices as $choice)
                            
                                     <tr>
                                         <th style="width: 2px;">
                                             <input name="group5" type="radio" id="{{ $question->id }}radio_{{ $choice->key }}" data-id="{{ $question->id }}" data-key="{{$question->answers_key}}{{md5(trim(substr($question->content, 0,10)))}}" value="{{ $choice->key }}" class="with-gap radio-col-deep-purple">
                                             <label for="{{ $question->id }}radio_{{ $choice->key }}">{{ $choice->key }}</label>
                                         </th>
                                         <td>
                                             {!! $choice->content !!}
                                         </td>
                                     </tr>
                                 @endforeach
                             </form>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 @endforeach

 @foreach($fillInTheBlank as $question)
     <div class="row" id="{{ uniqid() }}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Q{{ $i++ }}</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <h4 class="row">
                        <div class="col-md-6" data-key="{{ $question->answers_key }}" data-id="{{$question->id}}" id="question-text-{{$question->id}}"> {!! $question->content !!}</div>
                        {{-- <input type="text" id="{{ $question->id }}text_{{ $choice->key }}" data-id="{{ $question->id }}" data-key="{{$question->answers_key}}{{md5(trim(substr($question->content, 0,10)))}}" data-type="fillIn" placeholder="Enter your answer here..." class="with-gap form-control"> --}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endforeach 

@foreach($identification as $question)
     <div class="row" id="{{ uniqid() }}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Q{{ $i++ }}</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <h4 class="row">
                        <div class="col-md-6" id="question-text-{{$question->id}}"> {!! $question->content !!}</div>
                        <input type="text" id="{{ $question->id }}text_{{ $choice->key }}" data-id="{{ $question->id }}" data-key="{{$question->answers_key}}{{md5(trim(substr($question->content, 0,10)))}}" data-type="identification" placeholder="Enter your answer here..." class="with-gap form-control">
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
