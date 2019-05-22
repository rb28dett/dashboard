@extends('rb28dett::layouts.master')
@section('title', __('rb28dett_dashboard::general.dashboard') )
@section('icon', "ion-speedometer")
@section('subtitle', __('rb28dett_dashboard::general.subtitle', ['name' => Auth::user()->name]) )
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_dashboard::general.home')</a></li>
        <li><span href="">@lang('rb28dett_dashboard::general.dashboard')</span></li>
    </ul>
@endsection
@section('content')
    @php
        $user = \RB28DETT\Users\Models\User::findOrFail(Auth::id());
    @endphp
    <div class="uk-container uk-container-large">
        <div uk-grid>
            @foreach ($widgets as $widget)
                @if (array_key_exists('permission', $widget))
                    @if ($user->hasPermission($widget['permission']) or $user->superAdmin())
                        <div class="uk-width-1-1@m uk-width-1-2@l">
                            <div class="uk-card uk-card-default uk-card-body uk-height-1-1">
                                {!! view($widget['view']) !!}
                            </div>
                        </div>
                    @endif
                @else
                    <div class="uk-width-1-1@m uk-width-1-2@l">
                        <div class="uk-card uk-card-default uk-card-body uk-height-1-1">
                            {!! view($widget['view']) !!}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
