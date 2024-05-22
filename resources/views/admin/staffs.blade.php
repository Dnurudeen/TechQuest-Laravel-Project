@extends('/admin.layouts.master')
@section('title', 'Staffs Profile')


@section('content')
<div id="content">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ Auth::user()->name }}</h1>
    <p class="mb-4"><i>Your Profile Information</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary d-inline float-left">{{ Auth::user()->name }}</h6>
            <a href="{{ url('/admin/add-staff') }}"><button class="btn btn-danger float-right"><i class="fa fa-plus"></i> Add Staff</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session()->has('success'))
                <p class="bg-success text-light p-3 w-100">
                    {{ session()->get('success') }}
                </p>
            @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->office}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->startdate}}</td>
                            <td>{{$user->salary}}</td>
                            <td>
                                <a href="{{ url('/admin/view-staff/'.$user->id) }}" class="fa fa-eye text-danger mr-2"></a>
                                {{-- <a href="{{ route('block.staff/', $user->id) }}" class="fa fa-eye text-lock mr-2"></a> --}}
                                <a href="{{ route('delete.staff', $user->id) }}" class="fa fa-trash text-danger ml-2"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
@endsection
