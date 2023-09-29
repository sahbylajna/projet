@extends('layouts.appclient')

@section('content')
@php

$exports = \App\Models\export::where('client_id', auth()->guard('clientt')->user()->id)->with('animal')->count();
        $importations = \App\Models\importation::where('client_id', auth()->guard('clientt')->user()->id)->count();
        $backs = \App\Models\back::where('client_id', auth()->guard('clientt')->user()->id)->with('animal')->count();

@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card" style="    color: #fff;background-color: #30f873;border-color: #30f873;">
                <div class="card-header">{{ trans('importations.model_plural') }}</div>
                <div class="card-body">
                    <div class="panel panel-default">
                        <a style="    color: #6c757d;" href="{{ route('importations.client.index') }}" class="side-item {{'client/importations/create' == request()->path() ? 'selected' : ''}} {{'client/importations' == request()->path() ? 'selected' : ''}}">{{  $importations }}</a>

                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="col-md-3">
            <div class="card" style="    color: #fff;background-color: #30f873;border-color: #30f873;">
                <div class="card-header"> {{ trans('backs.model_plural') }}</div>
                <div class="card-body">
                    <div class="panel panel-default">
                        <a style="    color: #6c757d;" href="{{ route('backs.client.index') }}" class="side-item {{'client/backs' == request()->path() ? 'selected' : ''}} {{'client/backs/create' == request()->path() ? 'selected' : ''}}">{{  $backs }}</a>

                    </div>
                </div>
            </div>
        </div> --}}



        <div class="col-md-3">
            <div class="card" style="    color: #fff;background-color: #30f873;border-color: #30f873;">
                <div class="card-header"> {{ trans('exports.model_plural') }}</div>
                <div class="card-body">
                    <div class="panel panel-default">
                        <a style="    color: #6c757d;" href="{{ route('exports.client.index') }}" class="side-item  {{'client/exports' == request()->path() ? 'selected' : ''}} {{'client/exports/create' == request()->path() ? 'selected' : ''}}">{{  $exports }}</a>

                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
@endsection
