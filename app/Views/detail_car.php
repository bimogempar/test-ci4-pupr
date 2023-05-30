<?= $this->extend('layouts/layout'); ?>

<?= $this->section('main'); ?>
<div class="text-2xl font-medium">
    Detail car
</div>
<div class="mt-4">
    <img src="<?= $car->image_url; ?>" alt="Car" width="400">
    <div>Category: <?= $car->category_name; ?></div>
    <div class="mt-2"><?= $car->car_name; ?> - <?= $car->year; ?></div>
    <div>Rp. <?= $car->price; ?></div>
    <div class="my-4 text-sm"><?= $car->description; ?></div>
</div>
<?= $this->endSection(); ?>