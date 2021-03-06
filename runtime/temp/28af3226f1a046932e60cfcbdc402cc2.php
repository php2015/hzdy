<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/klwl_web/klwl_pj/hzdy.kailly.com/public/../application/admin/view/user/sub.html";i:1571822240;s:73:"/klwl_web/klwl_pj/hzdy.kailly.com/application/admin/view/common/meta.html";i:1552356108;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $config['title']; ?>-后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/style/admin.css" media="all">
    <!-- 引入阿里巴巴矢量图标库 -->
    <link title="" href="//at.alicdn.com/t/font_728609_yqh8bmk6kj.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<script src='/static/admin/jquery.js'></script>
<script src="/static/admin/layui/layui.js"></script>
<script src='/static/admin/common.js'></script>

<script>
    var layer;
    layui.use('layer',function(){
        layer = layui.layer;
    })
</script>
    


<style>
        .layui-table-cell{  /*最后的pic为字段的field*/
          height: 100%;
          max-width: 100%;
        }
</style>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">查看下级</div>
                <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="app-content-list">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">关键字</label>
                            <div class="layui-input-inline">
                                <input type="text" name="keywords" placeholder="请输入会员ID、会员昵称" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <button class="layui-btn layuiadmin-btn-list" lay-submit="" lay-filter="LAY-app-contlist-search">
                                <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                            </button>
                        </div>
                        <!--<div class="layui-inline">-->
                            <!--<a href="<?php echo url('User/user_excel'); ?>"><button class="layui-btn layui-btn-normal">导出数据</button></a>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="layui-card-body">
                    <table class="layui-hide" id="test-table-autowidth"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use(['table','form'],function(){
        var table = layui.table;
        var form = layui.form;

        //监听搜索
        form.on('submit(LAY-app-contlist-search)', function(data){
            var field = data.field;
            field.page = 1;
            //执行重载
            table.reload('test-table-autowidth', {
                where: field
            });
        });

        table.render({
            elem: '#test-table-autowidth',
            url:"<?php echo url('User/sub'); ?>",
            method:'post',
            response:{
                statusCode:200
            },
            page:{
                layout:['prev','page','next','skip','count']
            },
            where:{id:"<?php echo input('id'); ?>"},
            limit:20,
            cols:[[
                {field:'id',title:'编号',width:'4%'},
                {field:'nickname',title:'会员信息',width:'15%',templet:function(d){
                    return '<img src="'+d.head_img+'" alt="" style="width:30px;height:30px;margin-right:10px" />'+'<span>'+d.nickname+'</span>';
                }},
                {title:'城市',templet:function(d){
                     var string = '';
                        string += '<p>性别：'+d.sex_name+'</p>';
                        string += '<p>城市：'+d.province+'/'+d.city+'</p>';
                        string += '<p>会员ID：'+d.number+'</p>';
                        return string;
                }},
                {title:'会员等级',templet:function (d) {
                    var string = '';
                        string += '<p>等级：'+d.grade_name+'</p>';
                        string += '<p>积分：'+d.point+'</p>';
                        string += '<p>余额：'+d.money+'</p>';
                        return string;
                }},
                {field:'status',title:'状态',width:"5%",templet:function(d){
                    if(d.status == 1){
                        return '<button class="layui-btn layui-btn-sm" onclick="update('+d.id+',2)">正常</button>';
                    } else {
                        return '<button class="layui-btn layui-btn-sm layui-btn-danger" onclick="update('+d.id+',1)">冻结</button>'
                    }
                }},
                {field:'add_time',title:'注册时间'},
                {title:'操作',width:'20%',toolbar:'#barDemo'},
            ]]
        })
    })
</script>
<script>
    function update(id,type)
    {
        var data = {
            id:id,
            status:type
        };
        get_request("<?php echo url('User/edit'); ?>",data);
    }
</script>

<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="edit" href="<?php echo url('User/grant_coupon'); ?>?id={{d.id}}">发放优惠券</a>
  <a class="layui-btn layui-btn-xs" lay-event="edit" href="<?php echo url('User/save'); ?>?id={{d.id}}">编辑会员</a>
  <a class="layui-btn layui-btn-xs" lay-event="edit" href="<?php echo url('User/sub'); ?>?id={{d.id}}">查看下级</a>
</script>