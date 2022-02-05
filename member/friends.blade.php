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
                        <div class="d-flex flex-wrap align-items-center justify-content-between my-schedule mb-4">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex align-items-center justify-content-between">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb p-0 mb-0">
                                            <li class="breadcrumb-item"><a href="home_member">主頁</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">好友</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div> 
                            <div class="create-workform">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="modal-product-search d-flex">
                                        
                                        <a href="friends_add" class="btn btn-primary position-relative d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            添加好友
                                        </a>
                                    </div>                            
                                </div>
                            </div>                    
                        </div>                
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-block card-stretch">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table data-table mb-0">
                                                <thead class="table-color-heading">
                                                    <tr class="">
                                                        <th scope="col">
                                                            ID
                                                        </th>
                                                        <th scope="col">
                                                            消息
                                                        </th>
                                                        <th scope="col" class="text-right"> 
                                                            操作
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="white-space-no-wrap">
                                                        <td class="">
                                                            3213213132323123
                                                            <!-- <div class="active-project-1 d-flex align-items-center mt-0 ">
                                                                <div class="data-content">
                                                                    <div>
                                                                    <span class="font-weight-bold">Christian Bale</span>                           
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </td>
                                                        <td class="text-center">123</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end align-items-center">
                                                                <a class="" data-placement="top" title="" data-original-title="View" href="">
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