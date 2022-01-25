<?php
$result = $link->query("select * from list");
foreach ($result as $result) {
?>
    <div class="mdui-card">

    <!-- 卡片头部，包含头像、标题、副标题 -->
    <div class="mdui-card-primary">
    <div class="mdui-card-primary-title" onclick="get_selectedtag1()'<?php echo $result['url'] ?>'"><?php echo $result['name'] ?></div>
    <div class="mdui-card-primary-subtitle">
        <nobr class="toPHP" onclick=""><?php echo $result['tag1'] ?></nobr>
        <nobr class="toPHP" onclick=""><?php echo $result['tag2'] ?></nobr>
        <nobr class="toPHP" onclick=""><?php echo $result['tag3'] ?></nobr>
    </div>
    </div>

    <!-- 卡片的内容 -->
    <div class="mdui-card-content"><?php echo $result['description'] ?></div>
    <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple mdui-color-theme" onclick="location='<?php echo $result['url'] ?>'">访问</button>
    </div>
    </div>
<?php
}
?>