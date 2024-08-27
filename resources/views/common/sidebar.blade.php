<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RMS</div>
    </a>



    <!-- User management -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>User Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Management:</h6>
                <a class="collapse-item" href="">List</a>
                <a class="collapse-item" href="">Add New</a>

                <a class="collapse-item" href="">Import Data</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_Category"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Categories</span>
        </a>
        <div id="taTpDropDown_Category" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Categories:</h6>
                <a class="collapse-item" href="{{route('category.index')}}">List</a>
                <a class="collapse-item" href="{{route('category.create')}}">Add New</a>
            </div>
        </div>

    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_subCategory"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Sub Categories</span>
        </a>
        <div id="taTpDropDown_subCategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sub Categories:</h6>
                <a class="collapse-item" href="{{route('subCategory.index')}}">List</a>
                <a class="collapse-item" href="{{route('subCategory.create')}}">Add New</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_consumable"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Consumable</span>
        </a>
        <div id="taTpDropDown_consumable" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Consumable:</h6>
                <a class="collapse-item" href="{{route('consumable.index')}}">List</a>
                <a class="collapse-item" href="{{route('consumable.create')}}">Add New</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_stock"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Stock</span>
        </a>
        <div id="taTpDropDown_stock" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Stocks:</h6>
                <a class="collapse-item" href="{{route('stock.index')}}">List</a>
                <a class="collapse-item" href="{{route('stock.create')}}">Add New</a>
                <a class="collapse-item" href="{{route('stock.out')}}">Issuing</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_menu"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Menu</span>
        </a>
        <div id="taTpDropDown_menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="{{route('menu.index')}}">List</a>
                <a class="collapse-item" href="{{route('menu.create')}}">Add New</a>
            </div>
        </div>

    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown_order"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Order</span>
        </a>
        <div id="taTpDropDown_order" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Orders:</h6>
                <a class="collapse-item" href="{{route('order.index')}}">List</a>
                <a class="collapse-item" href="{{route('order.create')}}">Add New</a>
            </div>
        </div>

    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
