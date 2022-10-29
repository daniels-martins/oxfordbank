@extends('admin.layouts.app')
@section('title', 'Add Card')
@section('page_css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/pages/single-page.min.css">
    <!-- END: Page CSS-->
@endsection

@section('custom_css')
{{-- <link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/"> --}}
@endsection


@section('content')
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">New Card</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Cards</a>
                </li>
                <li class="breadcrumb-item active">Add New Card
                </li>
              </ol>
            </div>
          </div>
        </div>
        {{-- <div class="content-header-right col-md-6 col-12">
          <div class="media width-250 float-right">
            <media-left class="media-middle">
              <div id="sp-bar-total-sales"></div>
            </media-left>
            <div class="media-body media-right text-right">
              
            </div>
          </div>
        </div> --}}
      </div>
      <div class="content-body">
        <!-- Form wizard with number tabs section start -->
        <section id="add-card">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">
                    Add New Card
                  </h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="{{ route('cards.store') }}" method="post" id="card_form" novalidate>@csrf
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="holdername">
                              Card Holder Name
                              <span class="danger">
                                *
                              </span>
                            </label>
                            <input class="form-control" id="holdername" name="hname" placeholder="Account Holder Name" type="text" required>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="ac-no">
                                A/c No.
                              </label>
                              <input type="number" class="form-control" id="ac-no" name="ac-no" placeholder="Account No.">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="type">
                                Card (Kind)
                              </label>
                              <select class="c-select form-control" id="type" name="card-type">
                                {{-- <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                                <option value="Gold">Gold</option>
                                <option value="Platinum">Platinum</option> --}}
                                <option value="Debit">Virtual</option>
                                <option value="Credit">Physical</option>
                              </select>
                            </div>
                          </div>
                        <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="status">
                              Card Status<span class="danger">
                                *
                              </span>
                            </label>
                            <select class="c-select form-control" id="status" name="card-status">
                              <option value="Active">
                                Active
                              </option>
                              <option value="Deactived">
                                Deactived
                              </option>
                              {{-- <option value="Delayed">
                                Delayed
                              </option>
                              <option value="Surrendered">
                                Surrendered
                              </option> --}}
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="type">
                              Card Group
                            </label>
                            <select class="c-select form-control" id="type" name="card-type">
                              {{-- <option value="Debit">Debit</option>
                              <option value="Credit">Credit</option>
                              <option value="Gold">Gold</option>
                              <option value="Platinum">Platinum</option> --}}
                              <option value="Debit">Visa</option>
                              <option value="Credit">Master card</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                              <label for="type">
                                Card Type
                              </label>
                              <select class="c-select form-control" id="type" name="card-type">
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                              </select>
                            </div>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <div>
                    <input type="submit" value="Submit" class="btn btn-success mr-1" form="card_form">
                    <input type="reset" value="Cancel" class="btn btn-danger">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- END: Content-->

@endsection

@section('page_js')
 
  <!-- BEGIN: Vendor JS-->
  <script src="/admin_assets/app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="/admin_assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="/admin_assets/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
  <script src="/admin_assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
  <script src="/admin_assets/app-assets/js/core/app.min.js"></script>
  <script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
  <script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
  <script src="/admin_assets/app-assets/js/scripts/pages/cards.min.js"></script>
  <!-- END: Page JS-->
 @endsection