<div class="container">
  <div class="card board">
    <span class="icon"><i class="fa fa-map-signs fa-fw"></i></span>
      <?php echoBoard($post['title'], $sort['id']); ?>
  </div>
  <div id="main">
    <div class="card">
      <div class="card-head"><i class="fa fa-book fa-fw"></i><?= $post['title']; ?></div>
      <div class="card-body content">
        <div class="post-info">
          <span><i class="fa fa-clock-o fa-fw"></i><?= date('Y-m-d', $post['time']); ?></span>
          <span><i class="fa fa-eye fa-fw"></i><?= $post['view']; ?></span>
          <span><i class="fa fa-folder-open fa-fw"></i><a href="<?= $sort['url']; ?>"><?= $sort['name']; ?></a></span>
        </div>
          <?= $post['content']; ?>
      </div>
    </div>
      <?php echoAd($ads[0]); ?>
  </div>
  <div id="side">
    <div class="card">
      <div class="card-head"><i class="fa fa-folder-open fa-fw"></i>文章分类</div>
      <div class="card-body">
          <?php echoPostSorts($DATA->getPostSorts(), $sort['id']); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-head"><i class="fa fa-magnet fa-fw"></i>相关文章</div>
      <div class="card-body">
          <?php echoPosts($DATA->getRelatedPosts($sort['id'], $post['id'], 10), true); ?>
      </div>
    </div>
      <?php echoAd($ads[1]); ?>
  </div>
</div>

<?php
    $this->include('module/footer.php');
?>