@extends('bookings.master')

@section('content')
    @if($message = Session::get('success'))

    <div class="alert alert-success">
        {{ $message }}
    </div>

    @endif

    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Quản lý phòng</b></h1>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('bookings.create')}}" class="btn btn-success btn-sn float-end">Thêm phòng mới</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>BookingID</th>
                    <th>CustomerID</th>
                    <th>RoomID</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Thao tác</th>
                </tr>
                @if(count($bookings) > 0)
                    @foreach($bookings as $row)
                        <tr>
                            <td>{{$row->bookingid}}</td>
                            <td>{{$row->customerid}}</td>
                            <td>{{$row->roomid}}</td>
                            <td>{{$row->checkindate}}</td>
                            <td>{{$row->checkoutdate}}</td>
                            <td>
                                <form method="post" action="{{route('bookings.destroy', $row->bookingid)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('bookings.show', $row->bookingid)}}" class="btn btn-primary">Xem chi tiết</a>
                                    <a href="{{route('bookings.edit', $row->bookingid)}}" class="btn btn-warning">Sửa</a>
                                    <input type="submit" class="btn btn-danger btn" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa đặt phòng {{$row->bookingid}} không?');">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td clospan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    {!! $bookings->links() !!}
@endsection
<script>
    function confirm
</script>
