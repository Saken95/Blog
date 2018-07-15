@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
    @component('admin.components.breadcrumb')
        @slot('title') Список новостеи @endslot
        @slot('parent') Главная @endslot
        @slot('active') Новости @endslot
    @endcomponent

    <hr>

       <div style="display: table; width: 100%;margin-bottom: 10px;">
           <a href="{{ route('admin.article.create') }}" class="btn btn-primary pull-right">
               <i class="fa fa-plus-square-o"></i> Создать категорию
           </a>
       </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Публикация</th>
                    <th class="text-right">Действие</th>
                </tr>
            </thead>
            <tbody>
                @forelse( $articles as $article )
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->published }}</td>
                        <td>
                            <form onsubmit="if(confirm('Удалить?')){ return true } else { return false}"
                            action="{{ route('admin.article.destroy', $article) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a class="btn btn-primary" href="{{ route('admin.article.edit', $article) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            <h2>Данные отсутствует</h2>
                        </td>
                    </tr>
                @endforelse

            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $articles->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection