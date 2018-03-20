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
                            <h4 class="example-title" style="float:left;"><a href="/admin/goodsinfo/create">列表</a>   >   </h4>
                            
                            <h4 style="float:left;margin-left: 5px;"><a>   修改规格</a></h4>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form  action="/admin/goodsinfo/{{$aa->id}}" method="post" enctype="multipart/form-data">
                            <div class ="form-inline">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}


                            <label>选择产品：</label>
                            <div class="filter-box">
                                <div class="filter-text">
                                    <input class="filter-title" type="text" readonly placeholder="pleace select" />
                                    <i class="icon icon-filter-arrow"></i>
                                </div>

                                <select name="gid">

                                    @foreach ($goods as $v)
                                
                                    <option value="{{$v->id}}" {{$v->id == $aa->gid ? 'selected' : 'disabled' }} >{{$v->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <br>
                            <br>
                            <label>产品规格：</label>                      
                            <input class="form-control input-outline" type="text" name="name" value="{{$aa->name}}">

                            <br>
                            <br>
                            <br>
                            
                            <label>上传图片：</label>
                            
                            <div class="input-group" style="width: 566px; margin-top: 10px;">
                            <input id="fileup" type="file" class="file" name="image"/></div> 
                            <br>
                            <img src="{{$aa->path}}s_{{$aa->image}}" alt="">
                            <br>
                            <br>
                            
                            <label>设置库存：</label>
                            <input class="form-control input-outline" type="text" name="number" value="{{$aa->number}}">

                            <br>
                            <br>
                            <br>
                            <label>设置价格：</label>
                            <input class="form-control input-outline" type="text" name="price" value="{{$aa->price}}">
                            <br>
                            <br>
                            <br>
                            <label>产品介绍:</label>
                            <textarea class="form-control input-outline" name="title" id="" cols="30" rows="10" style="vertical-align: top;">{{$aa->title}}</textarea>
                            <br>
                            <br>
                            <br>
                            <input class="btn btn-success" type="submit" value="修改"> | <input class="btn btn-danger" type="reset" name="">

                            </div>
                        </form>
                        
                        <!-- End Example Events -->
                    </div>
                </div>
            </div>
        </div> 
    </div>         
   
    <!-- 全局js -->
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
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
    <!--统计代码，可删除-->
    
    <script type="text/javascript">
    //本小插件支持移动端哦
    
    //这里是初始化
    $('.filter-box').selectFilter({
        callBack : function (val){
            //返回选择的值
            // console.log(val+'-是返回的值')
        }
    });
    </script>

</body>

</html>
