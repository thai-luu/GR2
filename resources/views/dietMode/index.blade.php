@extends('layouts.default')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">DANH SÁCH USER</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        
            <div class="box-body">
                <form class="row" id="formFilter">
                    <div class="form-group col-md-2 s_search">
                        <label for="">Quyền</label>
                        <select class="form-control" name="key" id="onPage">
                            <option value="QTV" >Quản trị hệ thống</option>
                            <option value="CTV" >Cộng tác viên</option>
                            <option value="ND" >Khách hàng</option>
                            <option value="100">Tất cả</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="control-label">Từ khóa</label>
                        <input class="form-control " id = "keyword" value="{{request()->get('keyword')}}" placeholder="Tìm kiếm" name="keyword">
                        <p class="notify_keyword"></p>
                    </div>
                    <div class="form-group col-md-1">
                        {{-- <div class=" btn btn-success btn_search_form" style="margin-top: 26px">Tìm kiếm</div> --}}
                        <div type="submit" style="margin-top: 25px;width: 100px"  class="col-md-1 btn btn-success btn-search-form" style="margin-top: 26px">Tìm kiếm</div>
                    </div>
                    <div class="clearfix"></div>
                </form>

                <div id="table" class="table-responsive">
                    @include('user.table')
                </div>
            </div>

            <div class="raw">
                <h1>
                    <a class="btn btn-primary primaryt" style="background-color:#E43F7E; color:#fff; margin-top: -9px;margin-bottom: 5px" href="{{ route('user.create') }}">Thêm mới</a>
                    <a class="btn btn-success" style="margin-top: -10px;margin-bottom: 5px;" id="cmdDisplay">Duyệt</a>
                    <a class="btn btn-info" style="margin-top: -10px;margin-bottom: 5px" id="cmdRemove">Gỡ duyệt</a>
                    <a class="btn btn-danger" style="margin-right: 5px;margin-top: -10px;margin-bottom: 5px" id="cmdDelete">Xóa</a>
                    <a class="btn btn-danger" style="display: none;margin-top: -10px;margin-bottom: 5px;margin-right: 4px;" id="cmdDestroy">Xóa vĩnh viễn</a>
                </h1>
            </div>
   
        <div class="text-center">

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var url = '{{route('user.index')}}';
    </script>

    <script src="/js/search.js"></script>
    {{-- <script src="{{config('config.js_host')}}/js/multiDestroy.js?v={{VERSION}}"></script>
    <script src="{{config('config.js_host')}}/js/toggleIs.js?v={{VERSION}}"></script>
    <script src="{{ config('config.js_host') }}/js/cdn/message.js?v={{VERSION}}"></script>
    <script src="{{ config('config.js_host') }}/js/message/index.js?v={{VERSION}}"></script> --}}
    <script>
        var checkOnPage = $('#onPage').val();

        if(checkOnPage == 2) {
            $('#cmdDisplay').css("display", "none");
        } else {
            $('#cmdDisplay').css("display", "inline-block");
        }

        if(checkOnPage == 1) {
            $('#cmdRemove').css("display", "none");
        } else {
            $('#cmdRemove').css("display", "inline-block");
        }

        $('#onPage').change(function(){
            var onPage = $('#onPage').val();

            if(onPage == 1) {
                $('#cmdRemove').css("display", "none");
            } else {
                $('#cmdRemove').css("display", "inline-block");
            }

            if(onPage == 2) {
                $('#cmdDisplay').css("display", "none");
            } else {
                $('#cmdDisplay').css("display", "inline-block");
            }

            if(onPage == 0) {
                $("#cmdDestroy").css("display", "inline-block");
                $("#cmdDelete").css("display", "none");
                $("#cmdRemove").html('Phục hồi');
            } else {
                $('#cmdDelete').css("display", "inline-block");
                $('#cmdDestroy').css("display", "none");
                $("#cmdRemove").html('Gỡ duyệt');
            }
        });

    </script>

    <script>
        function changeTypeOrStatus(url, active){
            let idList = getArrayId();
            if (idList && idList.length === 0) {
                alert('Bạn hãy lựa chọn bản ghi');
            } else {
                let data = getDataFilter();
                data.idList = idList;
                data.active = active;

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    beforeSend: waitingResponse(),
                    success: function (data) {
                        table.html(data);
                    },
                    error: function () {
                        alert(myConstant.getParameter("ERROR"))
                    }
                });
            }
        }

        // duyệt
        $('#cmdDisplay').click(function() {
            changeTypeOrStatus(activeUrl2, 1);
        });

        // xóa bài
        $('#cmdDelete').click(function() {
            deleteMessage(activeUrl2, 2);
        });

        // phục hồi
        $('#cmdRemove').click(function() {
            checkTextRemove = $('#cmdRemove').text();

            // phục hồi
            if(checkTextRemove == 'Phục hồi') {
                active = 4;
            }

            // gỡ duyệt
            if(checkTextRemove == 'Gỡ duyệt') {
                active = 0;
            }
            deleteMessage(activeUrl2, active);
        });

        // xóa vĩnh viên
        $('#cmdDestroy').click(function() {
            deleteMessage(activeUrl2, 3);
        });

        function getDataFilter(){
            let formData = $("#formFilter").serializeArray();
            let data = {};
            $(formData).each(function(index, obj){
                data[obj.name] = obj.value;
            });
            let pageElement = $('#table .linkPage .pagination li.active');
            if(pageElement.length === 1){
                data.page = pageElement.text().trim();
            }
            return data;
        }

        // xóa bài
        function deleteMessage(url, active){
            let idList = getArrayId();
            if (idList && idList.length === 0) {
                alert('Bạn hãy lựa chọn bản ghi');
                return false;
            } else {
                if(idList.length > 1) {
                    alert('Bạn chỉ được chọn một bản ghi');
                    return false;
                } else {
                    if(active == 2 || active == 3) {
                        var checkConfirm = confirm("Bạn chắc chắn muốn xóa không");
                        if(checkConfirm == false){
                            return false;
                        }
                    }
                    let data = getDataFilter();
                    data.idList = idList;
                    data.active = active;
                    data.type = 2;

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: data,
                        beforeSend: waitingResponse(),
                        success: function (data) {
                            table.html(data);
                        },
                        error: function () {
                            alert(myConstant.getParameter("ERROR"))
                        }
                    });
                }
            }
        }
    </script>
@endpush
