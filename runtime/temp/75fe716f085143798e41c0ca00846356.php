<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"/klwl_web/klwl_pj/hzdy.kailly.com/public/../application/admin/view/config/popup_save.html";i:1564557409;s:73:"/klwl_web/klwl_pj/hzdy.kailly.com/application/admin/view/common/meta.html";i:1552356108;}*/ ?>
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
    .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;border:1px solid #eee;}
    .spec{float:right;width:80%;margin: 0 5px 10px 3px}
    .remove{width:4% !important;margin:10px 0 0 0;color:#FF5722;cursor:pointer;}
    .removes{color:#FF5722;cursor:pointer;}
    .layui-input-inline{margin-right:2px !important;}
    .layui-unselect{float:left;}
    .pane{width:13% !important;}
</style>
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form" lay-filter="layuiadmin-form-admin" style="padding: 20px 30px 1px 0;">
            <form action="" class="layui-form">
                <input type="hidden" name="id" id="goods_id" value="<?php echo input('id'); ?>">

                <div class="layui-form-item">
                    <label class="layui-form-label">弹窗类型</label>
                    <div class="layui-input-block">
                    <input type="radio" name="type" value="1" title="活动弹窗" <?php if($data['type'] == 1): ?>checked<?php endif; ?> >
                    <input type="radio" name="type" value="2" title="新人弹窗" <?php if($data['type'] == 2): ?>checked<?php endif; ?> >
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">弹窗图片</label>
                    <div class="layui-input-block layui-upload">
                        <button type="button" class="layui-btn layui-btn-normal file" id="test1"><i class="layui-icon"></i>上传图片</button>
                        <input class="layui-upload-file" type="file" accept="undefined" name="file" id="test1s">
                        <span class="layui-inline layui-upload-choose">支持 png、jpg、jpeg 格式文件</span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">跳转地址</label>
                    <div class="layui-input-block">
                        <input type="text" name="url" value="<?php echo (isset($data['url']) && ($data['url'] !== '')?$data['url']:''); ?>" lay-verify="required" autocomplete="off" placeholder="请输入跳转链接地址" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline">
                        <input type="button" lay-submit id="transmit" lay-filter="LAY-user-back-submit" value="确认" class="layui-btn">
                        <button type="reset" class="layui-btn layui-btn-primary" onclick="javascript:history.go(-1)">返回</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    layui.use(['upload','laydate','form'],function(){
        var upload = layui.upload;
        var form = layui.form;

        //封面上传
        upload.render({
            elem: '#test1',
            auto: false,
            field:'pic',
            //,multiple: true
            bindAction: '#test1s',
            done: function(res){
              console.log(res)
            }
        });

    });

    //表单上传
    fromUpload('form',"<?php echo url('Config/popup_save'); ?>");
</script>