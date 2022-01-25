<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MDUI CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css"/>
    <title>大海航行靠舵手</title>
</head>
<body class="mdui-theme-layout-auto mdui-theme-primary-indigo mdui-appbar-with-toolbar">
    <div class="mdui-container-fluid mdui-typo">
        <!-- 顶部栏 -->
        <div class="mdui-appbar mdui-appbar-fixed mdui-appbar-scroll-hide">
            <div class="mdui-toolbar mdui-color-theme">
                <a href="javascript:;" class="mdui-btn mdui-btn-icon" id="toggle">
                <i class="mdui-icon material-icons">menu</i>
                </a>
                <span class="mdui-typo-title mdui-toolbar-spacer mdui-center"><strong>大海航行靠舵手</strong></span>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon">
                    <i class="mdui-icon material-icons" onclick="location.reload()">refresh</i>
                </a>
            </div>
        </div>
        <!-- 抽屉栏 -->
        <div class="mdui-drawer  mdui-drawer-close mdui-color-theme-20" id="drawer">
            <ul class="mdui-list">
                <?php
                $result = $link->query("select * from list");
                foreach ($result as $result) {
                ?>
                <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">label-outline</i>
                <div class="mdui-list-item-content"><?php echo $result['tags'] ?></div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="mdui-container-fluid mdui-typo">
        <!-- 折叠搜索框 -->
        <div class="mdui-panel" mdui-panel>
            <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">
                <div class="mdui-panel-item-title">搜索内容</div>
                <i class="mdui-panel-item-arrow mdui-icon material-icons">search</i>
            </div>
            <div class="mdui-panel-item-body">
                <form action="search.php" method="post">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">请输入搜索内容</label>
                    <input class="mdui-textfield-input" type="text" name="search"/>
                    </div>
                    <div class="mdui-panel-item-actions">
                    <button class="mdui-btn mdui-ripple">搜索</button>
                    </div>
                </form>
            </div>
            </div>

            <div class="mdui-panel-item">
            <div class="mdui-panel-item-header">
                <div class="mdui-panel-item-title">提交内容</div>
                <i class="mdui-panel-item-arrow mdui-icon material-icons">add</i>
            </div>
            <div class="mdui-panel-item-body">
                <form action="add.php" method="post">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">名称</label>
                    <input class="mdui-textfield-input" type="text" name="name" maxlength="20"/>
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">标签</label>
                    <input class="mdui-textfield-input" type="text" name="tags" maxlength="30"/>
                    <div class="mdui-textfield-helper">请使用空格分隔标签，最多输入三个标签</div>
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">简要描述</label>
                    <textarea class="mdui-textfield-input" type="text" name="description" maxlength="200"></textarea>
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">URL网址</label>
                    <input class="mdui-textfield-input" type="text" name="url" maxlength="200"/>
                    </div>
                    <div class="mdui-panel-item-actions">
                    <button class="mdui-btn mdui-ripple">提交</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="mdui-row">
            <div class="mdui-col-xs-12">
            <!-- 显示搜索内容 -->
            <?php
            $search = $_POST['search'];
            $result = $link->query("select * from list where name like '%$search%' or tags like '%$search%' or description like '%$search%'");
            if (empty($result)) {
                echo "<h1>$result</h1>";
            } else {
                foreach ($result as $result) {
            ?>
                <div class="mdui-card" onclick="location='<?php echo $result['url'] ?>'">

                <!-- 卡片头部，包含头像、标题、副标题 -->
                <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><?php echo $result['name'] ?></div>
                <div class="mdui-card-primary-subtitle"><?php echo $result['tags'] ?></div>
                </div>

                <!-- 卡片的内容 -->
                <div class="mdui-card-content"><?php echo $result['description'] ?></div>
                <div class="mdui-card-actions">
                <button class="mdui-btn mdui-ripple mdui-color-theme" onclick="location='<?php echo $result['url'] ?>'">访问</button>
                </div>
                </div>
            <?php
                }
            }
            ?>
            </div>
        </div>

    </div>
    <!-- MDUI JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
    <script src="./function.js"></script>
</body>
</html>