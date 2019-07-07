@extends('layouts.panel', ['title' => "Рабочий стол \"".Request::route('provider')->name."\"", "describe" => "информация о вашей работе"])
@section('content')

    <div class="main-part">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="450"></canvas>
                            <script>
                                var ctx = document.getElementById("myChart");
                                var myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ["Дороги", "Дом", "Двор"],
                                        datasets: [{
                                            label: 'Количество обращений',
                                            data: [12, 19, 3],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.9)',
                                                'rgba(54, 162, 235, 0.9)',
                                                'rgba(255, 206, 86, 0.9)'
                                            ],
                                        }]
                                    }
                                });
                            </script>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart2" width="400" height="150"></canvas>
                            <script>
                                var ctx = document.getElementById("myChart2");
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ["Позавчера", "Вчера", "Сегодня"],
                                        datasets: [{
                                            label: 'Количество обращений Дома',
                                            data: [12, 19, 3],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.0)'],
                                            borderColor: [
                                                'rgba(255, 99, 132, 0.9)']
                                        },
                                            {
                                                label: 'Количество обращений Дороги',
                                                data: [1, 2, 3],
                                                backgroundColor: [
                                                    'rgba(54, 162, 235, 0.0'],
                                                borderColor: [
                                                    'rgba(54, 162, 235, 0.9)']
                                            },
                                        ]
                                    }
                                });
                            </script>x
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="plate">
                        <div class="plate-counter">
                            <div class="plate-number">{{count($applications)}}</div>
                            <div class="plate-ed">всего заявок</div>
                        </div>
                        <div class="rate">
                            + 4
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="plate">
                        <div class="plate-counter">
                            <div class="plate-number">{{count($applications)}}</div>
                            <div class="plate-ed">в работе заявок</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="plate">
                        <div class="plate-counter">
                            <div class="plate-number">{{count($applications)}}</div>
                            <div class="plate-ed">закрыто заявок</div>
                        </div>
                        <div class="rate">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="plate">
                        <div class="plate-counter">
                            <div class="plate-number">{{count($applications)}}</div>
                            <div class="plate-ed">в ожидании заявок</div>
                        </div>
                        <div class="rate">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
