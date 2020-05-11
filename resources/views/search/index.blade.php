@extends('layouts.app')

@section('content')
    <div class="row" style="padding: 70px">
        <div class="col-md-12">
            <form class="form-inline" method="GET" action="{{route('search.index')}}">
                <div class="form-group mb-2">
                    <h3><label for="full_text_search">Search Food Data</label></h3>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="full_text_search" class="form-control" id="full_text_search" name="full_text_search">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($food_data))
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: white">
                                <tr>
                                    <th>Name</th>
                                    <th>Food Group</th>
                                    <th>Calories</th>
                                    <th>Fat</th>
                                    <th>Carbs</th>
                                    <th>Net-Carbs</th>
                                    <th>Sugars</th>
                                    <th>Fiber</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($food_data as $single_food_data)
                                    <tr>
                                        <td>{{$single_food_data->name}}</td>
                                        <td>{{$single_food_data->food_group}}</td>
                                        <td>{{$single_food_data->calories}}</td>
                                        <td>{{$single_food_data->fat}}</td>
                                        <td>{{$single_food_data->carbs}}</td>
                                        <td>{{$single_food_data->net_carbs}}</td>
                                        <td>{{$single_food_data->sugars}}</td>
                                        <td>{{$single_food_data->fiber}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <tr>
                            <td colspan="8">There are no data.</td>
                        </tr>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
