@extends('admin.layouts.master')
@section('title','All Job')
@section('maincontent')
<?php
$data['heading'] = 'All Jobs';
$data['title'] = 'All Jobs';
?>
@include('admin.layouts.topbar',$data)
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <div class="card-header all-user-card-header">
                  <div class="col-lg-4 col-md-12 col-12">
                    <h5 class="box-title"> {{ __('All Jobs') }}</h5>
                </div>
                </div>
                <div class="row px-5">
                    <div class="col-12">
                        <div class="row bg-white py-4 px-3 text-secondary">
                            <div class="col-md-12">
                                @foreach($jobs as $job)
                                    <div class="row bg-light rounded my-2 p-3 border-bottom">
                                        <div  class="">
                                            <span class="badge text-bg-success mb-2">Approved</span>
                                            <h6>{{$job->company_name}}</h6>
                                            <p class="fs-6"><i  class=" fa fa-briefcase"></i>    -   <i class="fs-8 fa-solid fa-location-dot"></i> {{$job->location}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



             
           
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

@endsection
@section('script')


<!-- script for datatable end -->
<script type="text/javascript">
    $(function () {
      
      var table = $('#userstabl').DataTable({
          processing: true,
          serverSide: true,
          searchDelay : 1000,
          stateSave : true,
          ajax: "{{ route('user.index') }}",
          columns: [
              {data: 'checkbox', name: 'checkbox'},
              {data: 'DT_RowIndex', name: 'users.id'},
              {data: 'image', name: 'image' , orderable: false, searchable: false},
              {data: 'name',name: 'users.fname'},
              {data: 'role', name: 'roles.name'},
              {data: 'loginasuser', name: 'loginasuser' , orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>

<script>

    $(document).on("change", ".user", function () {

        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/status',
            data: {
                'status': $(this).is(':checked') ? 1 : 0,
                'id': $(this).data('id')
            },
            success: function(data){
                var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
            });
                warning.get().click(function() {
                    warning.remove();
                });
            }
        });
    });

    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<script type="text/javascript">
    $(function () {
      
      var table = $('#allusertable').DataTable({
          processing: true,
          serverSide: true,
          searchDelay : 1000,
          stateSave : true,
          ajax: "{{ route('allusers.index') }}",
          columns: [
              {data: 'checkbox', name: 'checkbox'},
              {data: 'DT_RowIndex', name: 'users.id'},
              {data: 'image', name: 'image', orderable: false, searchable: false},
              {data: 'name', name: 'users.fname'},
              {data: 'loginasuser', name: 'loginasuser' , orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>
<!-- script for datatable start -->
<script>
    $(document).on("change", ".user", function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/status',
            data: {
                'status': $(this).is(':checked') ? 1 : 0,
                'id': $(this).data('id')
            },
            success: function(data){
                var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'primary', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
            });
                warning.get().click(function() {
                    warning.remove();
                });
            }
        });
    })
</script>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<script type="text/javascript">
    $(function () {
      
      var table = $('#allinstructor').DataTable({
          processing: true,
          serverSide: true,
          responsive:true,
          searchDelay : 1000,
          stateSave : true,
          ajax: '{{ route('allinstructor.index') }}',
          columns: [
              {data: 'DT_RowIndex', name: 'users.id'},
              {data: 'checkbox', name: 'checkbox' , orderable: false ,searchable: false},
              {data: 'image', name: 'image', orderable: false ,searchable: false},
              {data: 'name' ,name: 'users.fname'},
              {data: 'loginasuser', name: 'loginasuser' , orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false ,searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>
<script>
    $(document).on("change", ".user", function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/status',
            data: {
                'status': $(this).is(':checked') ? 1 : 0,
                'id': $(this).data('id')
            },
            success: function(data){
            var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
              });
              warning.get().click(function() {
                warning.remove();
              });
          }
        });
    })
</script>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<script type="text/javascript">
    $(function () {
      
      var table = $('#alladmin').DataTable({
          processing: true,
          serverSide: true,
          responsive:true,
          searchDelay : 1000,
          stateSave : true,
          ajax: '{{ route('alladmin.index') }}',
          columns: [
              {data: 'DT_RowIndex', name: 'users.id'},
              {data: 'image', name: 'image', orderable: false ,searchable: false},
              {data: 'name' ,name: 'users.fname'},
              {data: 'loginasuser', name: 'loginasuser' , orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false ,searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
</script>
<script>
    $(document).on("change", ".user", function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'user/status',
            data: {
                'status': $(this).is(':checked') ? 1 : 0,
                'id': $(this).data('id')
            },
            success: function(data){
            var warning = new PNotify( {
                title: 'success', text:'Status Update Successfully', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
                }
              });
              warning.get().click(function() {
                warning.remove();
              });
          }
        });
    })
</script>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection