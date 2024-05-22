@extends('/admin.layouts.master')
@section('title', 'Sign-In Staffs')


@section('content')
<div id="content">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ Auth::user()->name }}</h1>
    <p class="mb-4"><i>Signed-In Staffs</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary d-inline float-left">{{ Auth::user()->name }}</h6>
            <a href="{{ url('/admin/add-staff') }}"><button class="btn btn-danger float-right"><i class="fa fa-plus"></i>Signed-In Staffs</button></a>
        </div> --}}
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
                            <th>Time Signed In</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Time Signed In</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        @foreach($sign_ins as $sign_in)
                            <tr>
                                <td>{{$sign_in->name}}</td>
                                <td>{{$sign_in->created_at}}</td>
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
