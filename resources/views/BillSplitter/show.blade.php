@extends('layouts.master')

@section('title')
    Bill Splitter
@endsection

@push('head')
     <!-- <link href="/css/books/show.css" type='text/css' rel='stylesheet'> -->
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Bill Splitter</h1>
            </div>
        </div>
        <form method="GET" action="/calculate">
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="splitNumTimes">Split how many ways?:</label>
                </div>
                <div class="col-xs-6">
                    <select name="splitNumTimes" id="splitNumTimes">
                        {{-- <?php if(!isset($splitBy)) $splitBy = "1" ?> --}}
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                        <option value="6" >6</option>
                        <option value="7" >7</option>
                        <option value="8" >8</option>
                        <option value="9" >9</option>
                        <option value="10" >10</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="billAmount">How much was the tab?:</label>
                    <p class="subScript">* Required</p>
                </div>
                <div class="col-xs-6">
                    <input type="text" name="billAmount" id="billAmount" placeholder="ex. 24.99" value="{{ $billAmount or '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="serviceScore">How was the service?:</label>
                </div>
                <div class="col-xs-6">
                    <select name="serviceScore" id="serviceScore">
                        {{-- <?php if(!isset($serviceScore)) $serviceScore = "Exceptional" ?> --}}
                        <option value="Exceptional" >Exceptional (20%)</option>
                        <option value="Good" >Good (15%)</option>
                        <option value="Poor" >Poor (10%)</option>
                        <option value="Awful" >Awful (0%)</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 rightJustify">
                    <label for="roundUp">Round up?:</label>
                </div>
                <div class="col-xs-6">
                    <input type="checkbox" name="roundUp" id="roundUp">
                      Yes
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" id="calculate">
                    <input type="submit" value="Calculate" class="btn btn-primary bt-small">
                </div>
            </div>
        </form>

        @if(count($errors) > 0)
            <div class='alert alert-danger'>
                <div class="row">
                    <div class="col-xs-4 rightJustify">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                    </div>
                    <div class="col-xs-8">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @elseif($billTotal != null)
            <div class='alert alert-info'>
                <div class="row">
                    <div class="col-xs-4 rightJustify">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                    </div>
                    <div class="col-xs-8">
                        <ul>
                            <li>Total (with tip): {{ $billTotal }}</li>
                            @if($roundChecked)
                                <li>Each person pays (rounded up): {{ $eachPaysRounded }}</li>
                                <li>With rounding, the total to leave is: {{ $billTotalRounded }}</li>
                            @else
                                <li>Each person pays: {{ $eachPays }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endif




    </div>
@endsection

@push('body')
    <!-- <script src="/js/books/show.js"></script> -->
@endpush
