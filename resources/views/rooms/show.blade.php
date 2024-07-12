@extends('rooms.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Thông tin về phòng</b></div>
                <div class="col col-md-6">
                    <a href="{{route('rooms.index')}}" class="btn btn-primary btn-sm float-end">
                        Xem tất cả danh sách
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>Roomid</b></lable>
            <div class="col-sm-10">
                {{$room->roomid}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>Roomnumber</b></lable>
            <div class="col-sm-10">
                {{$room->roomnumber}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <lable class="col-sm-2 col-label-form"><b>roomtype</b></lable>
            <div class="col-sm-10">
                {{$room->roomtype}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <lable class="col-sm-2 col-label-form"><b>availability</b></lable>
            <div class="col-sm-10">
                {{$room->availability}}
            </div>
            <a href="{{route('rooms.index')}}" class="btn btn-secondary mt-5">Quay lại</a>
        </div>
    </div>
@endsection('content')
