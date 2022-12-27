<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        <div class="row">
                <div class="col">
                    <a href="{{ route('shop.cart') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i>Kembali</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h4>Informasi Pembayaran</h4>
                    <hr>
                    <p>Untuk pembayaran silahkan dapat tranfer di rekening di bawah ini sebesar :<strong> ${{ Cart::instance('cart')->total() }}</strong></p>
                    <div class="media">
                        <img class="mr-3" src="{{ url('assets/imgs/bri.png')}}" alt="Bank BRI" width="120">
                        <div class="media-body">
                          <h5 class="mt-0">BANK BRI</h5>  No. Rekening 012345-678-910 atas nama <strong> Pihak WO</strong>
                        </div>
                      </div>
                      <form wire:submit.prevent="checkout">
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
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
