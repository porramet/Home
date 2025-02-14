@extends('layouts.main')

@section('content')
<div>
    <div class="col-md-10 content">
        <h2>เพิ่มอาคาร</h2>
        <form action="{{ route('manage.buildings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="building_name">ชื่ออาคาร</label>
                <input type="text" class="form-control" id="building_name" name="building_name" required>
            </div>
            <div class="form-group">
                <label for="citizen_save">ชื่อผู้บันทึก</label>
                <input type="text" class="form-control" id="citizen_save" name="citizen_save" required>
            </div>
            <button type="submit" class="btn btn-primary">เพิ่มอาคาร</button>
        </form>
    </div>
</div>
@endsection
