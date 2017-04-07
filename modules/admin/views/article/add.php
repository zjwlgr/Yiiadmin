<?php
use yii\helpers\Url;
$this->params['title'] = '技术文章管理--新增';
?>

<div class="bs-example">

    <div class="bs-hander">

        <a href="<?= Url::to(['article/list'])?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp; 列 表 (<?= $count ?>)</a>
        <a href="<?= Url::to(['article/add'])?>" type="button" class="btn btn-default active"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp; 新 增 </a>

    </div>

    <div class="bs-center">

        <span id="class_uri">
            <input type="hidden" id="ajax_class_two-u" value="<?= Url::to(['article/ajax_class_two']) ?>">
        </span>

        <form id="form1_article" enctype="multipart/form-data" method="post" action="" class="form-horizontal">
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">分类</label>
                <div class="col-sm-5">

                    <div class="dropdown" style="float: left;">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span id="text">--请选择--</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" id="dropdownMenuone_article" role="menu" aria-labelledby="dropdownMenu1">
                            <?php foreach($cla_list as $val){?>
                                <li role="presentation"><a href="#" _i="<?= $val['id'] ?>"><?= $val['name'] ?></a></li>
                            <?php }?>
                        </ul>
                        <input type="hidden" name="Article[class_one_id]" id="class_one_id" value="" />
                    </div>
                    <span class="class_two"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">标题</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Article[title]" id="title" placeholder="标题">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-1 control-label">图片</label>
                <div class="col-sm-5" style="position: relative; top: 5px;">
                    <input type="file" id="imageFile" name="UploadForm[imageFile]" style="display: inline;">&nbsp;<span class="text-danger">规格：720 * 360</span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">幻灯</label>
                <div class="col-sm-2" style="position: relative; top: 5px;">
                    <input type="checkbox" value="1" id="is_home" name="Article[is_home]"> &nbsp;<span class="text-muted">是否加入首页幻灯</span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">排序</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="Article[sort]" value="0" id="sort" placeholder="排序号">
                </div>
            </div>

            <div class="form-group">
                <label for="locking" class="col-sm-1 control-label">状态</label>
                <div class="col-sm-2">
                    <div class="radio">
                        <label>
                            <input type="radio" name="Article[is_release]" checked value="1"> 发布 &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="Article[is_release]" value="0"> 待定
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-1 control-label">内容</label>
                <div class="col-sm-11">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="Article[content]" type="text/plain"></script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/public/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/public/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container',{
                            initialFrameHeight:260
                        });
                    </script>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-primary"> 提 交 &nbsp;<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

    </div>

</div>