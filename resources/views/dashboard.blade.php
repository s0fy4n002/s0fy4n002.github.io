@extends('layouts.admin')
@push('script')
    <script>
        
            $.ajax({
                url     : "/admin/getdata",
                method  : "GET",
                
                success : function(data){

                    $("#getcontent").html(data);
                }
            });
            
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          
        <div class="col-md-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row" id="getcontent">

                    </div !--endrow--!>
                </div>
            </div>
        </div>
    </div>
        
@endsection


