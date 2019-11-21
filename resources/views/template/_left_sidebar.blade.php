<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MASTER DATA</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-briefcase"></i><span class="hide-menu">Produk </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('product.index') }}">Product</a></li>
                        <li><a href="{{ route('product_group.index') }}">Product Group</a></li>
						<li><a href="{{ route('unit.index') }}">Product Unit</a></li>
                        <li><a href="{{ route('raw_material.index') }}">Raw Material</a></li>
                        <li><a href="{{ route('bill_of_material_h.index') }}">Bill of Material (BOM)</a></li>
                    </ul>
                </li>
				<li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Partners </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('supplier.index') }}">Supplier</a></li>
						<li><a href="{{ route('customer.index') }}">Customer</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">TRANSACTION</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-cube"></i><span class="hide-menu">Warehouse </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('stock_card.index') }}">Stock Card</a></li>
                        <li><a href="{{ route('goods_receive_h.index') }}">Goods Receive</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-th-large"></i><span class="hide-menu">Production </span></a>
                    <ul aria-expanded="false" class="collapse">                        
                        <li><a href="{{ route('production_planning.index') }}">Production Planning</a></li>
                        <li><a href="{{ route('material_request.index') }}">Material Request</a></li>
                        <li><a href="{{ route('material_usage.index') }}">Material Usage</a></li>
                        <li><a href="{{ route('production_actual.index') }}">Production Actual</a></li>
                        <li><a href="{{ route('allocation_fg.index') }}">Allocation FG</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-dolly-flatbed"></i><span class="hide-menu">Logistics </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('delivery_order.index') }}">Delivery to Customer</a></li>
                    </ul>
                </li>
				<li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-dolly"></i><span class="hide-menu">Sales </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Sales Order</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">CONFIGURATION</li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-cogs"></i><span class="hide-menu">General Setting </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('user_account.index') }}">User Account</a></li>
                        <li><a href="#">User Group</a></li>
                        <li><a href="#">User Privileges</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">APP</li>
                <li>
                    <a class="waves-effect waves-dark" 
                        href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        aria-expanded="false">
                        <i class="fa fa-power-off"></i>
                        <span class="hide-menu">Logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>