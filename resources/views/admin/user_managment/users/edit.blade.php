@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользовател @endslot
        @endcomponent

        <form action="{{ route('admin.user_managment.user.update', $user) }}" method="post" class="form-horizontal">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @include('admin.user_managment.users.partials.form')
        </form>

    </div>

@endsection