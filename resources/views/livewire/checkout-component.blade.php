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
                          <h5 class="mt-0">BANK BRI</h5>  No. Rekening 012345-678-910 atas nama <strong> Mohammad Ananta</strong>
                        </div>
                      </div>
                      <form wire:submit.prevent="checkout">
                        <div class="from-group mt-50">
                            <label for="" class="form-label">No. HP</label>
                            <input id="nohp "type="text" class="form-control" placeholder="Enter no" wire:model="nohp" wire:keyup="nohp" autocomplete="name" autofocus/>
                                @error('nohp') 
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="from-group">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Enter alamat" wire:model="alamat" autocomplete="name" autofocus/>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-success float-end"> <i class="fas fa-arrow-right"></i>Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
