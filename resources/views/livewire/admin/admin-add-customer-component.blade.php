<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Add Customers
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Add Customers
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.customers') }}" class="btn btn-success float-end">All
                                            Customers</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                                <form wire:submit.prevent="storeUser">
                                    <div class="mt-3 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter user name" wire:model="name" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter email" wire:model="email" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" wire:model="password" />
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    
                                    {{-- <div class="mt-3 mb-3">
                                        <label for="image" class="form-label">Image</label>
                                         <input type="file" class="form-control" wire:model="newimage"/>
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                                    @else
                                        <img src="{{ asset('assets/imgs/customers')}}/{{ $image }}" width="120"/>
                                    @endif
                                    </div> --}}
                                    
                                    <div class="mt-3 mb-3">
                                        <label for="utype" class="form-label">User Type</label>
                                    <select class="form-control" name="utype" wire:model="utype">
                                        <option value="USR">USR</option>
                                        <option value="ADM">ADM</option>
                                    </select>
                                    @error('utype')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
</div>
