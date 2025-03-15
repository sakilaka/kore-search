@extends('admin.layouts.master')
@section('title', 'Company Dashboard - Admin')
@section('maincontent')
<?php
$data['heading'] = 'Company Dashboard';
$data['title'] = 'Company Dashboard';
?>
@include('admin.layouts.topbar',$data)

<div class="contentbar bardashboard-card">
    <div class="row">
        <div class="col-lg-12">
            Company Dashboard.
        </div>

    </div>
</div>

@endsection

