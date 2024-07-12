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
    <div class="card-header">
        Sửa thông tin phòng
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('rooms.update', $room->roomid)}}" enctype="multipart/form/data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">
                    roomid
                </label>
                <div class="col-sm-10">
                    <input type="text" name="roomid" class="form-control" disabled value="{{$room->roomid}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">
                    roomnumber
                </label>
                <div class="col-sm-10">
                    <input type="text" name="roomnumber" class="form-control" value="{{$room->roomnumber}}">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">
                    roomtype
                </label>
                <div class="col-sm-10">
                    <select name="roomtype" class="form-control">
                        @foreach($roomtypes as $roomtype)
                            <option value="{{$roomtype}}" {{$room->roomtype == $roomtype ? "selected" : ""}}>{{$roomtype}}</option>

                        {{-- <option value="standard" {{$room->roomtype == "standard" ? "selected" : ""}}>standard</option> --}}
                        {{-- <option value="deluxe" {{$room->roomtype == "deluxe" ? "selected" : ""}}>deluxe</option> --}}
                        {{-- <option value="suite" {{$room->roomtype == "suite" ? "selected" : ""}}>suite</option> --}}
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
                        @foreach($availabilities as $availability)
                            <option value="{{$availability}}" {{$room->availability == $availability ? "selected" : ""}}>{{$availability}}</option>
                        {{-- <option value="standard" {{$room->roomtype == "standard" ? "selected" : ""}}>standard</option> --}}
                        {{-- <option value="deluxe" {{$room->roomtype == "deluxe" ? "selected" : ""}}>deluxe</option> --}}
                        {{-- <option value="suite" {{$room->roomtype == "suite" ? "selected" : ""}}>suite</option> --}}
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('rooms.index')}}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Sửa">
            </div>
        </form>
    </div>
</div>
<script>
    // document.getElementsByName('StudentGender')[0].value = {{$room->StudentGender}};
</script>
@endsection
