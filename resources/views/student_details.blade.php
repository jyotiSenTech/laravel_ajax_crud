@extends('main')

<!-- ## Title Section ===========-->
@section('title')
<title>Student Details</title>
@endsection


<!--## Links And Script Section====== -->
@section('links')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <h4 class="text-center m-2">Student List <a href="{{route('student_register')}}"
            class="btn btn-sm btn-info ms-3"><i class="fa fa-user" aria-hidden="true"></i> Add Student</a></h4>
    <div class="table-responsive mt-0">
        <table class="table table-bordered table-striped" style="margin-top:30px">
            <thead class="table__head">
                <tr class="winner__table">
                    <th>S/N</th>
                    <th>Student id</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>DOB</th>
                    <th>Course name</th>
                    <th>Address</th>
                    <th>Registration Date</th>
                    <th>Edit </th>
                    <th>Delete </th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                <!-- Data will be dynamically added here through Ajax -->
            </tbody>
        </table>
    </div>
</div>



<script>
    $(document).ready(function() {
        function fetchStudents() {
            $.ajax({
                url: "{{ route('student_list') }}",
                type: "GET",
                success: function(response) {
                    if (response.status === 'success') {
                        let students = response.data;
                        let tableBody = '';

                        students.forEach((student, index) => {
                            tableBody += `
                                <tr id="studentRow-${student.id}">
                                    <td>${index + 1}</td>
                                    <td>${student.id}</td>
                                    <td>${student.student_name}</td>
                                    <td>${student.student_email}</td>
                                    <td>${student.student_phone}</td>
                                    <td>${student.student_dob}</td>
                                    <td>${student.student_course_name}</td>
                                    <td>${student.student_address}</td>
                                    <td>${new Date(student.created_at).toLocaleDateString('en-GB')}</td>
                                    <td>
                                        <a href="/student_edit/${student.id}" class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger deleteStudent" data-id="${student.id}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                        
                                    </td>
                                </tr>
                            `;
                        });

                        // Append data to the table body
                        $('#studentTableBody').html(tableBody);
                    } else {
                        alert('Failed to fetch student data.');
                    }
                },

                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    if (errors) {
                        let errorMessage = '<ul>';
                        for (let key in errors) {
                            errorMessage += '<li>' + errors[key][0] + '</li>';
                        }
                        errorMessage += '</ul>';
                        alert(errorMessage);
                    } else {
                        alert("An error occurred while fetching students.");
                    }
                },
            });
        }


        // AJAX Delete Request
        $(document).on('click', '.deleteStudent', function(e) {
            e.preventDefault();

            let studentId = $(this).data('id');
            let deleteUrl = `/student_delete/${studentId}`;

            console.log('student_id='.studentId);
            console.log('url='.deleteUrl);


            if (confirm("Are you sure you want to delete this student? ")) {
                $.ajax({
                    url: deleteUrl,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.messeage);
                            // Remove the deleted row from the table
                            $('#studentRow-' + studentId).remove();
                        } else {
                            alert('Failed to delete student.');
                        }
                    },
                    error: function(xhr) {
                        // alert("Error deleting student. Please try again.");
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '<ul>';
                        for (let key in errors) {
                            errorMessage += '<li>' + errors[key][0] + '</li>';
                        }
                        errorMessage += '</ul>';
                        alert(errorMessage);
                        console.log(errorMessage);
                    }

                });
            }
        }); +

        // Call the function to load data on page load
        fetchStudents();
    });
</script>



@endsection