<?php foreach ($comments as $key => $comment) : ?>
<div class="d-flex flex-row justify-content-between">
  <div class="lh-1">
    <p class="fw-bold text-success" style="font-size: 18px;">
      <?= $comment['user_name'] ?>
    </p>
    <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);">
      <?= $comment['created'] ?>
    </p>
    <p style="font-size: 14px;">
      <?= $comment['comment'] ?>
    </p>
  </div>
  <?php if ($comment['user_id'] === $_SESSION['user']['id']) : ?>
  <div>
    <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment"
      onclick="editComment(<?= $key ?>)"></i>
    <i class="pointer-cursor fa-solid fa-trash" title="Delete commment"
      onclick="deleteComment(<?= $comment['id'] ?>)"></i>
  </div>
  <?php endif; ?>
</div>
<div id="comment-edit<?= $key ?>" class="hide">
  <textarea id="edit-input<?= $key ?>" class="form-control mb-2"
    placeholder="Leave a comment about the recipe..."><?= $comment['comment'] ?></textarea>
  <button class="btn btn-sm btn-success" onclick="updateComment(<?= $comment['id'] ?>, <?= $key ?>)">Save</button>
</div>
<hr>
<?php endforeach; ?>