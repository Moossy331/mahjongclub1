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
                <div class="row">            
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                                <h4 class="font-weight-bold">場次詳情</h4>
                                <a href="game_report_member" class="btn btn-primary btn-sm d-flex align-items-center justify-content-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-2">回上一頁</span>
                                </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table data-table mb-0">
                                    <thead class="table-color-heading">
                                        <tr class="text-light">
                                            <th scope="col">
                                                <label class="text-muted mb-0">局數</label>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="white-space-no-wrap">
                                            <td class="text-left font-weight-bold">
                                                第一局
                                            </td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                            <td>100</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- 內容結束 -->
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