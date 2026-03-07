<footer class="bg-black border-t border-black mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="col-span-1 lg:col-span-2">
                @include('layouts.footer.brand')
                @include('layouts.footer.social-media')
                @include('layouts.footer.contact-info')
            </div>

            <div class="col-span-1 lg:col-span-2">
                @include('layouts.footer.newsletter')
            </div>
        </div>

        @include('layouts.footer.copyright')
    </div>
</footer>