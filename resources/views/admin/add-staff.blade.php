@extends('/admin.layouts.master')
@section('title', 'Add Staff')


@section('content')
<div id="content">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ Auth::user()->name }}</h1>
    <p class="mb-4"><i>Add New Staff</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">{{ Auth::user()->name }}</h6>
            <h6 class="float-right d-inline"><b><a href="{{ url('/admin/staffs') }}" class="text-danger">{{ __('<-- Back') }}</a></b></h6>
        </div>
        <div class="card-body">
            <div class="container">
            @if(session()->has('success'))
                <p class="bg-success text-light p-3 w-100">
                    {{ session()->get('success') }}
                </p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger w-100"><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            @endif
                <form action="{{ route('addstaff.store') }}" method="post">
                @csrf
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="fname">{{ __('First Name') }}</label>
                            <input type="text" name="fname" class="form-control" id="fname" value="">
                        </div>
                        <div class="col-12 form-group">
                            <label for="lname">{{ __('Last Name') }}</label>
                            <input type="text" name="lname" class="form-control" id="lname" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="position">{{ __('Position') }}</label>
                            <input type="text" name="position" class="form-control" id="position" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="office">{{ __('Office') }}</label>
                            <input type="text" name="office" class="form-control" id="office" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="age">{{ __('Age') }}</label>
                            <input type="number" name="age" class="form-control" id="age" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="role">{{ __('Role') }}</label>
                            <!-- <input type="text" name="role" class="form-control" id="role" value="user"> -->
                            <select name="role" id="role" class="form-control">
                                <option value="">Select role</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="startdate">{{ __('Start Date') }}</label>
                            <input type="date" name="startdate" class="form-control" id="startdate" value="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="salary">{{ __('Salary') }}</label>
                            <input type="number" name="salary" class="form-control" id="salary" value="">
                        </div>
                        <div class="col-12 form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input type="email" name="email" class="form-control" id="email" value="">
                        </div>
                        <!-- <div class="col-12 form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div> -->
                        <div>
                            <button type="submit" class="btn btn-danger">Add Staff</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
@endsection
