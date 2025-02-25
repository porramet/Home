@extends('layouts.main')

@section('content')
<div>
    <div class="col-md-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>การจองห้อง</h2>
            <div class="d-flex align-items-center">
                <input class="search-bar" placeholder="ค้นหาบางอย่าง" type="text"/>
                <button class="icon-btn">
                    <i class="fas fa-cog"></i>
                </button>
                <button class="icon-btn">
                    <i class="fas fa-bell"></i>
                </button>
                <img alt="Profile image" class="profile-img" src="https://placehold.co/40x40"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>รายการจองห้อง</h5>
                        <button class="btn btn-primary" onclick="window.location='{{ route('booking.create') }}'">เพิ่มการจอง</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ห้อง</th>
                                    <th>ผู้จอง</th>
                                    <th>วันที่จอง</th>
                                    <th>เวลา</th>
                                    <th>สถานะ</th>
                                    <th>การกระทำ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->room }}</td>
                                    <td>{{ $booking->user }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->time }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status == 'confirmed' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="window.location='{{ route('booking.edit', $booking->id) }}'">แก้ไข</button>
                                        <form action="{{ route('booking.delete', $booking->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#" tabindex="-1">ก่อนหน้า</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
