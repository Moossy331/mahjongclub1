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
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="friends">好友</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">添加好友</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="friends" class="btn btn-primary btn-sm d-flex align-items-center justify-content-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-2">返回上一頁</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3 d-flex justify-content-between">
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>好友ID：</label>
                                        <input type="text" class="form-control" id="friendID">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">添加</button>
                                </form>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">Copyright &copy; 2021.Company name All rights reserved.<a target="_blank" href="https://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></span>
                </div>
            </div>
        </div>
    </footer>    <!-- Backend Bundle JavaScript -->
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
    <script src="static/js/app.js"></script>  </body>
</html>