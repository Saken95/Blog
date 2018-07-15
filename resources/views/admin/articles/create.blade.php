@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание новости @endslot
            @slot('parent') Главная @endslot
            @slot('active') Новости @endslot
        @endcomponent

        <form action="{{ route('admin.articles.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            @include('admin.articles.partials.form')
        </form>
        
    </div>

@endsection