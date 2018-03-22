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
    <!-- 下拉菜单 -->
    <link rel="stylesheet" type="text/css" href="/css/selectFilter.css" />
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
                                
                                
                                <!-- <button class="btn btn-success" id="show">查看</button> -->
                                <br>
                                <br>
                                <br>
                                
                                <div class="container" >
                                    <div class="btn-group hidden-xs" id="stutar" role="group">
                                        <button id="edit" type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-pencil edit" aria-hidden="true">回复</i>
                                        </button>
                                        <button id="del" type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-remove delete" aria-hidden="true">禁止显示</i>
                                        </button>
                                         <div class="filter-box" style="float: left; margin: 0 50px; ">
                                            <div class="filter-text">
                                                <input class="filter-title" type="text" readonly placeholder="pleace select" />
                                                <i class="icon icon-filter-arrow"></i>
                                            </div>
                                            <select name="gid">
                                                <option value="" 
                                                @if (empty($id))
                                                selected
                                                @endif
                                                )>-- 请选择显示产品 --</option>

                                                @foreach ($good as $v)
                                            
                                                <option value="{{$v->id}} "  
                                                @if (!empty($id)) 
                                                {{ $v->id == $id ? 'selected' : '' }}
                                                @endif 
                                                >{{$v->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <table data-toggle="table" id="goods" style="text-align: center;">
                                        <thead >
                                            <tr>
                                                <th data-checkbox="true"></th>
                                                <th>id</th>
                                                <th data-sortable="true">产品名称</th>
                                                
                                                <th data-sortable="true">用户名</th>
                                                <th data-sortable="true">评论内容</th>
                                                <th data-sortable="true">状态</th>
                                                <th data-sortable="true">处理阶段</th>

                                                
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($goods as $v)
                                                <input type="hidden" value ="{{$v->gid}}">
                                                <tr>
                                                    <td></td>
                                                    <td>{{$v->id}}</td>
                                                    <td>{{$v->gid}}</td>
                                                    <td>{{$v->uid}}</td>
                                                    <td>{{$v->title}}</td>
                                                    <td>{{$v->state}}</td>
                                                    <td>{{$v->reply}}</td>
                                                    <td>
                                                        

                                                        @if ($v->getOriginal('reply') > 0)
                                                        <span class="edit btn btn-warning">再次回复</span>
                                                        @else
                                                        <span class="edit btn btn-warning">回复</span>
                                                        @endif
                                                        |
                                                        @if ($v->getOriginal('state') == 1)
                                                        <span class="del btn btn-danger">取消显示</span>
                                                        @else
                                                        <span class="del btn btn-danger">显示</span>
                                                        @endif
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

    <!-- 下拉菜单样式 -->
    <script type="text/javascript" src="/js/selectFilter.js"></script>  
    <script type="text/javascript">
    //本小插件支持移动端哦
    
    //这里是初始化
    $('.filter-box').selectFilter({
        callBack : function (val){
            // if(val==""){
                
            // }else{
                location.href = "/admin/comment/"+ val;
            // }
            
        }
    });
    </script>
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

                    var txt=  "添加商品规格";
                    var option = {
                        title: "提醒框",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/admin/goodsinfo";
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);

                });
                // 修改商品
                $("#edit").click(function(){
                    var n = fun();
                    if( n == 1 ){
                    
                        var b = $("#goods .selected").eq(0).children().eq(1).text();
                        // alert(b);
                        var txt = "回复"+$("#goods .selected").eq(0).children().eq(2).text()+"的评论";
                        var option = {
                            title: "提醒框",
                            btn: parseInt("0011",2),
                            onOk: function(){
                                location.href="/admin/comment/"+b+"/edit";
                            }
                        }
                        window.wxc.xcConfirm(txt, "custom", option);

                    }else{
                        alert('请选择一条数据进行回复');
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
                            location.href ="/admin/goodsinfo/"+id+"/del";
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
                            var c = confirm('你确认屏蔽这条数据吗？');
                            if(c){
                                location.href ="/admin/comment/"+id+"/del";
                            }

                               // alert(i);
                        }) 
                    })(i)   
                }
               



                // 修改商品
                $("#goods .edit").click(function(){
                    var b = $(this).parent().siblings().eq(1).text();
                    var txt = "回复"+$(this).parent().siblings().eq(2).text()+"的评论";
                    var option = {
                        title: "提醒框",
                        btn: parseInt("0011",2),
                        onOk: function(){
                            location.href="/admin/comment/"+b+"/edit";
                        }
                    }
                    window.wxc.xcConfirm(txt, "custom", option);
                });



            })()
            
            
        </script>
        
</body>

</html>
