@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <!-- Your existing content header code goes here -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h2 class="pb-3 text-center">Hasil Diagnosis</h2>

                        @if ($results !== null && count($results) > 0)
                            <ul>
                                @foreach ($results as $result)
                                    <li>{{ $result['penyakit']->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No results found.</p>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
