@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="text-center">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Selamat Datang</h1>
                        <h3>Sistem Pakar Penyakit Kulit</h3>
                        <h6>Di Puskesmas Tanggulangin</h6>
                    </div>
                </div>
                <!-- Main -->
                <div class="container">
                    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6">
                            <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1677227750/attached_image/macam-macam-penyakit-kulit-dan-cara-mengatasinya.jpg"
                                class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                                loading="lazy">
                        </div>
                        <div class="col-lg-6">
                            <h4 class="text-body-emphasis lh-1 mb-3">Penyakit Kulit</h4>
                            <p class="lead">Penyakit kulit ada beragam dengan penyebab yang bervariasi pula. Ada penyakit
                                kulit yang disebabkan oleh reaksi alergi, ada pula yang terjadi karena infeksi jamur hingga
                                bakteri. Begitu pun dengan gejalanya, dari penyakit kulit yang ringan hingga berat. Oleh
                                karena itu, penting bagi Anda mengetahui beragam penyakit kulit beserta cara mengatasinya,
                                agar Anda lebih waspada terhadap kondisi ini.</p>
                            <p>Kulit merupakan organ terbesar pada tubuh. Fungsinya untuk melindungi tubuh dari bakteri,
                                virus, dan sinar matahari, membantu mengatur suhu tubuh, merasakan sensasi sentuhan dan
                                nyeri, serta menghasilkan vitamin D.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <a type="button" href="{{ route('show.diagnosa') }}"
                                    class="btn btn-outline-secondary btn-lg px-4">Lakukan Diagnosa</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. Main-->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
