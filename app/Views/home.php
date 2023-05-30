<?= $this->extend('layouts/layout'); ?>

<?= $this->section('main'); ?>
<div class="text-2xl font-medium">
    All Cars
</div>
<div class="grid lg:grid-cols-4 grid-cols-2 gap-6 mt-4">
    <div class="p-4 border-2">
        <img src="https://www.toyota.astra.co.id/sites/default/files/2022-01/02%20attitude%20black%20mica%20%28all%20type%29.png" alt="Car" width="400">
        <div class="mt-2">Land Cruiser - 2003</div>
        <div>Rp. 2.000.000.000</div>
        <div class="my-4 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptas, soluta voluptatum voluptatibus tempore dolorem ipsum optio sunt nemo sapiente.</div>
        <div class="flex justify-end mt-4">
            <div class="p-2 bg-gray-400 text-white rounded-lg cursor-pointer">Show Detail</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>