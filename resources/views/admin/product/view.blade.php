@extends('admin/layout/master')
@section('page-title')
  View Product
@endsection
@section('main-content')
<div class="container">
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <div class="card">
    

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            id
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          title
                        </th>
                        <td>
                            {{ $product->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           designation
                        </th>
                        <td>
                           {{ $product->designation }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            camera
                        </th>
                        <td>
                            {{ $product->camera }}
                        </td>
                    </tr>

                     <tr>
                        <th>
                            battery_mah
                        </th>
                        <td>
                            {{ $product->battery_mah }}
                        </td>
                    </tr>
                   
                   
                    
                    <tr>
                        
                        
                    </tr>
                    <tr>
                        <th>
                            variation
                        </th>
                        <td>
                            {{ $product->variation }}
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ __('Back to list') }}
            </a>
        </div>


    </div>
</div>
</div>
</div>
</div>
@endsection
