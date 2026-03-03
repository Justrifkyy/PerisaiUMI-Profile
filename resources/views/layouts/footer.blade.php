<footer class="bg-black border-t border-black mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Brand & Navigation -->
            <div class="col-span-1 lg:col-span-2">
                @include('partials.footer.brand')
                @include('partials.footer.social-media')
                @include('partials.footer.contact-info')
            </div>

            <!-- Newsletter Subscription -->
            <div class="col-span-1 lg:col-span-2">
                @include('partials.footer.newsletter')
            </div>
        </div>

        <!-- Copyright -->
        @include('partials.footer.copyright')
    </div>
</footer>