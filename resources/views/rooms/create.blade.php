@extends('rooms.master')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Thêm phòng mới</div>
        <div class="card-body">
            <form method="POST" action="{{route('rooms.store')}}" enctype="multipart.form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">
                        roomnumber
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="roomnumber" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">
                        roomtype
                    </label>
                    <div class="col-sm-10">
                        <select name="roomtype" class="form-control">
                            {{-- <option value="standard" {{$room->roomtype == "standard" ? "selected" : ""}}>standard</option>
                            <option value="deluxe" {{$room->roomtype == "deluxe" ? "selected" : ""}}>deluxe</option>
                            <option value="suite" {{$room->roomtype == "suite" ? "selected" : ""}}>suite</option> --}}
                            {{-- <option value="standard">standard</option>
                            <option value="deluxe">deluxe</option>
                            <option value="suite">suite</option> --}}
                            @foreach($roomtypes as $roomtype)
                                <option value="{{$roomtype}}">{{$roomtype}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">
                        availability
                    </label>
                    <div class="col-sm-10">
                        <select name="availability" class="form-control">
                            {{-- <option value="available" {{$room->availability == "available" ? "selected" : ""}}>available</option>
                            <option value="occupied" {{$room->availability == "occupied" ? "selected" : ""}}>occupied</option>
                            <option value="under maintenance" {{$room->availability == "under maintenance" ? "selected" : ""}}>under maintenance</option> --}}
                            {{-- <option value="available">available</option>
                            <option value="occupied">occupied</option>
                            <option value="under maintenance">under maintenance</option> --}}
                            @foreach($availabilities as $availability)
                                <option value="{{$availability}}">{{$availability}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('rooms.index')}}" class="btn btn-secondary">Quay lại</a>
                    <input type="submit" class="btn btn-primary" value="Thêm">
                </div>

            </form>
        </div>
    </div>
@endsection
