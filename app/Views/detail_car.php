<?= $this->extend('layouts/layout'); ?>

<?= $this->section('main'); ?>
<div class="text-2xl font-medium">
    Detail car
</div>
<div class="mt-4">
    <div class="flex justify-end mb-4 space-x-2">
        <div class="p-2 bg-amber-400 text-white rounded-lg cursor-pointer"><a href="/edit-car/<?= $car->car_id ?>">Edit</a></div>
        <div class="p-2 bg-red-400 text-white rounded-lg cursor-pointer" onclick="deleteCar(<?php echo $car->car_id ?>)">Delete</div>
    </div>
    <img src="<?= $car->image_url == null ? 'https://www.toyota.astra.co.id/sites/default/files/2022-01/02%20attitude%20black%20mica%20%28all%20type%29.png' : base_url('/car_image/' . $car->image_url) ?>" alt="Car" width="400">
    <div>Category: <?= $car->category_name; ?></div>
    <div class="mt-2"><?= $car->car_name; ?> - <?= $car->year; ?></div>
    <div>Rp. <?= $car->price; ?></div>
    <div class="my-4 text-sm"><?= $car->description; ?></div>
</div>
<?= $this->endSection(); ?>