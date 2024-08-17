@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="">All User</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Add User
                    </button>
                </div>
            </div>

            <div class="card-body">


                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><i class='bx bx-hash'></i></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $k => $user)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('register')}}" class="form" method="post">
                  @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Name</label>
                            <input type="text" name="name" id="nameWithTitle" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="col mb-3">
                            <label for="emailWithTitle" class="form-label">Email</label>
                            <input type="email" name="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xx.xxx" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="passwordWithTitle" class="form-label">Password</label>
                            <input type="password" name="password" id="passwordWithTitle" class="form-control" placeholder="xxxxxxxxx" />
                        </div>
                        <div class="col mb-0">
                            <label for="conformWithTitle" class="form-label">Conform Password</label>
                            <input type="password" name="conform_password" id="conformWithTitle" class="form-control" placeholder="xxxxxxxxx" />
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
