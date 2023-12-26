@extends('layouts.admin')

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
                            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Home</a></li>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main -->
                <div class="container">
                    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6">
                            <img src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1677227750/attached_image/macam-macam-penyakit-kulit-dan-cara-mengatasinya.jpg"
                                class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                                loading="lazy">
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Penyakit Kulit</h1>
                            <p class="lead">Penyakit kulit ada beragam dengan penyebab yang bervariasi pula. Ada penyakit
                                kulit yang disebabkan oleh reaksi alergi, ada pula yang terjadi karena infeksi jamur hingga
                                bakteri. Begitu pun dengan gejalanya, dari penyakit kulit yang ringan hingga berat. Oleh
                                karena itu, penting bagi Anda mengetahui beragam penyakit kulit beserta cara mengatasinya,
                                agar Anda lebih waspada terhadap kondisi ini.</p>
                            <p>Kulit merupakan organ terbesar pada tubuh. Fungsinya untuk melindungi tubuh dari bakteri,
                                virus, dan sinar matahari, membantu mengatur suhu tubuh, merasakan sensasi sentuhan dan
                                nyeri, serta menghasilkan vitamin D.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Diagnosa</button>
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
