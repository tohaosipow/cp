@extends('layouts.panel', ['title' => "Заявки", "describe" => "заявки от граждан"])
@section('content')

    <div class="main-part">
        <div class="container-fluid">

            <div class="w-100">
                <a class="mb-2 button-answer button-answer-br float-right"><ion-icon name="add"></ion-icon> Добавить заявку</a>
            </div>
            <div class="card table-responsive">
                <table class="table out-table">
                    <tr>
                        <th>#</th>
                        <th>Категория</th>
                        <th>Ведомоство</th>
                        <th>Имя</th>
                        <th>Контакты</th>
                        <th>Суть жалобы</th>

                    </tr>
                    @foreach($apps as $app)
                        <tr>
                            <td>{{$app->id}}</td>
                            <td>
                                <div class="highlighth h-green">{{$app->category->mnemo}}</div>
                            </td>
                            <td>
                                {{$app->provider->name}}
                            </td>
                            <td>{{$app->creator->last_name}} {{$app->creator->first_name}}</td>
                            <td>{{$app->creator->phone}}</td>
                            <td>{{$app->text}}</td>
                            <td ><a href="{{route('application', [Request::route('provider'), $app])}}" class="button-answer"><ion-icon name="share-alt"></ion-icon> Перейти к заявке</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>

@endsection
