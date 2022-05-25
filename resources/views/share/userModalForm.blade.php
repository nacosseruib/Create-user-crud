<div class="modal fade" id="{{isset($modalName) ? $modalName : ''}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <form action="{{ Route('user.store') }}" method="post">
              @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="show-title">Add User</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="row">
                  <div class="col-md-12 p-2">
                      <input type="text" class="form-control form-control-sm" value="{{ isset($user) ? $user->employee_id : old('employeeId') }}" required name="employeeId" id="employeeId" placeholder="Employee ID *">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 p-2">
                      <input type="text" class="form-control form-control-sm" value="{{ isset($user) ? $user->firstname : old('firstName') }}" required name="firstName" id="firstName" placeholder="First Name *">
                  </div>
                  <div class="col-md-6 p-2">
                      <input type="text" class="form-control form-control-sm" value="{{ isset($user) ? $user->lastname : old('lastname') }}" required name="lastName" id="lastName" placeholder="Last Name *">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4 p-2">
                      <input type="email" class="form-control form-control-sm" value="{{ isset($user) ? $user->email : old('email') }}" required name="email" id="email" placeholder="Email ID *">
                  </div>
                  <div class="col-md-4 p-2">
                      <input type="text" class="form-control form-control-sm" value="{{ isset($user) ? $user->mobile : old('mobile') }}" name="mobile" id="mobile" placeholder="Mobile No">
                  </div>
                  <div class="col-md-4 p-2">
                      <select class="form-select form-select-sm" name="roleType" id="roleType">
                          <option value="" selected>Select Role Type *</option>
                          @if(isset($roleType) && $roleType)
                              @foreach ($roleType as $user_role)
                                  <option value="{{$user_role->id}}" {{$user_role->id == (isset($user) ? $user->role_type : old('roleType')) ? 'selected' : '' }}>{{$user_role->role_name}}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-4 p-2">
                      <input type="text" class="form-control form-control-sm" value="{{ isset($user) ? $user->username : old('username') }}" required name="username" id="username" placeholder="Username *">
                  </div>
                  <div class="col-md-4 p-2">
                      <input type="password" class="form-control form-control-sm" name="password" placeholder="Password *">
                  </div>
                  <div class="col-md-4 p-2">
                      <input type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password *">
                  </div>
              </div>

              <table class="table" tabindex="1">
                <thead style="background:#F5FCFF;">
                    <tr>
                        <th>Module Permission</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($roleType) && $roleType)
                        @foreach ($roleType as $role)
                            <tr>
                                <td>{{$role->role_name}}</td>
                                <td>
                                    @if($role->read)
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    @endif
                                </td>
                                <td>
                                    @if($role->write)
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    @endif
                                </td>
                                <td>
                                    @if($role->delete)
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
          </table>

        </div>
        <div align="right" class="modal-footer- p-2 pt-3">

            <input type="hidden" name="recordID" id="recordID" />

            <button type="submit" class="btn btn-info btn-sm rounded-pill"><span id="button-title">Add User</span> </button>

            <button type="button" class="btn btn-default rounded-pill" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
