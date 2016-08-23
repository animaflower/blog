@extends('backend.layout')

@section('title')
    <title>{{ config('blog.title') }} | Tools</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="block-header">
                    <h2>Site Details
                        <small>
                            <i class="zmdi zmdi-dns"></i>&nbsp;&nbsp;{{ strtoupper($data['host']) }} ({{ $data['ip'] }})&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-time"></i>&nbsp;&nbsp;{{ strtoupper($data['timezone']) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="zmdi zmdi-circle" @if($data['status'] === 'Active') style="color: #4CAF50" @else style="color: #FF9800;" @endif></i>&nbsp;&nbsp;{{ strtoupper($data['status']) }}
                        </small>
                    </h2>
                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Refresh Tools</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @include('backend.tools.sections.maintenance-mode')
                @include('backend.tools.sections.export-data')
                @include('backend.tools.sections.reset-index')
                @include('backend.tools.sections.clear-cache')
            </div>
        </section>
    </section>
    @include('backend.tools.partials.modals.reset-index')
    @include('backend.tools.partials.modals.cache-clear')
@stop

@section('unique-js')
    @if(Session::get('_reset-index'))
        @include('backend.partials.notify', ['section' => '_reset-index'])
        {{ \Session::forget('_reset-index') }}
    @endif

    @if(Session::get('_cache-clear'))
        @include('backend.partials.notify', ['section' => '_cache-clear'])
        {{ \Session::forget('_cache-clear') }}
    @endif

    @if(Session::get('_enable-maintenance-mode'))
        @include('backend.partials.notify', ['section' => '_enable-maintenance-mode'])
        {{ \Session::forget('_enable-maintenance-mode') }}
    @endif

    @if(Session::get('_disable-maintenance-mode'))
        @include('backend.partials.notify', ['section' => '_disable-maintenance-mode'])
        {{ \Session::forget('_disable-maintenance-mode') }}
    @endif
@stop
