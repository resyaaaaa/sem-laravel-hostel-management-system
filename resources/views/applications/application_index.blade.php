@extends('layouts.student_app')

@section('content')
    @if (!empty($application))
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('email sent'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('email sent') }}
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">My Hostel Application</h4>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Hostel</th>
                                <th>Message</th>
                                <th>Status</th>
                                @if ($application->application_status == 0)
                                    <th>Room No</th>
                                @else
                                    <th class="text-center">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $application->hostel->hostel_name }}</td>

                                <td style="max-width: 250px;">
                                    <span class="d-inline-block text-truncate" style="max-width: 240px;">
                                        {{ $application->application_message }}
                                    </span>
                                </td>

                                <td>
                                    @if ($application->application_status == 1)
                                        <span class="badge badge-warning">Applied</span>
                                    @else
                                        <span class="badge badge-success">Approved</span>
                                    @endif
                                </td>

                                @if ($application->application_status == 0)
                                    <td>{{ $application->room->room_no }}</td>
                                @else
                                    <td class="text-center">
                                        <a href="{{ route('application.edit', ['application' => $application]) }}"
                                            class="btn btn-sm btn-outline-primary mb-1">
                                            Edit
                                        </a>
                                        <form method="POST"
                                            action="{{ route('application.destroy', ['application' => $application]) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <input type="hidden" name="deleteApplication" value="1"> --}}
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Delete this application?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="alert alert-info text-center">
                <h5 class="mb-1">No Application Found</h5>
                <p class="mb-0">You have not applied for any hostel yet.</p>
            </div>
        </div>
    @endif

    <!-- services -->
    <section class="services py-5">
        <div class="container py-lg-5 py-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-4"> Hostels </h2>
            <div class="row service-grids">
                <div class="col-lg-4 col-md-6 service-grid1">
                    <h3>A Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>1 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>A Hostel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-5 service-grid1">
                    <h3>B Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>3 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>B Hostel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5 service-grid1">
                    <h3>C Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>2 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>C Hostel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 service-grid1">
                    <h3>D Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>4 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>D Hostel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 service-grid1">
                    <h3>E Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>4 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>E Hostel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 service-grid1">
                    <h3>F Hostel</h3>
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <h4>4 yr</h4>
                        </div>
                        <div class="col-md-9 col-10">
                            <p>F Hostel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services -->

    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container-fluid">
            <div class="banner_bottom_agile_grids">
                <div class="row wthree_banner_bottom_right_grids pr-sm-3">
                    <div class="col-lg-3 col-sm-6 banner_bottom_right_grid">
                        <div class="view view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3> Apply for A-Hostel</h3>
                                <p>A Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '1']) }}"><img
                                        src="web_home/images/s1.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-3 banner_bottom_right_grid">
                        <div class="view view1 view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3>Apply for B-Hostel</h3>
                                <p>B Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '2']) }}"><img
                                        src="web_home/images/s2.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
                        <div class="view view2 view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3>Apply for C-Hostel</h3>
                                <p>C Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '3']) }}"><img
                                        src="web_home/images/s3.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
                        <div class="view view3 view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3>Apply for D-Hostel</h3>
                                <p>D Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '4']) }}"><img
                                        src="web_home/images/s4.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- banner-bottom -->

    <br>
    <br>

    <div class="banner-bottom">
        <div class="container-fluid">
            <div class="banner_bottom_agile_grids">
                <div class="row wthree_banner_bottom_right_grids pr-sm-3">
                    <!--<div class="col-lg-3 col-sm-6 banner_bottom_right_grid">
                                                                              <div class="view view-tenth">
                                                                               <div class="agile_text_box">
                                                                                <i class="fas fa-bath" aria-hidden="true"></i>
                                                                                <h3> Apply for D-Hostel</h3>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adip. Sed semper sem non commodo egestas. In rutrum enim a neque volutpat aliquet</p>
                                                                               </div>
                                                                               <div class="mask">
                                                                                <img src="web_home/images/s1.jpg" class="img-responsive" alt="" />
                                                                               </div>
                                                                              </div>
                                                                             </div>-->
                    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-3 banner_bottom_right_grid">
                        <div class="view view1 view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3> Apply for E-Hostel</h3>
                                <p>E Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '5']) }}"><img
                                        src="web_home/images/s2.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
                        <div class="view view2 view-tenth">
                            <div class="agile_text_box">
                                <i class="fas fa-bed" aria-hidden="true"></i>
                                <h3>Apply for F-Hostel </h3>
                                <p>F Hostel</p>
                            </div>
                            <div class="mask">
                                <a href="{{ route('application.create', ['hostel' => '6']) }}"><img
                                        src="web_home/images/s3.jpg" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3 banner_bottom_right_grid">
                                                                              <div class="view view3 view-tenth">
                                                                               <div class="agile_text_box">
                                                                                <i class="fas fa-bed" aria-hidden="true"></i>
                                                                                <h3>Office Chairs</h3>
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adip. Sed semper sem non commodo egestas. In rutrum enim a neque volutpat aliquet</p>
                                                                               </div>
                                                                               <div class="mask">
                                                                                <img src="web_home/images/s4.jpg" class="img-responsive" alt="" />
                                                                               </div>
                                                                              </div>
                                                                             </div>-->
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
