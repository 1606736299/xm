<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 百度ECHarts</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=4.1.0" rel="stylesheet">
    
</head>

<body class="gray-bg">
    <!-- 表格 -->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row row-lg">
                    <div class="col-sm-12">
                        <!-- Example Events -->
                        <div class="example-wrap">
                            <h4 class="example-title">列表</h4>
                            <div class="example">
                               <!--  <div class="alert alert-success" id="examplebtTableEventsResult" role="alert">
                                    事件结果
                                </div> -->
                                <div class="container" >
                                    <div class="btn-group hidden-xs" id="stutar" role="group">
                                        <button id="add" type="button" class="btn btn-outline btn-default">
                                            <a class="glyphicon glyphicon-plus" aria-hidden="true"  data-toggle="modal" style="color: black">新增菜单</a>
                                        </button>
                                        <button id="edit" type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-pencil edit" aria-hidden="true">修改</i>
                                        </button>
                                        <button id="del" type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-remove delete" aria-hidden="true">删除</i>
                                        </button>
                                    </div>
                                    <table data-toggle="table" id="goods" style="text-align: center;">
                                        <thead >
                                            <tr>
                                                <th data-checkbox="true"></th>
                                                <th>id</th>
                                                <th data-sortable="true">类型</th>
                                                <th data-sortable="true">状态</th>
                                                <th>父级</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($goods as $v)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$v->id}}</td>
                                                    <td>{{$v->name}}</td>
                                                    <td>{{$v->state}}</td>
                                                    <td>{{$v->sid}}</td>
                                                    <td>
                                                        <span class="add btn btn-success" class="">添加子类</span>
                                                        |
                                                        <span class="edit btn btn-warning">修改</span>
                                                        |
                                                        <span class="del btn btn-danger">删除</span>
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody> 
                                    </table>
                                 </div>
                            </div>
                        </div>
                        <!-- End Example Events -->
                    </div>
                </div>
            </div>
        </div> 
    </div>           
    @if (session('status'))
        <div id="alert" style="display:none;">
            {{ session('status') }};
        </div>
    @endif
    <script>
         window.onload=function(){
             // 弹出框
            if($('#alert').length>0){
                // alert($(this).text());
                alert($('#alert').text());
            }
         }
    </script>
    <!-- 全局js -->
    <link rel="stylesheet" type="text/css" href="/css/xcConfirm.css"/>
        <script src="/js/jquery-1.9.1.js" type="text/javascript" charset="utf-8"></script>
        <script src="/js/xcConfirm.js" type="text/javascript" charset="utf-8"></script>
        <style type="text/css">
            .sgBtn{width: 135px; height: 35px; line-height: 35px; margin-left: 10px; margin-top: 10px; text-align: center; background-color: #0095D9; color: #FFFFFF; float: left; border-radius: 5px;}
        </style>
    <script src="/js/jquery.min.js?v=2.1.4"></script>
    <script src="/js/bootstrap.min.js?v=3.3.6"></script>
    <!-- Bootstrap table -->
    <script src="/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <!-- Peity -->
    <script src="/js/demo/bootstrap-table-demo.js"></script>

    <!-- 自定义js -->
    <script src="/js/content.js?v=1.0.0"></script>

    <!-- ECharts demo data -->
    <script src="/js/demo/echarts-demo.js"></script>

    <!--统计代码，可删除-->
    <script type="text/javascript">
            (function() {
                $('#goods').bootstrapTable({
                  search: true,
                  showRefresh: true,
                  showColumns: true,
                  cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                  pagination: true,                   //是否显示分页（*）
                  iconSize: 'outline',
                  toolbar: '#stutar',
                });

                function fun(){
                    var xxlength = $('#goods .selected').length;
                    return xxlength;
                }
                // 添加数据
                $("#add").click(function(){
                    var id = 0;
                    var n = fun();
                    if(n==1){
                        id = $("#goods .selected").eq(0).children().eq(1).text();
                    }

                    var txt=  "添加商品信息";
                    var option = {
                        title: "提醒框",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/admin/goods/add/"+id;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);

                });
                // 修改商品
                $("#edit").click(function(){
                    var n = fun();
                    if(n==1){
                    
                        var b = $("#goods .selected").eq(0).children().eq(1).text();
                        // alert(b);
                        var txt = "修改"+$("#goods .selected").eq(0).children().eq(2).text()+"商品";
                        var option = {
                            title: "提醒框",
                            btn: parseInt("0011",2),
                            onOk: function(){
                                location.href="/admin/goods/"+b+"/edit";
                            }
                        }
                        window.wxc.xcConfirm(txt, "custom", option);

                    }else{
                        alert('请选择一条数据进行修改');
                    }
                });
                // 删除数据
                $("#del").click(function(){
                   var n = fun();
                    if(n == 1){ 
                        
                        var id = "";

                        for(var i=0;i<$("#goods .selected").length;i++){

                            (function(i){

                                    id = $("#goods .selected").eq(i).children().eq(1).text();

                            })(i)
                               
                        }
                        
                        var c = confirm('你确认删除这条数据吗？');
                        if(c){
                            location.href ="/admin/goods/"+id+"/del";
                        }

                    }else{
                        alert('请选择一条数据进行删除');
                    }
                });

                // 删除数据
                var a = $('.del');
                // alert(a.length);
                for(var i=0;i<a.length;i++){
                    (function(i){
                       a.eq(i).click(function(){

                            // var id = this.getAttribute('a');
                            var id = $(this).parent().siblings().eq(1).text();
                            var c = confirm('你确认删除这条数据吗？');
                            if(c){
                                location.href ="/admin/goods/"+id+"/del";
                            }

                               // alert(i);
                        }) 
                    })(i)   
                }
               



                // 添加子分类
                $("#goods .add").click(function(){
                    
                    var b = $(this).parent().siblings().eq(1).text();
                    var txt = "添加"+$(this).parent().siblings().eq(2).text()+"的分类";
                    var option = {
                        title: "提醒框",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/admin/goods/add/"+b;
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                });

                // 修改商品
                $("#goods .edit").click(function(){
                    var b = $(this).parent().siblings().eq(1).text();
                    var txt = "修改"+$(this).parent().siblings().eq(2).text()+"商品";
                    var option = {
                        title: "提醒框",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/admin/goods/"+b+"/edit";
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                });



            })()
            
            
        </script>
        
</body>

</html>
