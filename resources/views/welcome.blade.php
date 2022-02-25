@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Task') }}</div>

                    <div class="card-body">
                        {{-- feedback --}}
                        @includeIf('share.messageAlert')

                      <form method="POST" action="{{ Route::has('task.store') ? Route('task.store') : '#' }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Task Name <span class="text-danger">*<span></label>
                                    <input type="text" name="taskName" value="{{old('taskName')}}" class="form-control" placeholder="Enter Task Name" />
                                </div>
                                <div class="col-md-5">
                                    <label>Priority <span class="text-danger">*<span></label>
                                <select name="priority" class="form-control">
                                        <option value="" selected>Select</option>
                                        <option value="3" {{old('priority') == 3 ? 'selected' : ''}}>Low</option>
                                        <option value="2" {{old('priority') == 2 ? 'selected' : ''}}>Midium</option>
                                        <option value="1" {{old('priority') == 1 ? 'selected' : ''}}>High</option>
                                </select>
                                </div>
                                <div class="col-md-2" style="padding-top:8px;">
                                    <br >
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <table class="table">
                            <tr>
                                <th>SN</th>
                                <th>Task</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                            @if(isset($getTask) && $getTask)
                                @foreach ($getTask as $key=>$value)
                                    <tr>
                                        <td>{{ ($key + 1)}}</td>
                                        <td>{{ $value->task_name }}</td>
                                        <td>
                                            @if($value->priority == 3)
                                                Low
                                            @elseif($value->priority == 2)
                                                Midium
                                            @elseif($value->priority == 1)
                                                High
                                            @endif

                                        </td>
                                        <td>
                                            <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteTask{{$key}}">Delete</button>
                                            <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#editTask{{$key}}">Edit</button>
                                        </td>
                                    </tr>

                                     <!-- edit Modal -->
                                     <div class="modal fade" id="editTask{{$key}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 10000000000;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel"><span class="fa fa-eye"></span> Edit Task</h5>
                                                </div>
                                                <form method="POST" action="{{ Route::has('task.update') ? Route('task.update', [$value->id]) : '#' }}">
                                                    @csrf
                                                    @method('PUT')
                                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                                <div class="modal-body">
                                                    {{-- body --}}
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-12 mx-auto">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Task Name <span class="text-danger">*<span></label>
                                                                                <input type="text" name="taskName" value="{{ $value->task_name }}" class="form-control" placeholder="Enter Task Name" />
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Priority <span class="text-danger">*<span></label>
                                                                            <select name="priority" class="form-control">
                                                                                    <option value="" selected>Select</option>
                                                                                    <option value="3" {{$value->priority == 3 ? 'selected' : ''}}>Low</option>
                                                                                    <option value="2" {{$value->priority == 2 ? 'selected' : ''}}>Midium</option>
                                                                                    <option value="1" {{$value->priority == 1 ? 'selected' : ''}}>High</option>
                                                                            </select>
                                                                            <input type="hidden" name="recordID" value="{{$value->id}}" class="form-control"/>
                                                                            </div>
                                                                        </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end body --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end edit Modal-->

                                        <!-- delete Modal -->
                                        <form action="{{ Route::has('task.destroy') ? Route('task.destroy', [$value->id]) : '#' }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <div class="modal fade" id="deleteTask{{$key}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 10000000000;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel"><span class="fa fa-eye"></span> Delete Task</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- body --}}
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-12 mx-auto">
                                                                    <div class="card border-0 shadow rounded-3 my-0">
                                                                        <div class="card-body p-2 p-sm-3 m-1" style="overflow: auto; max-height: 300px;">
                                                                            <div class="text-danger text-center">
                                                                                <div class="p-1 text-dark">{{ $value->task_name }}</div>
                                                                               <span> Are you sure you want to delete this task?</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end body --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    <!--end delete Modal-->

                                @endforeach
                            @endif
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
                                {!! (isset($getTask) && $getTask ? $getTask->links() : '') !!}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
