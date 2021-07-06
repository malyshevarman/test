@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <form class="filter">
                    <div class="filter row">
                        <div class="column col-md-5">
                            <input required class="form-control" name="valuteid" id="valuteid" type="text"
                                   placeholder="Введите ID валюты">
                        </div>
                        <div class="column col-md-5">

                            <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon">от</span>
                                <input autocomplete="off" required type="text" class="input-sm form-control" name="start"/>
                                <span class="input-group-addon">до</span>
                                <input autocomplete="off" required type="text" class="input-sm form-control" name="end"/>
                            </div>
                        </div>
                        <div class="column col-md-2">
                            <button type="submit" class="btn btn-primary">Отобрать</button>
                        </div>
                    </div>
                </form>


            </div>
            <div class="col-md-12">


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($curency as $curent)
                        <tr>
                            <td> {{$curent->valuteID}}</td>
                            <td>{{$curent->name}}</td>
                            <td>{{$curent->date}}</td>
                            <td>{{$curent->value}}</td>
                        </tr>

                    @endforeach



                    </tbody>
                </table>

                {{ $curency->links('vendor.pagination.bootstrap-4') }}


        </div>
    </div>
    </div>



@endsection


