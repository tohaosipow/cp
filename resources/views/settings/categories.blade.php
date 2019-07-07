@extends('layouts.panel', ['title' => "Настройки категорий", "describe" => "Список категорий"])
@section('content')

    <div class="main-part">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                  <div class="table-responsive card">
                      <table class="table out-table">
                          <tr>
                              <th>#</th>
                              <th>Название категории</th>
                              <th>Обозначение</th>
                          </tr>
                          @foreach ($categories as $category)
                             <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->name}}</td>
                                 <td>
                                     <div class="highlighth h-green">{{$category->mnemo}}</div>
                                 </td>
                             </tr>
                          @endforeach

                      </table>
                  </div>
              </div>
            </div>
        </div>

    </div>

@endsection
