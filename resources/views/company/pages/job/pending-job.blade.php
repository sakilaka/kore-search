@extends('admin.layouts.master')
@section('title', 'All Job')
@section('maincontent')
    <style>
        .form-control {
            border: 1px solid rgb(191, 189, 189);
        }

        .select2 {
            border: 1px solid rgb(191, 189, 189);
        }
    </style>
    <?php
    $data['heading'] = 'All Job';
    $data['title'] = 'Job';
    $data['title1'] = 'All Job';
    ?>
    @include('admin.layouts.topbar', $data)
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card dashboard-card m-b-30">
                    <div class="card-header">
                        <div>
                            <div class="widgetbar">
                                <a href="{{ route('company.job.create') }}"
                                    class="float-right btn btn-dark-rgba mr-2">{{ __('Create') }}</a>
                            </div>
                        </div>

                        <div class="box-body">
                            All Job
                        </div>

                    </div>

                    <!-- card body started -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <th>
                                        <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                            value="all" />
                                        <label for="checkboxAll" class="material-checkbox"></label> #
                                    </th>

                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('vacancy') }}</th>
                                    <th>{{ __('salary') }}</th>
                                    <th>{{ __('type') }}</th>
                                    <th>{{ __('experience') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </thead>

                                <tbody>
                                    @foreach ($pendingJob as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->vacancy }}
                                            </td>
                                          
                                            <td>
                                                {{ $item->salary }}
                                            </td>
                                            <td>
                                                {{ $item->type }}
                                            </td>

                                            <td>
                                                {{ $item->experience }}
                                            </td>

                                            <td>
                                                @if ($item->status === '0')
                                                    <form action="{{ route('status.activate', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Pending</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('status.deactivate', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Active</button>
                                                    </form>
                                                @endif
                                            </td>



                                           
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-round btn-outline-primary" type="button"
                                                        id="CustomdropdownMenuButton1" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                                        <a class="dropdown-item"
                                                            href="{{ route('company.job.edit', $item->id) }}"><i
                                                                class="feather icon-edit mr-2"></i>{{ __('Edit') }}</a>
                                                        <a class="dropdown-item btn btn-link" data-toggle="modal"
                                                            data-target="#delete{{ $item->id }}">
                                                            <i class="feather icon-delete mr-2"></i>{{ __('Delete') }}</a>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!-- delete Modal start -->
                                                <div class="modal fade bd-example-modal-sm" id="delete{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleSmallModalLabel">
                                                                    {{ __('Delete') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>{{ __('Are You Sure ?') }}</h4>
                                                                <p>{{ __('Do you really want to delete') }}
                                                                    <b>{{ $item->heading }}</b> ?
                                                                    {{ __('This process cannot be undone.') }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post" action="{{ url('company/job-delete/' . $item->id) }}"
                                                                    class="pull-right">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="reset" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('No') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">{{ __('Yes') }}</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- delete Model ended -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')


@endsection
