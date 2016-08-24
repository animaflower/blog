@extends('backend.layout')

@section('title')
    <title>{{ config('blog.title') }} | Tags</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin') }}">Home</a></li>
                            <li class="active">Visit</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh Visit</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        @include('shared.errors')
                        @include('shared.success')

                        <h2>Visit record
                            <small>所有访问网站记录</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table-tags" class="table table-condensed table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="ip" data-sortable="false">IP</th>
                                    <th data-column-id="time" data-order="desc">Time</th>
                                    <th data-column-id="count">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visit_record as $record)
                                    <tr>
                                        <td>{{ $record->ip }}</td>
                                        <td>{{ $record->created_at }}</td>
                                        <td class="hidden-md">{{  $record->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @include('backend.tag.partials.datatable')
@stop
