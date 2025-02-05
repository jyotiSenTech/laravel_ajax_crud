@extends('main')

<!-- ## Title Section ===========-->
@section('title')
<title>Student Register</title>
@endsection



<!--## Links And Script Section====== -->
@section('links')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $, ajaxSetup({
        Headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('main-section')
        }
    });
</script>
@endsection


<!--  ## Style Section =========== -->
@section('style')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #86e3ce, #d0e6a5);
    }

    .container {
        max-width: 700px;
        width: 100%;
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 5px;
    }

    .container .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title::before {
        content: "";
        position: absolute;
        height: 3px;
        width: 30px;
        background: linear-gradient(135deg, #86e3ce, #d0e6a5);
        left: 0;
        bottom: 0;
    }

    .container form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2-20px);
    }

    .user-details .input-box .details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input,
    textarea {
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 5px;
        border: 1px solid #cccccc;
        padding-left: 15px;
        font-size: 16px;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #d0e6a5;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 500;
    }

    form .gender-details .category {
        display: flex;
        width: 80%;
        justify-content: space-between;
        margin: 14px 0;
    }

    .gender-details .category label {
        display: flex;
        align-items: center;
    }

    .gender-details .category .dot {
        height: 18px;
        width: 18px;
        background: #d9d9d9;
        border-radius: 50%;
        margin-right: 10px;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
        border-color: #a8a7a7;
        background: #d0e6a5;
    }

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 45px 0;
    }

    form .button input {
        height: 100%;
        width: 100%;
        outline: none;
        color: #fff;
        border: none;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 5px;
        background: linear-gradient(135deg, #86e3ce, #d0e6a5);
    }

    form .button input:hover {
        background: linear-gradient(-135deg, #86e3ce, #d0e6a5);
    }

    @media (max-width: 584px) {
        .container {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .gender-details .category {
            width: 100%;
        }

        .container form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 0;
        }
    }
</style>

@endsection


<!-- ##  MAin Section =========== -->
@section('main-section')



<div class="container">
    <div class="title">Student Register
        <a href="{{route('student_list')}}"
            class="btn btn-sm btn-success ms-5"><i class="fa fa-user" aria-hidden="true"></i> Student List</a>

        <a href="{{route('employee_register')}}"
            class="btn btn-sm btn-info ms-2"><i class="fa fa-user" aria-hidden="true"></i> Employee Register</a>

    </div>
    <form id="student_form">
        @csrf
        <div class="user-details mt-4">
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" name="student_name" id="student_name" placeholder="Enter your name" required />
            </div>

            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="student_email" id="student_email" placeholder="Enter your email" required />
            </div>
            <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" name="student_phone" id="student_phone" placeholder="Enter your number" required />
            </div>
            <div class="input-box">
                <span class="details">DOB</span>
                <input type="date" name="student_dob" id="student_dob" placeholder="Enter your DOB" required />
            </div>
            <div class="input-box">
                <span class="details">Address</span>
                <textarea name="student_address" id="student_address" placeholder="Enter your address" required></textarea>
            </div>
            <div class="input-box">
                <span class="details">Course Name</span>
                <input type="text" name="student_course_name" id="student_course_name" placeholder="Enter your course" required />
            </div>
            <div class="input-box">
                <span class="details">Profile Image</span>
                <input type="file" name="student_profile" accept=".jpg, .png, .jpeg" id="student_profile" required />
            </div>

        </div>

        <div class="button">
            <input type="button" id="student_form_submit" value="Register" />
        </div>

    </form>
</div>


<script>
    $(document).ready(function() {
        $('#student_form_submit').on('click', function(e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append('student_name', $('#student_name').val());
            formData.append('student_email', $('#student_email').val());
            formData.append('student_phone', $('#student_phone').val());
            formData.append('student_dob', $('#student_dob').val());
            formData.append('student_address', $('#student_address').val());
            formData.append('student_course_name', $('#student_course_name').val());
            formData.append('student_profile', $('#student_profile')[0].files[0]);
            formData.append('_token', $('input[name="_token"]').val());

            // Log the form data to the console
            console.log("Form Data Before Submission:");
            for (let pair of formData.entries()) {
                console.log(pair[0] + ": " + pair[1]);
            }

            // AJAX request
            $.ajax({
                url: "{{ route('student_create') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                // type:'html',Read this in ajax with search

                success: function(response) {
                    alert(response.message);
                    window.location.href = "{{ route('student_list') }}";
                    $('#student_form')[0].reset();
                },
                // error: function() {
                //     alert('An error occurred while fetching the students.');
                // }
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '<ul>';
                    for (let key in errors) {
                        errorMessage += '<li>' + errors[key][0] + '</li>';
                    }
                    errorMessage += '</ul>';
                    alert(errorMessage);
                },
            });
        });
    });
</script>

@endsection