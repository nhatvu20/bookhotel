@extends('rooms.master')

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
                    <a href="{{route('rooms.create')}}" class="btn btn-success btn-sn float-end">Thêm phòng mới</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>RoomID</th>
                    <th>Roomnumber</th>
                    <th>Roomtype</th>
                    <th>Availability</th>
                    <th>Thao tác</th>
                </tr>
                @if(count($rooms) > 0)
                    @foreach($rooms as $row)
                        <tr>
                            <td>{{$row->roomid}}</td>
                            <td>{{$row->roomnumber}}</td>
                            <td>{{$row->roomtype}}</td>
                            <td>{{$row->availability}}</td>
                            <td>
                                <form method="post" action="{{route('rooms.destroy', $row->roomid)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('rooms.show', $row->roomid)}}" class="btn btn-primary">Xem chi tiết</a>
                                    <a href="{{route('rooms.edit', $row->roomid)}}" class="btn btn-warning">Sửa</a>
                                    {{-- <input type="submit" class="btn btn-danger btn-sm" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa phòng này không?');"> --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->roomid ?>">Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row->roomid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete confirm</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to delete book id = <?php echo $row->roomid ?>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('rooms.destroy',$row->roomid) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-success">Yes</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    {!! $rooms->links() !!}
@endsection
<script>
    function confirm
</script>
