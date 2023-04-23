@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-user.css') }}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- page users view start -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Users</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors dataTable" id="DataTables_Table_4" role="grid" aria-describedby="DataTables_Table_4_info">
                                            <thead>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Email</th>
                                            </thead>
                                            <tbody> 
                                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page users view end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection