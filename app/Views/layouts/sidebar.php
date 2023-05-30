<div class="bg-gradient-to-b from-sky-400 to-indigo-900 text-white p-6 col-span-1 sm:min-h-screen">
    <div class="text-center text-[32px]">Bimo's Car</div>
    <ul class="mt-4 pl-8 space-y-2 text-lg">
        <li class="p-2 hover:bg-sky-200 hover:text-indigo-900 rounded-lg cursor-pointer <?php
                                                                                        $uri = new \CodeIgniter\HTTP\URI(current_url());
                                                                                        if ($uri->getSegment(2) == '') {
                                                                                            echo 'bg-sky-200 text-indigo-900';
                                                                                        }
                                                                                        ?>">Home</li>
        <li class="p-2 hover:bg-sky-200 hover:text-indigo-900 rounded-lg cursor-pointer <?php
                                                                                        $uri = new \CodeIgniter\HTTP\URI(current_url());
                                                                                        if ($uri->getSegment(2) == 'cars') {
                                                                                            echo 'bg-sky-200 text-indigo-900';
                                                                                        }
                                                                                        ?>">Products</li>
    </ul>
</div>