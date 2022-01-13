<?php
$postID = (int)$_GET['id'];
$database = database_connect();
$result = $database->prepare('SELECT * FROM `comments` WHERE `post_id` = :post_id');
$result->execute([
    'post_id' => $postID
]);
$comments = $result->fetchAll();
?>
<section style="background-color: #eee;">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <?php if ($comments): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <img
                                            class="rounded-circle shadow-1-strong me-3"
                                            src="https://avatars.izi.ua/1849206"
                                            alt="avatar"
                                            width="60"
                                            height="60"
                                    />
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1"><?php echo $comment['autor']; ?></h6>
                                        <p class="text-muted small mb-0">
                                            Опубликовано - <?php echo $comment['created_at']; ?>
                                        </p>
                                    </div>
                                </div>

                                <p class="mt-3 mb-4 pb-2">
                                    <?php echo $comment['comment']; ?>
                                </p>

                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="card-body">
                        <div class="d-flex flex-start justify-content-center">


                            <p class="mt-3 mb-4 pb-2">
                                Комментариев к публикации еще нет. Оставьте комментарий и будьте первым.
                            </p>
                        </div>
                        <?php endif; ?>
                        <form action="scripts/addcomment.php" method="post">
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img
                                            class="rounded-circle shadow-1-strong me-3"
                                            src="https://avatars.izi.ua/1849206"
                                            alt="avatar"
                                            width="40"
                                            height="40"
                                    />
                                    <div class="form-outline w-100">
                                        <div class="mb-3" hidden>
                                            <label for="exampleFormControlInput1" class="form-label">ID
                                                публикации</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                   name="id" value="<?php echo $postID; ?>">
                                        </div>
                                        <?php if (is_has_error()) {
                                            show_error();
                                        } ?>
                                        <?php if (is_has_success()) {
                                            show_success();
                                        } ?>
                                        <textarea
                                                class="form-control"
                                                id="textAreaExample"
                                                rows="4" name="commentText"
                                                style="background: #fff;"
                                                required
                                        ></textarea>
                                        <!--                                <label class="form-label" for="textAreaExample">Message</label>-->
                                    </div>
                                </div>
                                <div class="float-end mt-3 pt-3 pb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Добавить комментарий</button>
                                    <!--                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>