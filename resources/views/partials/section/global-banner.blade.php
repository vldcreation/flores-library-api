<!-- [ Administrator section ] start -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-block">
                <h6 class="mb-4">Pengurus</h6>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center  m-b-0">2</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Administrator section ] end -->

    <!-- [ Book section ] start -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-block">
                <h6 class="mb-4">Buku</h6>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center  m-b-0">
                            {{ $books->sum('jumlah_buku') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Book section ] end -->

    <!-- [ Book Category header section ] start -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-block">
                <h6 class="mb-4">Kategori Buku</h6>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center  m-b-0">{{ $categorys->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Book Category header section ] end -->

    <!-- [ Members headers section ] start -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-block">
                <h6 class="mb-4">Anggota</h6>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center  m-b-0">{{ $members->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Members headers section ] end -->

    <!-- [ Loan Book section ] start -->
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-block">
                <h6 class="mb-4">Buku Dipinjam</h6>
                <div class="row d-flex align-items-center">
                    <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center  m-b-0">
                            {{ $peminjamans->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Loan Book section ] end -->