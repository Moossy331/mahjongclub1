@extends('layouts.main')

@section('content')
<!-- loader Start -->
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        @include('layouts.left_frame_counter')
        @include('layouts.top_frame_counter')
        <!-- 內容開始 -->
        <div class="content-page">

            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="home_counter">主頁</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">遊戲報表</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="home_counter"
                                class="btn btn-primary btn-sm d-flex align-items-center justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewbox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2">返回主頁</span>
                            </a>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <div class="form-group mb-0">
                                                <input type="date" class="form-control" id="exampleInputdate">
                                            </div>
                                            <button type="button" class="mt-2 btn btn-primary btn-with-icon" name="submit">確認日期</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="text-light">
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">桌號</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">東</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">南</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">西</label>
                                                        </th>
                                                        <th scope="col">
                                                            <label class="text-muted mb-0">北</label>
                                                        </th>
                                                        <th scope="col">
                                                            <span class="text-muted">操作</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="white-space-no-wrap">
                                                        <td class="text-left font-weight-bold">
                                                            第一桌
                                                        </td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>100</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end align-items-center">
                                                                <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="game_report_view_counter">
                                                                &nbsp&nbsp&nbsp查看&nbsp&nbsp                                                 
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- 內容結束 -->
        </div>
    </div>
    <!-- Wrapper End-->
    @include('layouts.footer')
    
    <!-- Backend Bundle JavaScript -->
    <script src="static/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="static/js/customizer.js"></script>

    <script src="static/js/sidebar.js"></script>

    <!-- Flextree Javascript-->
    <script src="static/js/flex-tree.min.js"></script>
    <script src="static/js/tree.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="static/js/table-treeview.js"></script>

    <!-- SweetAlert JavaScript -->
    <script src="static/js/sweetalert.js"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="static/js/vector-map-custom.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="static/js/chart-custom.js"></script>
    <script src="static/js/01.js"></script>
    <script src="static/js/02.js"></script>

    <!-- slider JavaScript -->
    <script src="static/js/slider.js"></script>

    <!-- Emoji picker -->
    <script src="static/js/index.js" type="module"></script>


    <!-- app JavaScript -->
    <script src="static/js/app.js"></script>
@endsection