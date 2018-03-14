<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>会员列表</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">
        .img{
            padding: 4px 10px 4px 17px;
            height: 20px;
            line-height: 20px;
            position: relative;
            border: 1px solid #999;
            text-decoration: none;
            color: #333;
            background:#fff;
        }
        .pic{
            position: absolute;
            overflow: hidden;
            left:15px;
            top: 0;
            opacity:0;
        }
        .table th, .table td { 
         height:100px;
        width:100px;
        text-align: center;
        vertical-align: middle!important;
        }
        .table{
            table-layout: fixed;
        }
        #qi{
            display: block;
            width:38px;
            height:24px;
            line-height: 24px;
            border-radius: 3px;
            color:#fff;
            background:#1E9FFF;
            margin:0 auto;
        }

        #jin{
            display: block;
            width:38px;
            height:24px;line-height: 24px;
            border-radius: 3px;
            border: 1px solid #e6e6e6;
            background: #FBFBFB;
            color:#c9c9c9;
            margin:0 auto;
        }

    </style>
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
                            <h2>会员列表</h2>
                            <div class="example">
                                <div class="container">
                                    <table data-toggle="table" class="layui-form" id="exampleTableToolbar">
                                        <thead >
                                            <tr  align="center">
                                             
                                                <th data-field="id">编号</th>
                                                <th data-field="image">头像</th>
                                                <th data-field="username">用户名</th>
                                                <th data-field="sex">性别</th>
                                                <th data-field="phone">手机号</th>
                                                <th data-field="created_at">加入时间</th>
                                                <th data-field="updated_at">修改时间</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stu as $v)
                                                <tr>
                                                    <td>{{$v->id}}</td>
                                                    <td>{{$v->image}}</td>
                                                    <td>{{$v->username}}</td>
                                                    <td>{{$v->sex}}</td>
                                                    <td>{{$v->phone}}</td>
                                                    <td>{{$v->created_at}}</td>
                                                    <td>{{$v->updated_at}}</td>
                                                    <td style="text-align: center;">
                                                        @if($v->state == 0)
                                                        <span id="qi" class="layui-btn layui-btn-normal layui-btn-mini">启用</span>
                                                        @else
                                                        <span id="jin" class="layui-btn layui-btn-disabled layui-btn-mini">禁用</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/admin/user/state/{{$v->id}}" class="btn btn-outline btn-default glyphicon glyphicon-pencil"></a>
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
    <!-- 全局js -->
    <script src="/js/jquery.min.js?v=2.1.4"></script>
    <script src="/js/bootstrap.min.js?v=3.3.6"></script>
    <script type="text/javascript" src="/layer/layer.js"></script>

    <!-- Bootstrap table -->
    <script src="/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>

    <!-- Peity -->
    <script src="/js/plugins/peity/jquery.peity.min.js"></script>

    <!-- iCheck -->
    <script src="/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/laydate/laydate.js"></script>

    <!-- 自定义js -->
    <script src="/js/content.js?v=1.0.0"></script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    <!--统计代码，可删除-->
    <script type="text/javascript">
        $(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });
    </script>

    <script type="text/javascript">
            (function() {
                $('#exampleTableToolbar').bootstrapTable({
                  search: true,
                  showRefresh: true,
                  showColumns: true,
                  cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                  pagination: true,                   //是否显示分页（*）
                  iconSize: 'outline',
                  toolbar: '#exampleTableEventsToolbar',
                });
            })();
    </script>
    
</body>

</html>
