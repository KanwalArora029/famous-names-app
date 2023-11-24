@extends('layouts.masters')
@section('title') Famous Names Page @endsection
@section('content')



@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        @foreach($names as $name)
        <div class="col-md-4 mb-4">
            <div class="card" id="cardDetails">
                <div class="card-body">
                    <h5 class="card-title">{{ $name->name }}</h5>
                    <p class="card-text">
                        Lat: <span class="lat">{{ $name->lat }}</span>,
                        Lng: <span class="lang">{{ $name->lng }}</span>
                    </p>

                    <button class="btn btn-secondary edit" value="{{ $name->id }}">Edit</button>
                    <button class="btn btn-danger delete" value="{{ $name->id }}">Delete</button>
                    <button class="btn btn-primary view" data-lat="{{ $name->lat }}" data-lng="{{ $name->lng }}" value="{{$name->id}}" data-bs-target="#mapModal">View Map</button>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='content'>
                    <!-- get the content  -->
                    <div id="map"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Famous Name</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='content'>
                    <form action="{{ url('update-name') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="name_id" id="name_id">
                        <!-- form group -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Your Longitude">
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Your Latitude">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Delete Famous Name</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='content'>
                    <form action="{{ url('delete-name') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <h3>Are you sure you want to delete this name?</h3>

                        <input type="hidden" name="del_name_id" id="del_name_id">
                        <!-- form group -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Yes Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Get the name->id -->

@endsection