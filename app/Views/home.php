<?= $this->extend('layouts/layout'); ?>

<?= $this->section('main'); ?>
<div class="text-2xl font-medium">
    All Cars
</div>
<div class="grid lg:grid-cols-4 grid-cols-2 gap-6 mt-4">
    <?php foreach ($cars as $car) : ?>
        <div class="p-4 border-2 flex flex-col justify-between">
            <div class="flex justify-end mb-4">
                <div class="p-2 bg-red-400 text-white rounded-lg cursor-pointer" onclick="deleteCar(<?php echo $car['car_id'] ?>)">Delete</div>
            </div>
            <div>
                <img src="<?= $car['image_url'] == null ? 'https://www.toyota.astra.co.id/sites/default/files/2022-01/02%20attitude%20black%20mica%20%28all%20type%29.png' : base_url('/car_image/' . $car['image_url']); ?>" alt="Car" width="400">
                <div class="mt-2"><?= $car['car_name']; ?> - <?= $car['year']; ?></div>
                <div>Rp. <?= $car['price']; ?></div>
                <div class="my-4 text-sm"><?= $car['description']; ?></div>
            </div>
            <div class="flex justify-end mt-4">
                <div class="p-2 bg-gray-400 text-white rounded-lg cursor-pointer"><a href="/cars/<?= $car['car_id']; ?>">Show Detail</a></div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>