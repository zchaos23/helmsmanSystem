<?php
$result = $link->query("select * from list where tags like '%$selectedtag%'");
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
    </div>
<?php
}
?>