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
    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=4.1.0" rel="stylesheet">
    <style type="text/css">
        .upload{
            padding: 4px 10px 4px 17px;
            height: 20px;
            line-height: 20px;
            position: relative;
            border: 1px solid #999;
            text-decoration: none;
            color: #333;
            background:#fff;
        }
        .change{
            position: absolute;
            overflow: hidden;
            left:15px;
            top: 0;
            opacity:0;
        }
        .table th, .table td{ 
        height:100px;
        width:100px;
        text-align: center;
        vertical-align: middle!important;
        }
        .table{
            table-layout: fixed;
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
                            <h4 class="example-title">列表</h4>
                            <div class="example">
                               <!--  <div class="alert alert-success" id="examplebtTableEventsResult" role="alert">
                                    事件结果
                                </div> -->

                                <div class="container" style="width:1100px;">
                                    <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                                            <a data-toggle="modal" href="form_basic.html#modal-form" class="btn btn-outline btn-default glyphicon glyphicon-plus">新增</a>
                                            <a class="btn btn-outline btn-default glyphicon glyphicon-pencil edit">修改</a>
                                            <a data-toggle="modal" class="btn btn-outline btn-default glyphicon glyphicon-remove delete">删除</a>
                                    </div>
                                    <table data-toggle="table" class="layui-form" id="exampleTableToolbar">

                                        <thead >
                                            <tr  align="center">
                                                <th data-field="check" data-width="30px" data-checkbox="true"></th>
                                                <th data-field="id">id</th>
                                                <th data-field="imagex">图片</th>
                                                <th data-field="name">图片名</th>
                                                <th data-field="updated_at">加入时间</th>
                                                <th data-field="state">状态</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stu as $v)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$v->id}}</td>
                                                    <td><img src="/banner/{{$v->imagex}}"></td>
                                                    <td>{{$v->name}}</td>
                                                    <td>{{$v->updated_at}}</td>
                                                    <td>{{$v->state}}</td>
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

        <!-- 添加            -->
    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="m-t-none m-b">添加学生</h3><hr>
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group" style="clear:both;">
                                    <label class="col-sm-2 control-label">图片：</label>
                                    <div class="col-sm-10">
                                        <a href="javascript:;" class="upload">选择图片
                                            <input type="file" name="imaged" class="change" required="required" oninvalid="setCustomValidity('请上传图片')"  multiple="multiple" id="file">
                                        </a>
                                        <div class="fileerrorTip1" style="display:inline-block; "></div>
                                        <div class="showFileName1" style="display:inline-block;"></div>

                                    </div>
                                </div>
                                <div class="form-group" style="clear:both;">
                                    <label class="col-sm-2 control-label">图片名：</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" placeholder="图片名" name="name" required="required" oninvalid="setCustomValidity('请填写名字')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状态：</label>
                                    <div class="col-sm-10">
                                        <select name="state" class="form-control">
                                            <option value="启用">启用</option>
                                            <option value="禁用">禁用</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" id="file_id"><strong>添加</strong>
                                    </button>
                                </div>
                            </form>
                        </div>
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

            //显示文件信息

            $(".upload").on("change","input[type='file']",function(){
                var filePath=$(this).val();
                if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1 || filePath.indexOf("gif")!=-1){
                    $(".fileerrorTip1").html("").hide();
                    var arr=filePath.split('\\');
                    var fileName=arr[arr.length-1];
                    $(".showFileName1").html(fileName);
                }else{
                    $(".showFileName1").html("");
                    $(".fileerrorTip1").html("您未上传文件，或者您上传文件类型有误！").show();
                    return false
                }
            })
            //删除学生
            $('.delete').click(function(){
                var ob = $('#exampleTableToolbar').bootstrapTable('getSelections');
                id = [];
                //拼装需要删除的数组
                for (var i=0;i<ob.length;i++){ 
                    id[i]=ob[i].id;
                }
                var str=id.join(","); //把数组分割成字符串
                layer.confirm('你确定要删除吗？', {
                    btn: ['删除','取消'] 
                  }, function(){
                    $.post("/admin/adminuser/destroy",{id:str,"_method":"DELETE","_token":"{{ csrf_token() }}"},function(data,status){
                        layer.msg('删除成功', {icon: 1});
                        //删除表格
                        var ids = $.map($('#exampleTableToolbar').bootstrapTable('getSelections'), function (row) {
                            return row.id;
                        });
                        $('#exampleTableToolbar').bootstrapTable('remove', {
                            field: 'id',
                            values: ids
                        });
                    });
                  }, function(){
                    layer.msg('已取消', {icon: 2});
                  });
            });

            //修改学生
            $('.edit').click(function(){
                selected = "selected";
                 cks = document.querySelectorAll("input[name='btSelectItem']:checked");//查看选中
                if (cks.length==1){
                    $('input[name="btSelectItem"]:checked').each(function(){ 
                        ob = $('#exampleTableToolbar').bootstrapTable('getSelections')[0];
                    });
                //页面层
                // alert(ob.name);
            var index = layer.open({
                  type: 1,
                  title:'修改学生信息',
                  skin: 'layui-layer-rim', //加上边框
                  area: ['640px', '500px'],
                  content: "<div class='modal-dialog'><div class='modal-body'><div class='row'><div class='col-sm-12'><div class='form-horizontal' data-toggle='table'><div class='form-group'><label class='col-sm-2 control-label'>当前头像：</label><div class='col-sm-10'>"+ob.imagex+"</div></div> <div class='form-group'><label class='col-sm-2 control-label'>修改头像：</label><div class='x1 col-sm-10'><input type='file' name='imaged' id='filee'></div></div><div class='form-group'><label class='col-sm-2 control-label'>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label><div class='col-sm-10'><input type='text' class='x2 form-control' placeholder='姓名' name='name' value="+ob.name+"></div></div> <div class='form-group'><label class='col-sm-2 control-label'>权&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;限：</label><div class='col-sm-10'><select name='state' class='form-control'><option value='启用'"+eval((ob.state=="启用")?selected:'')+">启用</option><option value='禁用'"+eval((ob.state=="禁用")?selected:'')+">禁用</option></select></div></div><div><button class='updatee btn btn-sm btn-primary pull-right m-t-n-xs' type='button'><strong>执行修改</strong></button></div></div></div></div></div></div>"
                });
                // 执行修改
            $('.updatee').click(function(){
                // 获取选中的行
                $('input[name="btSelectItem"]:checked').each(function(){
                    tr = $(this).parent().parent().children();
                });
                id= ob.id;
                name = $(this).parent().parent().children().eq(2).find("input").val();
                // alert(name);
                state = $(this).parent().parent().children().eq(3).find("select").val();
                // alert(state);
                file = $(this).parent().parent().children().find("#filee").val();
                // alert(file1);
                sss = document.getElementById("filee").files[0];
                // alert(sss1);
                // http://blog.csdn.net/Inuyasha1121/article/details/51915742
                layer.close(layer.index); 
                        layer.confirm('你确定要修改吗？', {
                        btn: ['确定','取消'] 
                      }, function(){
                         formData = new FormData();
                        if(file){
                            alert(1);
                            // 获取图像
                            formData.append('imaged',sss);
                            // 插入内容
                            formData.append('id', id);
                            formData.append('name', name);
                            formData.append('state', state);
                            formData.append("_method","PUT");
                            formData.append("_token","{{ csrf_token() }}");
                        }else{
                            // 插入内容
                            formData.append('id', id);
                            formData.append('name', name);
                            formData.append('state', state);
                            formData.append("_method","PUT");
                            formData.append("_token","{{ csrf_token() }}");
                        }
                        $.ajax({
                            url: '/admin/banner/update',
                            type: 'POST',
                            cache: false,
                            data: formData,
                            processData: false,
                            contentType: false
                        }).done(function(res) {
                            tr.eq(2).html(res);
                            tr.eq(3).text(name);
                            tr.eq(5).text(state);
                            layer.msg('修改成功', {icon: 1});
                        }).fail(function(res) {
                            alert(2);
                            layer.msg('修改失败', {icon: 2});
                        });
                      }, function(){
                        layer.msg('已取消',{icon: 2});
                      });

                });
            }else{
                parent.layer.msg('请选择一个进行修改');
            }
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
                  maintainSelected : true, 
                  // pageSize: 4,                       //每页的记录行数（*）
                  //   // pageList: [10, 25, 50, 100],       //可供选择的每页的行数（*）
                });
            })();
    </script>
    

        




</body>

</html>
