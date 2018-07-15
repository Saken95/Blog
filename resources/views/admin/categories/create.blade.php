@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Создание категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <form action="{{ route('admin.category.store') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            @include('admin.categories.partials.form')
        </form>
        
    </div>

@endsection