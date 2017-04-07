<?php
use yii\helpers\Url;
$this->params['title'] = '技术文章管理--编辑';
?>

<div class="bs-example">

    <div class="bs-hander">

        <a href="<?= Url::to(['article/list'])?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp; 列 表 (<?= $count ?>)</a>
        <a href="<?= Url::to(['article/add'])?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp; 新 增 </a>

    </div>

    <div class="bs-center">

        <span id="class_uri">
            <input type="hidden" id="ajax_class_two-u" value="<?= Url::to(['article/ajax_class_two']) ?>">
        </span>

        <form id="form1_article" enctype="multipart/form-data" method="post" action="" class="form-horizontal">
            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <input name="Article[id]" type="hidden" value="<?= $art_one['id'] ?>">
            <input name="Article[image_hidden]" type="hidden" value="<?= $art_one['image'] ?>">
            <input name="uri" type="hidden" value="<?= Yii::$app->request->get('uri') ?>">

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">分类</label>
                <div class="col-sm-5">

                    <div class="dropdown" style="float: left;">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span id="text"><?= $art_one['class_one'] ?></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" id="dropdownMenuone_article" role="menu" aria-labelledby="dropdownMenu1">
                            <?php foreach($cla_list as $val){?>
                                <li role="presentation"><a href="#" _i="<?= $val['id'] ?>"><?= $val['name'] ?></a></li>
                            <?php }?>
                        </ul>
                        <input type="hidden" name="Article[class_one_id]" id="class_one_id" value="<?= $art_one['class_one_id'] ?>" />
                    </div>
                    <span class="class_two">
                        <div class="dropdown" style="float: left; margin-left: 5px;">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                <span id="text"><?= $art_one['class_two'] ?></span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="dropdownMenuone" role="menu" aria-labelledby="dropdownMenu1">
                                <?php foreach($cla_list_two as $val){?>
                                    <li role="presentation"><a href="#" _i="<?= $val['id'] ?>"><?= $val['name'] ?></a></li>
                                <?php }?>
                            </ul>
                            <input type="hidden" name="Article[class_two_id]" id="class_two_id" value="<?= $art_one['class_two_id'] ?>" />
                        </div>
<span class="class_two"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">标题</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="Article[title]" id="title" placeholder="标题" value="<?= $art_one['title'] ?>">
                </div>
            </div>

            <?php if(!empty($art_one['image'])){?>
            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-1 control-label">&nbsp;</label>
                <div class="col-sm-5" style="position: relative; top: 5px;">
                    <img src="<?= Url::to($art_one['image'],true) ?>" class="img-thumbnail" width="250">
                </div>
            </div>
            <?php }?>
            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-1 control-label">图片</label>
                <div class="col-sm-7" style="position: relative; top: 5px;">
                    <input type="file" id="imageFile" name="UploadForm[imageFile]" style="display: inline;">&nbsp;<span class="text-danger">规格：720 * 360</span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">幻灯</label>
                <div class="col-sm-2" style="position: relative; top: 5px;">
                    <input type="checkbox" value="1" id="is_home" name="Article[is_home]"<?= $art_one['is_home'] == 1 ? ' checked' : '' ?>> &nbsp;<span class="text-muted">是否加入首页幻灯</span>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-sm-1 control-label">排序</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="Article[sort]" id="sort" placeholder="排序号" value="<?= $art_one['sort'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="locking" class="col-sm-1 control-label">状态</label>
                <div class="col-sm-2">
                    <div class="radio">
                        <label>
                            <input type="radio" name="Article[is_release]" <?= $art_one['is_release'] == 1 ? ' checked' : '' ?> value="1"> 发布 &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="Article[is_release]" <?= $art_one['is_release'] == 0 ? ' checked' : '' ?> value="0"> 待定
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-1 control-label">内容</label>
                <div class="col-sm-11">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="Article[content]" type="text/plain"><?= $art_one['content'] ?></script>
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