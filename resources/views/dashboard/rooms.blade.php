@extends('layouts.main')

@section('content')
<div>
    <div class="col-md-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>จัดการห้องในอาคาร: {{ $building->building_name }}</h2>
            <div class="d-flex align-items-center">
                <button class="btn btn-primary" onclick="openAddRoomModal()">เพิ่มห้อง</button>
                <button class="icon-btn">
                    <i class="fas fa-cog"></i>
                </button>
                <button class="icon-btn">
                    <i class="fas fa-bell"></i>
                </button>
                <img alt="Profile image" class="profile-img" src="https://placehold.co/40x40"/>
            </div>
        </div>

        <div class="row mb-4">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>{{ $room->room_name }}</h5>
                            <p>ความจุ: {{ $room->capacity }}</p>
                            <p>สถานะ: {{ $room->status->status_name }}</p>
                            <button class="btn btn-warning" onclick="openEditRoomModal('{{ $room->id }}')">แก้ไข</button>
                            <button class="btn btn-danger" onclick="confirmDeleteRoom('{{ $room->id }}')">ลบ</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add Room Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomModalLabel">เพิ่มห้อง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<form id="addRoomForm" action="{{ route('manage_rooms.store', $building->id) }}" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="room_name">ชื่อห้อง</label>
                        <input type="text" class="form-control" id="room_name" name="room_name" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity">ความจุ</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" required>
                    </div>
                    <div class="form-group">
                        <label for="status_id">สถานะ</label>
                        <select class="form-control" id="status_id" name="status_id" required>
                            @foreach($status as $stat)
                                <option value="{{ $stat->status_id }}">{{ $stat->status_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">ประเภทห้อง</label>
                        <input type="text" class="form-control" id="class" name="class" required>
                    </div>
                    <div class="form-group">
                        <label for="room_details">รายละเอียดห้อง</label>
                        <textarea class="form-control" id="room_details" name="room_details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="service_rates">อัตราค่าบริการ</label>
                        <input type="number" class="form-control" id="service_rates" name="service_rates" required>
                    </div>
                    <div class="form-group">
                        <label for="image">ภาพห้อง</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('addRoomForm').submit();">เพิ่มห้อง</button>
            </div>
        </div>
    </div>
</div>

<script>
function openAddRoomModal() {
    $('#addRoomModal').modal('show');
}

function openEditRoomModal(roomId) {
    // Set form action and fill in existing data
    // Implementation needed
}

function confirmDeleteRoom(roomId) {
    // Set form action for deletion
    // Implementation needed
}
</script>

@endsection
