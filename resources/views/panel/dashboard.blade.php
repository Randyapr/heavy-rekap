@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Selamat Datang, {{ auth()->user()->name }}</h5>
                        <p>Anda login sebagai {{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection