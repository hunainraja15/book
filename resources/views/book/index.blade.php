@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between"> 
                    <h5 class="">All Books</h5>
                    <a href="{{route('book.upload')}}" class="btn btn-primary">Upload</a>
                </div>
            </div>
            
            <div class="card-body">
                
                
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th><i class='bx bx-hash'></i></th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Publisher</th>
                      <th>Language</th>
                      <th>Pages</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($books as $k => $book)
                      <tr>
                        <td>{{ ++$k}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->publisher}}</td>
                        <td>{{$book->language}}</td>
                        <td>{{$book->pages}}</td>
                        <td>
                          <div class="dropdown">
                            <button
                              type="button"
                              class="btn p-0 dropdown-toggle hide-arrow"
                              data-bs-toggle="dropdown"
                            >
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
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
@endsection