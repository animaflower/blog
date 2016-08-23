@extends('backend.layout')

@section('title')
    <title>{{ config('blog.title') }} | Profile</title>
@stop

@section('content')
    <section id="main">

        @include('backend.partials.sidebar-navigation')

        <section id="content">
            <div class="container container-alt">

                <div class="block-header">
                    <h2>{{ Auth::user()->display_name }}
                        <small>{{ Auth::user()->job }}, {{ Auth::user()->city }}, {{ Auth::user()->country }}</small>
                    </h2>
                </div>

                <div class="card" id="profile-main">

                    @include('backend.profile.partials.sidebar')

                    <div class="pm-body clearfix">
                        @section('profile-content')
                            <ul class="tab-nav tn-justified">
                                <li class="{{ Route::is('admin.profile.index') ? 'active' : '' }}">
                                    <a href="{{ url('admin/profile') }}">Profile</a>
                                </li>
                                <li class="{{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/profile') }}/{{ Auth::id() }}/edit">Settings</a>
                                </li>
                                <li class="{{ Route::is('admin.profile.privacy') ? 'active' : '' }}">
                                    <a href="{{ url('admin/profile/privacy') }}">Privacy</a>
                                </li>
                            </ul>

                            @if(Session::has('errors') || Session::has('success'))
                                <div class="pmb-block">
                                    <div class="pmbb-header">
                                        @include('shared.errors')
                                        @include('shared.success')
                                    </div>
                                </div>
                            @endif
                        @show
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop