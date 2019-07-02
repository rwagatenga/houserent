@extends('back.master')

@section('contents')

                  <table class="table table-responsive">
                  @foreach($all as $key => $view)
                  <p>
                  <tr>
                    <td>
                  <b>Names: </b></td>
                  <td>{{$view->full_names}}</td>
                </tr></p>
                <p>
                  <tr>
                  <td><p><b>Telephone: </b></td>
                  <td>{{$view->phone}}</td></tr></p>
                  <p>
                    <tr>
                      <td><b>E-mail: </b></td>
                      <td>{{$view->email}}</td></tr></p>
                  <p>
                    <tr>
                      <td><b>Message: </b></td>
                      <td>{{$view->message}}</td></tr></p>
                  @endforeach
                </table>
@endsection