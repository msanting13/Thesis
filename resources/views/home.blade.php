@extends('layout.examinee-layout-master')
@section('content')
    @php
        $i = 1;
        $y = 6;
    @endphp
    <div class="card">
        <div class="card-body">
            <div><h5 id="noOfQuestions">No. of Questions : {{ $noOfQuestions }}</h5></div>
        </div>
    </div>
    @foreach($questions as $question)
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
@endsection
