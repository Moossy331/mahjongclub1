@extends('layouts.main')

@section('content')
<!-- loader Start -->
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        @include('layouts.left_frame_member')
        @include('layouts.top_frame_member')
        <!-- 內容開始 -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            支付金幣
                        </h4>
                        <form action="qrCodeCheckout">
                            <input type="text" name="checkoutCoin" style="width: 100%;">
                            <button type="submit" class="btn btn-primary mt-2" data-toggle="modal" data-target="#checkoutModal">
                                生成QR-Code
                            </button>
                            <!-- Modal -->
                            <!-- <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="checkoutModalLabel">QR-Code</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>賬號： 0912345678</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>



                <!-- Page end  -->
            </div>
        </div>
        <!-- 內容結束 -->
    </div>
    <!-- Wrapper End-->
    @include('layouts.footer')
    
    <!-- Backend Bundle JavaScript -->
    <script src="/static/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/static/js/customizer.js"></script>

    <script src="/static/js/sidebar.js"></script>

    <!-- Flextree Javascript-->
    <script src="/static/js/flex-tree.min.js"></script>
    <script src="/static/js/tree.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="/static/js/table-treeview.js"></script>

    <!-- SweetAlert JavaScript -->
    <script src="/static/js/sweetalert.js"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="/static/js/vector-map-custom.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="/static/js/chart-custom.js"></script>
    <script src="/static/js/01.js"></script>
    <script src="/static/js/02.js"></script>

    <!-- slider JavaScript -->
    <script src="/static/js/slider.js"></script>

    <!-- Emoji picker -->
    <script src="/static/js/index.js" type="module"></script>


    <!-- app JavaScript -->
    <script src="/static/js/app.js"></script>
@endsection