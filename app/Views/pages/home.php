<section>
<div class="jumbotron">
    <div class="container">
    <h1 class="display-4">RSNA 2023 Abdominal Trauma Detection</h1>
    <p class="lead">Blunt force abdominal trauma is among the most common types of traumatic injury, with motor vehicle accidents as the most frequent cause. Detection and classification of injuries are key to effective treatment and favorable outcomes.</p>
    <hr class="my-4">
    <p>In this competition, you’ll identify a range of potentially life-threatening injuries on CT scans of patients who have suffered abdominal trauma.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
    </div>  
</div>
</section>

<section class="blog-section">
<div class="container">
    <?php if ($news): ?>
        <?php foreach ($news as $newsItem): ?>
            <h3><?= $newsItem['title'] ?></h3>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No posts</p>
    <?php endif; ?>
</div>


</section>