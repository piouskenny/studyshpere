@extends("Layout.tutor_dashboard.app")
@section('content')
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5 justify-content-center">
            <div class="col-md-8 shadow-sm">
                <h1 class="text-primary h3">Students</h1>

                <div class="table-responsive">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phonenumber</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                            <tr class="">
                                <td scope="row">{{ $student->full_name }}</td>
                                <td>0{{ $student->phonenumber }}</td>
                                <td><button class="btn btn-primary"> View</button></td>
                            </tr>
                            @empty
                            <div class="p-2 text-white bg-danger">
                                <p>No Student has enrolled for your course yet.</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection
