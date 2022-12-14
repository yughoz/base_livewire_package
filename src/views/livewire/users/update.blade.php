<form class="form-horizontal" >
    <div class="form-group">
        <label>Name</label>
        <input id="update_name" type="text" name="name" class="form-control" placeholder="Name" wire:model="name" maxlength="50">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror																
    </div>
    <div class="form-group">
        <label>Email</label>
        <input id="update_email" type="email" name="email" class="form-control" placeholder="Email" wire:model="email" maxlength="25">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror																
    </div>
    <div class="form-group">
        <label>Role</label>
        @include('adminlte::livewire.helpers.select2-dropdown',['selectData' => $selectRole,'model' => 'role'])
    </div>

    <div class="form-group">
        <label>Company</label>
        @include('adminlte::livewire.helpers.select2-dropdown',['selectData' => $selectCompany,'model' => 'company','label' => 'company_name'])
    </div>
    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" wire:model="password">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror																
    </div>
    <div class="form-group">
        <label>Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" wire:model="password_confirmation">
        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror																
    </div>

</form>