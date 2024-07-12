@extends('bookings.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Thông tin về đặt phòng</b></div>
                <div class="col col-md-6">
                    <a href="{{route('bookings.index')}}" class="btn btn-primary btn-sm float-end">
                        Xem tất cả danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>customerid</b></lable>
            <div class="col-sm-10">
                {{$bookings->customerid}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>roomid</b></lable>
            <div class="col-sm-10">
                {{$bookings->roomid}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>checkindate</b></lable>
            <div class="col-sm-10">
                {{$bookings->checkindate}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <lable class="col-sm-2 col-label-form"><b>checkoutdate</b></lable>
            <div class="col-sm-10">
                {{$bookings->checkoutdate}}
            </div>
            <a href="{{route('bookings.index')}}" class="btn btn-secondary mt-5">Quay lại</a>
        </div>
    </div>
@endsection('content')
