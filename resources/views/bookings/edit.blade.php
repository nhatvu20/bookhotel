@extends('bookings.master')

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
        <form method="POST" action="{{route('bookings.update', $bookings->bookingid)}}" enctype="multipart/form/data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">
                    name
                </label>
                <div class="col-sm-10">
                    <select name="customerid" class="form-control">
                        @foreach($customers as $customer)
                            <option value="{{$customer->customerid}}" {{$customer->customerid == $bookings->customerid ? "selected" : ""}}>{{$customer->name}}</option>
                            {{-- <option value="{{$customer->customerid}}">{{$customer->customerid}}</option> --}}
                        @endforeach
                        {{-- <option value="standard" {{$room->customerid == "standard" ? "selected" : ""}}>standard</option>
                        <option value="deluxe" {{$room->customerid == "deluxe" ? "selected" : ""}}>deluxe</option>
                        <option value="suite" {{$room->customerid == "suite" ? "selected" : ""}}>suite</option> --}}
                        {{-- <option value="standard">standard</option>
                        <option value="deluxe">deluxe</option>
                        <option value="suite">suite</option> --}}
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">
                    roomnumber
                </label>
                <div class="col-sm-10">
                    <select name="roomid" class="form-control">
                        @foreach($rooms as $room)
                            <option value="{{$room->roomid}}" {{$room->roomid == $bookings->roomid ? "selected" : ""}}>{{$room->roomnumber}}</option>
                        @endforeach
                        {{-- <option value="standard" {{$room->roomid == "standard" ? "selected" : ""}}>standard</option>
                        <option value="deluxe" {{$room->roomid == "deluxe" ? "selected" : ""}}>deluxe</option>
                        <option value="suite" {{$room->roomid == "suite" ? "selected" : ""}}>suite</option> --}}
                        {{-- <option value="standard">standard</option>
                        <option value="deluxe">deluxe</option>
                        <option value="suite">suite</option> --}}
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">
                    checkindate
                </label>
                <div class="col-sm-10">
                    <input type="date" name="checkindate" class="form-control" value="{{date('Y-m-d', strtotime($bookings->checkoutdate))}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">
                    checkoutdate
                </label>
                <div class="col-sm-10">
                    <input type="date" name="checkoutdate" class="form-control" value="{{date('Y-m-d', strtotime($bookings->checkoutdate))}}">
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('bookings.index')}}" class="btn btn-secondary">Quay lại</a>
                <input type="submit" class="btn btn-primary" value="Sửa">
            </div>
        </form>
    </div>
</div>
<script>
    // document.getElementsByName('StudentGender')[0].value = {{$room->StudentGender}};
</script>
@endsection
