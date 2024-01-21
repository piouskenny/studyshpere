@extends('Layout.dashboard.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone={{$tutor->phonenumber}}&text=Merhaba" class="float" target="_blank">
    <i class="fa fa-whatsapp wp-button"></i><p class="text-success h4 text-center my-2">Contact Tutor</p>
</a>
<div class="main-panel">
    <div class="content-wrapper bg-light">

        <div class="row mb-5 p-5">
            <div class="col-md-8 shadow-sm">
                @forelse($courseContent as $content)
                <div>
                    <div class="shadow-sm my-2">
                        @if($content->content_type === 'video')
                        <div class="shadow-sm">
                            <iframe width="560" height="315" src="{{ $content->content_url }}" frameborder="0"></iframe>
                        </div>
                        @elseif($content->content_type === 'document')
                        <div>
                            <a href="{{ $content->content_url }}" target="_blank">View Document</a>
                        </div>
                        @endif
                    </div>
                </div>

                @empty
                <div class="text-light text-center bg-danger">
                    NO CONTENT ADDED FOR THIS COURSE YET
                </div>
                @endforelse
            </div>
            <div class="col-md-4 shadow-sm">
                <div class="d-flex justify-content-center">
                    <h2>Assement</h2>
                    <button class="btn btn-primary mx-3 btn-sm"> Add Assement</button>
                </div>

                <div class="shadow-sm p-3 mt-3">
                    <div>
                        <ul>
                            {{-- For each created assement --}}
                            <li class="d-flex justify-content-between align-items-center my-2">
                                <h1 class="h4">Assement 1</h1> <button class="btn btn-primary"> Take</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
