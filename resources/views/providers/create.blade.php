@extends('layouts.panel', ['title' => "Добавить поставщика услуг", "describe" => "Создание профиля компании"])
@section('content')

    <div class="main-part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" method="post">
                                {{ csrf_field() }}
                                <label for="#">Название поставщика услуг</label>
                                <input name="name" placeholder="Название поставщика услуг" type="text" class="form-control">
                                <label for="#">Представляемые категории услуг</label>
                                <select multiple class="chosen-select form-control" name="categories[]" id="">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="w-100 text-center mt-2">
                                    <input type="submit" class="btn btn-success" value="Создать поставщика">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
