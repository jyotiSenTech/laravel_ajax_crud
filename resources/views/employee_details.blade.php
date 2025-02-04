@extends('main')

<!-- ## Title Section ===========-->
@section('title')
<title>Employee Details</title>
@endsection


<!--## Links And Script Section====== -->
@section('links')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection


<!--  ## Style Section =========== -->
@section('style')
<style>
    .table__head {
        color: #FFF;
        font-weight: 700;
        background: #9b4085;
        background: -moz-linear-gradient(-45deg, #9b4085 0%, #608590 100%);
        background: -webkit-linear-gradient(-45deg, #9b4085 0%, #608590 100%);
        background: linear-gradient(135deg, #9b4085 0%, #608590 100%);
        white-space: nowrap;
    }

    .table-bordered td,
    .table-bordered th {
        border: 0px solid #FFF;
    }

    .coin {
        width: 8%;
        margin-left: 5px;
        -webkit-animation: spin 4s linear infinite;
        -moz-animation: spin 4s linear infinite;
        animation: spin 4s linear infinite;
    }

    @-moz-keyframes spin {
        100% {
            -moz-transform: rotate(360deg);
        }
    }

    @-webkit-keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .winner__table {
        white-space: nowrap;
    }

    @media screen and (max-width: 567px) {

        .winner__table {
            font-size: 12px;
        }

        .coin {
            width: 15%;
            margin-left: 2px;
        }
    }
</style>


@endsection




<!-- ##  MAin Section =========== -->
@section('main-section')

<div class="container">
    <h4 class="text-center m-2">Employee List <a href="{{route('employee_register')}}"
            class="btn btn-sm btn-info ms-3"><i class="fa fa-user" aria-hidden="true"></i> Add Employee</a></h4>
    <div class="table-responsive mt-0">
        <table class="table table-bordered table-striped" style="margin-top:30px">
            <thead class="table__head">
                <tr class="winner__table">
                    <th>S/N</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Gender</th>
                    <th>Username</th>
                    <th>Registration Date</th>
                    <th>Edit </th>
                    <th>Delete </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr class="winner__table">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$employee->emp_full_name}}</td>
                    <td>{{$employee->emp_email}}</td>
                    <td>{{$employee->emp_phone}}</td>
                    <td>{{$employee->emp_gender}}</td>
                    <td>{{$employee->emp_username}}</td>
                    <td>{{$employee->created_at->format('d-m-Y')}}</td>

                    <td> <a href="{{route('employee_crud',['action'=>'employee_edit','id'=>$employee->id])}}"
                            class="btn btn-sm btn-info ms-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    </td>
                    <td> <a href="{{route('employee_crud',['action'=>'employee_delete','id'=>$employee->id])}}"
                            class="btn btn-sm btn-info ms-3"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                    </td>

                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>


@endsection