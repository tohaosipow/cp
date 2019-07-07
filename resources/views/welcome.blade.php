@extends('layouts.app')

@section('content')
    <div style="background: url('/public/images/bg.png'); background-repeat: no-repeat; background-position:  center;" class="container">
        <div style="height: 100vh;  " class="row align-items-center justify-content-center">

            <div class="card">
                <div class="card-body">
                    <h1 style="text-align:center; font-family: 'Open Sans', sans-serif; font-size: 25px; color: rgba(49,62,83,0.81)">Введите ваше обращение

                    </h1>
                    <p class="w-100 text-center">и оно будет передано в соотвествующее ведомство</p>


                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    <div class="w-100 text-center mt-3">
                        <input type="submit" class="button-answer d-inline">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
