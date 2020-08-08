<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Product Menus</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a href="{{ route('products.edit', $productID) }}" class="nav-link">Product Detail</a>
            <a href="{{ route('products.images', $productID) }}" class="nav-link">Product Images</a>
        </nav>
    </div>
</div>
