@extends('layouts.main')

@section('content')
<div>
    <div class="col-md-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
         <h2>
          จัดการผู้ใช้
         </h2>
         <div class="d-flex align-items-center">
          <input class="search-bar" placeholder="ค้นหาผู้ใช้" type="text"/>
          <button class="icon-btn">
           <i class="fas fa-cog">
           </i>
          </button>
          <button class="icon-btn">
           <i class="fas fa-bell">
           </i>
          </button>
          <img alt="Profile image" class="profile-img" src="https://placehold.co/40x40"/>
         </div>
        </div>
        <div class="row mb-4">
         <div class="col-md-4">
          <div class="stat-card">
           <i class="fas fa-users icon">
           </i>
           <div class="details">
            <h3>
             5
            </h3>
            <p>
             จำนวนผู้ใช้
            </p>
           </div>
          </div>
         </div>
         <div class="col-md-4">
          <div class="stat-card">
           <i class="fas fa-user-shield icon">
           </i>
           <div class="details">
            <h3>
             1
            </h3>
            <p>
             จำนวนผู้ดูแลระบบ
            </p>
           </div>
          </div>
         </div>
        </div>
        <div class="row">
         <div class="col-md-12">
          <div class="card mb-4">
           <div class="card-header d-flex justify-content-between align-items-center">
            <h5>
             รายการผู้ใช้
            </h5>
            <button class="btn btn-primary">
             เพิ่มผู้ใช้
            </button>
           </div>
           <div class="card-body">
            <table class="table table-striped">
             <thead>
              <tr>
               <th>
                #
               </th>
               <th>
                ชื่อผู้ใช้
               </th>
               <th>
                อีเมล
               </th>
               <th>
                บทบาท
               </th>
               <th>
                การกระทำ
               </th>
              </tr>
             </thead>
             <tbody>
              <tr>
               <td>
                1
               </td>
               <td>
                สมชาย ใจดี
               </td>
               <td>
                somchai@example.com
               </td>
               <td>
                <select class="form-select">
                 <option value="admin">
                  ผู้ดูแลระบบ
                 </option>
                 <option value="user">
                  ผู้ใช้ทั่วไป
                 </option>
                </select>
               </td>
               <td>
                <button class="btn btn-sm btn-warning">
                 แก้ไข
                </button>
                <button class="btn btn-sm btn-danger">
                 ลบ
                </button>
               </td>
              </tr>
              <tr>
               <td>
                2
               </td>
               <td>
                สมหญิง ใจดี
               </td>
               <td>
                somying@example.com
               </td>
               <td>
                <select class="form-select">
                 <option value="user">
                  ผู้ใช้ทั่วไป
                 </option>
                 <option value="admin">
                  ผู้ดูแลระบบ
                 </option>
                </select>
               </td>
               <td>
                <button class="btn btn-sm btn-warning">
                 แก้ไข
                </button>
                <button class="btn btn-sm btn-danger">
                 ลบ
                </button>
               </td>
              </tr>
              <tr>
               <td>
                3
               </td>
               <td>
                สมปอง ใจดี
               </td>
               <td>
                sompong@example.com
               </td>
               <td>
                <select class="form-select">
                 <option value="user">
                  ผู้ใช้ทั่วไป
                 </option>
                 <option value="admin">
                  ผู้ดูแลระบบ
                 </option>
                </select>
               </td>
               <td>
                <button class="btn btn-sm btn-warning">
                 แก้ไข
                </button>
                <button class="btn btn-sm btn-danger">
                 ลบ
                </button>
               </td>
              </tr>
              <tr>
               <td>
                4
               </td>
               <td>
                สมศรี ใจดี
               </td>
               <td>
                somsri@example.com
               </td>
               <td>
                <select class="form-select">
                 <option value="user">
                  ผู้ใช้ทั่วไป
                 </option>
                 <option value="admin">
                  ผู้ดูแลระบบ
                 </option>
                </select>
               </td>
               <td>
                <button class="btn btn-sm btn-warning">
                 แก้ไข
                </button>
                <button class="btn btn-sm btn-danger">
                 ลบ
                </button>
               </td>
              </tr>
              <tr>
               <td>
                5
               </td>
               <td>
                สมหมาย ใจดี
               </td>
               <td>
                sommai@example.com
               </td>
               <td>
                <select class="form-select">
                 <option value="user">
                  ผู้ใช้ทั่วไป
                 </option>
                 <option value="admin">
                  ผู้ดูแลระบบ
                 </option>
                </select>
               </td>
               <td>
                <button class="btn btn-sm btn-warning">
                 แก้ไข
                </button>
                <button class="btn btn-sm btn-danger">
                 ลบ
                </button>
               </td>
              </tr>
             </tbody>
            </table>
            <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
              <li class="page-item">
               <a class="page-link" href="#" tabindex="-1">
                ก่อนหน้า
               </a>
              </li>
              <li class="page-item">
               <a class="page-link" href="#">
                1
               </a>
              </li>
              <li class="page-item">
               <a class="page-link" href="#">
                2
               </a>
              </li>
              <li class="page-item">
               <a class="page-link" href="#">
                3
               </a>
              </li>
              <li class="page-item">
               <a class="page-link" href="#">
                ถัดไป
               </a>
              </li>
             </ul>
            </nav>
           </div>
</div>
@endsection
<style>
    body {
             font-family: 'Arial', sans-serif;
             background-color: #f8f9fa;
         }
         .sidebar {
             background-color: #fff;
             height: 100vh;
             padding: 20px;
             border-right: 1px solid #e0e0e0;
         }
         .sidebar .nav-link {
             color: #6c757d;
             font-weight: 500;
             margin-bottom: 10px;
         }
         .sidebar .nav-link.active {
             color: #007bff;
             background-color: #e9ecef;
             border-radius: 5px;
         }
         .content {
             padding: 20px;
         }
         .card {
             border-radius: 10px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
         .card-header {
             background-color: #fff;
             border-bottom: none;
         }
         .card-body {
             padding: 20px;
         }
         .card-footer {
             background-color: #fff;
             border-top: none;
         }
         .card-blue {
             background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
             color: #fff;
         }
         .card-blue .card-body {
             padding: 20px;
         }
         .card-blue .card-footer {
             background-color: transparent;
         }
         .chart-container {
             position: relative;
             height: 200px;
         }
         .profile-img {
             width: 40px;
             height: 40px;
             border-radius: 50%;
         }
         .search-bar {
             background-color: #f1f3f4;
             border: none;
             border-radius: 20px;
             padding: 10px 20px;
             width: 100%;
         }
         .search-bar:focus {
             outline: none;
             box-shadow: none;
         }
         .icon-btn {
             background-color: #f1f3f4;
             border: none;
             border-radius: 50%;
             padding: 10px;
             margin-left: 10px;
         }
         .icon-btn i {
             color: #6c757d;
         }
         .transaction-item {
             display: flex;
             align-items: center;
             justify-content: space-between;
             padding: 10px 0;
             border-bottom: 1px solid #e0e0e0;
         }
         .transaction-item:last-child {
             border-bottom: none;
         }
         .transaction-item .icon {
             width: 40px;
             height: 40px;
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
             margin-right: 10px;
         }
         .transaction-item .icon i {
             font-size: 20px;
         }
         .transaction-item .details {
             flex-grow: 1;
         }
         .transaction-item .amount {
             font-weight: 500;
         }
         .transaction-item .amount.negative {
             color: #dc3545;
         }
         .transaction-item .amount.positive {
             color: #28a745;
         }
         .stat-card {
             display: flex;
             align-items: center;
             justify-content: space-between;
             padding: 20px;
             border-radius: 10px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             margin-bottom: 20px;
         }
         .stat-card .icon {
             font-size: 40px;
             color: #6c757d;
         }
         .stat-card .details {
             text-align: right;
         }
         .stat-card .details h3 {
             margin: 0;
             font-size: 24px;
         }
         .stat-card .details p {
             margin: 0;
             color: #6c757d;
         }
   </style>