<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"/klwl_web/klwl_pj/hzdy.kailly.com/public/../application/admin/view/group/refund_info.html";i:1572504014;s:73:"/klwl_web/klwl_pj/hzdy.kailly.com/application/admin/view/common/meta.html";i:1552356108;s:73:"/klwl_web/klwl_pj/hzdy.kailly.com/application/admin/view/common/edit.html";i:1557216596;}*/ ?>
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
    .hr-line-dashed{border-top:1px dashed #e7eaec;color:#fff;background-color:#fff;height:1px;margin:20px 0}
</style>
<div class="layui-fluid layadmin-homepage-fluid">
    <div class="layui-row layui-col-space8">
        <div class="layui-form" lay-filter="layuiadmin-form-admin">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md12">
                    <div class="layui-card-header" style="background-color: #f2f2f2;border: 1px solid #e6e6e6">
                        订单信息
                    </div>
                    <div class="layui-card layui-fluid">
                        <div class=" layui-fluid" style="display: flex;height: 100%">
                           <div class="layui-col-sm2">订单编号：<?php echo $data['order']['order_sn']; ?></div>
                           <div class="layui-col-sm2">退款编号：<?php echo $data['order_sn']; ?></div>
                           <div class="layui-col-sm2">申请状态：<?php echo $data['status_name']; ?></div>
                           <div class="layui-col-sm2">申请时间：<?php echo $data['add_time']; ?></div>
                           <div class="layui-col-sm2">支付方式：<?php if($data['order']['pay_type'] == 1): ?>微信支付<?php else: ?>余额支付<?php endif; ?></div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class=" layui-fluid" style="display: flex;height: 100%">
                         <div class="layui-col-sm2">团单号：<?php echo $data['order']['group_no']; ?></div>
                        <div class="layui-col-sm2">拼团状态：<?php echo $data['order']['group_status_name']; ?></div>
                        <div class="layui-col-sm2">拼团结束：<?php echo $data['order']['add_time']; ?></div>
                          <div class="layui-col-sm2">物流公司：<?php echo (isset($data['order']['logistics_name']) && ($data['order']['logistics_name'] !== '')?$data['order']['logistics_name']:'待发货'); ?></div>
                          <div class="layui-col-sm2">快递单号：<?php echo (isset($data['order']['logistics_no']) && ($data['order']['logistics_no'] !== '')?$data['order']['logistics_no']:'待发货'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form" lay-filter="layuiadmin-form-admin">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md12">
                    <div class="layui-card">
                        <table class="layui-table" lay-skin="line" style="margin:0">
                            <thead>
                            <tr>
                                <td>商品信息</td>
                                <td>订单金额</td>
                                <td>实付金额</td>
                                <td>拼团限制人数</td>
                                <td>用户申请金额</td>
                                <td>实际退款金额</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="display:flex;align-items: center;">
                                    <div>
                                        <img style="width:100px" src="<?php echo $data['order']['goods_pic']; ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="margin-left:1.5rem"><?php echo $data['order']['goods_title']; ?></span>
                                    </div>
                                </td>
                                <td>&yen; <?php echo $data['order']['order_price']; ?></td>
                                <td>&yen; <?php echo $data['order']['pay_money']; ?></td>
                                <td><?php echo $data['order']['goods_num']; ?></td>
                                <td>&yen; <?php echo $data['money']; ?></td>
                                <td>
                                <?php if($data['money'] != 0): ?>
                                &yen; <?php echo $data['money']; else: ?>
                                &yen; <?php echo $data['price']; endif; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form" lay-filter="layuiadmin-form-admin">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md12">
                    <div class="layui-card-header" style="background-color: #f2f2f2;border: 1px solid #e6e6e6">
                        收货信息
                    </div>
                    <div class="layui-card layui-fluid">
                        <div class=" layui-fluid" style="display: flex;height: 100%">
                            <div class="layui-col-sm2">收货人：<?php echo $data['order']['name']; ?></div>
                            <div class="layui-col-sm2">联系电话：<?php echo $data['order']['tel']; ?></div>
                            <div class="layui-col-sm2">详细地址：<?php echo $data['order']['province']; ?><?php echo $data['order']['city']; ?><?php echo $data['order']['area']; ?><?php echo $data['order']['address']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form " lay-filter="layuiadmin-form-admin">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md12">
                    <div class="layui-card-header" style="background-color: #f2f2f2;border: 1px solid #e6e6e6">
                        其他信息
                    </div>
                    <div class="layui-card layui-fluid">
                        <div style="display: flex;">
                            <div class="layui-card-body layuiadmin-card-list">
                                <p>用户留言：<?php echo (isset($data['desc']) && ($data['desc'] !== '')?$data['desc']:''); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="layui-form " lay-filter="layuiadmin-form-admin">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md12">
                    <div class="layui-card-header" style="background-color: #f2f2f2;border: 1px solid #e6e6e6">
                        退款凭证
                    </div>
                    <div class="layui-card layui-fluid">
                        <div style="display: flex;">
                            <?php if(is_array($data['pic']) || $data['pic'] instanceof \think\Collection || $data['pic'] instanceof \think\Paginator): if( count($data['pic'])==0 ) : echo "" ;else: foreach($data['pic'] as $key=>$vo): ?>
                             <img style="width:100px;height:100px;margin-left: 10px" src="<?php echo $vo; ?>" alt="">
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="layui-form-item" style="text-align: right">
            <button type="reset" class="layui-btn layui-btn-primary" onclick="javascript:history.go(-1)">返回</button>
        </div>
    </div>
</div>
<!-- 编辑器文件库 -->
<link rel="stylesheet" href="/static/Edit/css/froala_editor.min.css">
<link rel="stylesheet" href="/static/Edit/css/font-awesome.min.css">
<script src="/static/Edit/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="/static/Edit/js/froala_editor_ie8.min.js"></script>
  <![endif]-->

<script src="/static/Edit/js/plugins/tables.min.js"></script>  			<!--表格-->
<script src="/static/Edit/js/plugins/lists.min.js"></script> 			<!--编号-->
<script src="/static/Edit/js/plugins/colors.min.js"></script> 			<!--颜色-->
<script src="/static/Edit/js/plugins/media_manager.min.js"></script>	<!--未知-->
<script src="/static/Edit/js/plugins/font_family.min.js"></script>		<!--字体-->
<script src="/static/Edit/js/plugins/font_size.min.js"></script>		<!--大小-->
<script src="/static/Edit/js/plugins/block_styles.min.js"></script>		<!--样式-->
<!-- <script src="/static/Edit/js/plugins/video.min.js"></script> -->			<!--视频-->
<script src="/static/Edit/js/langs/zh_cn.js"></script>					<!--语言-->

 <!-- 
 用法
 $('#edit').editable({inlineMode: false, alwaysBlank: true}) 
 language: "zh_cn", 声明中文菜单
 imageUploadURL:xxxx  图片上传地址  返回样式为  link:xxx图片地址
 -->