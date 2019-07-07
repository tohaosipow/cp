@extends('layouts.panel', ['title' => "Заявка #".$application->id, "describe" => "заявка от гражданина"])
@section('content')

    <div class="main-part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <script type="text/javascript">
                        // Функция ymaps.ready() будет вызвана, когда
                        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
                        ymaps.ready(init);

                        function init() {
                            // Создание карты.
                            var myMap = new ymaps.Map("map", {
                                // Координаты центра карты.
                                // Порядок по умолчанию: «широта, долгота».
                                // Чтобы не определять координаты центра карты вручную,
                                // воспользуйтесь инструментом Определение координат.
                                center: [<?php echo $application->lat?>, <?php echo $application->long?>],
                                // Уровень масштабирования. Допустимые значения:
                                // от 0 (весь мир) до 19.
                                zoom: 14,
                                controls: []
                            });
                            var myGeoObject = new ymaps.GeoObject({
                                geometry: {
                                    type: "Point", // тип геометрии - точка
                                    coordinates: [<?php echo $application->lat?>, <?php echo $application->long?>] // координаты точки
                                }
                            });

// Размещение геообъекта на карте.
                            myMap.geoObjects.add(myGeoObject);
                        }
                    </script>

                </div>
                <div class="col-lg-9">
                    <div class="card question">
                        @if($application->lat != null)
                            <div id="map" class="w-100" style="height: 200px">
                                <div class="map-overlay"></div>
                            </div>
                        @endif
                        <div class="" style="position: relative">

                            <div class="category">{{$application->category->name}}</div>
                            <a class="a-btn float-right mr-3 p-1" href="#">
                                <ion-icon name="done-all"></ion-icon>
                            </a>
                            {{-- <a class="a-btn float-right mr-3 p-1" href="#">
                                 <ion-icon name="notifications-outline"></ion-icon>
                             </a>--}}
                            <a class="a-btn float-right mr-3 p-1" href="#">
                                <ion-icon name="create"></ion-icon>
                            </a>

                            <div class="author-and-date mt-5 d-flex align-items-center">

                                <div style="width: 25px; height: 25px;" class="user-icon mr-2">
                                    <img src="{{$application->creator->photo_url}}"
                                         alt="">
                                </div>
                                <span class="author">{{$application->creator->last_name}} {{$application->creator->first_name}} {{$application->creator->third_name}}</span>
                                <span class="date">{{$application->created_at}}</span>
                            </div>
                            <hr>
                            <h3 class="text card-body">{{ucfirst(str_replace(" ", " ", $application->text))}}</h3>
                            <div class="text-center">
                                @if($application->record_url)
                                    <audio style="display: inline; margin-bottom: 10px" src="{{$application->record_url}}" controls></audio>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="">
                                <h4 class="tt mb-4">Ваш ответ</h4>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="5">
                                </textarea>
                                <div class="w-100 text-right mt-3">
                                    <button class="button-answer button-answer-br float-right">
                                        <ion-icon name="flame"></ion-icon>
                                        Ответить
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="vertical-pipeline">
                                <div class="line-item">
                                    Поступление заявки
                                    <span class="date">{{$application->created_at}}</span>
                                </div>
                                <div class="line-item">Обработка заявки</div>
                                @foreach($application->states as $state)
                                    @if($state->executor != null)
                                        <div class="line-item">
                                            Назначен исполнитель
                                            <span class="date">{{$state->executor->last_name }} {{$state->executor->first_name }} {{$state->executor->third_name }}</span>
                                            <span class="date">{{$state->created_at }}</span>
                                        </div>
                                    @endif
                                    @if($state->provider != null)
                                        <div class="line-item">
                                            Назначено ведомство
                                            <span class="date">{{$state->provider->name}}</span>
                                            <span class="date">{{$state->created_at }}</span>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
