
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="app">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-danger">
        <img src="{{ asset('backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Bot Man</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/img/users_image/'. Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Bot Man</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ URL::to('portal/dashboard') }}"
                       class="nav-link {{ request()->is('portal/dashboard') ? 'bg-danger' : '' }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('portal/profile') }}"
                       class="nav-link {{ request()->is('portal/profile*') ? 'bg-danger' : '' }}">
                        <i class="nav-icon fa fa-user-circle-o"></i>
                        <p>Profile Setting</p>
                    </a>
                </li>

                  <li class="nav-item has-treeview {{ request()->is('portal/spare_parts_order*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/spare_parts_order*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>Spare Parts Order<i class="right fa fa-angle-left"></i>
                        <span class="badge badge-info warning">@{{ ordersCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/spare_parts_order/list') }}"
                               class="nav-link {{ request()->is('portal/spare_parts_order/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Spare Parts Order</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('portal/delivery*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/delivery*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>Delivery<i class="right fa fa-angle-left"></i>
                           
                                <span class="badge badge-info left">8</span>
                           
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/delivery/list') }}"
                               class="nav-link {{ request()->is('portal/delivery/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Delivery List</p>
                            </a>

                        </li>
                    </ul>
                </li>
                {{-- Payment --}}
                <li class="nav-item has-treeview {{ request()->is('portal/payment*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/payment*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-usd"></i>
                        <p>Payments<i class="right fa fa-angle-left"></i>
                           
                                <span class="badge badge-info left">8</span>
                           
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('#') }}"
                               class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pending Payments</p>
                            </a>

                        </li>
						<li class="nav-item">
                            <a href="{{ URL::to('portal/payment/due') }}"
                               class="nav-link {{ request()->is('portal/payment/due') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Due Payments</p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('#') }}" class="nav-link {{ request()->is('#') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Payment History</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>

                <li class="nav-item has-treeview {{ request()->is('portal/systemSetting*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/systemSetting*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>System Setting<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/systemSetting/brand/list') }}"
                               class="nav-link {{ request()->is('portal/systemSetting/brand/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{ URL::to('portal/systemSetting/model/list') }}"--}}
                               {{--class="nav-link {{ request()->is('portal/systemSetting/model/list') ? 'active' : '' }}">--}}
                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                {{--<p>Car Model</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('portal/brand*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/brand*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-car"></i>
                        <p>Brand<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/brand/list') }}"
                               class="nav-link {{ request()->is('portal/brand/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Brand List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/brand/add') }}" class="nav-link {{ request()->is('portal/brand/add') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('portal/promotions*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/promotions*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-gift"></i>
                        <p>Promotions<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/promotions/list') }}"
                               class="nav-link {{ request()->is('portal/promotions/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Promotions List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/promotions/add') }}" class="nav-link {{ request()->is('portal/promotions/add') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('portal/loan-info*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/loan-info*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-money"></i>
                        <p>Loan Info<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/loan-info/list') }}"
                               class="nav-link {{ request()->is('portal/loan-info/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Loan Info List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/loan-info/add') }}" class="nav-link {{ request()->is('portal/loan-info/add') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('portal/sales-center*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/sales-center*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>Sales Center Address<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/sales-center/list') }}"
                               class="nav-link {{ request()->is('portal/sales-center/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Sales Center Address List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/sales-center/add') }}" class="nav-link {{ request()->is('portal/sales-center/add') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('portal/spare-parts*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portal/spare-parts*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Spare Parts<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/spare-parts/list') }}"
                               class="nav-link {{ request()->is('portal/spare-parts/list') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Spare Parts List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('portal/spare-parts/add') }}" class="nav-link {{ request()->is('portal/spare-parts/add') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" data-toggle="modal" data-target=".logout"
                       class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script>
    new Vue({
        el: '#app',

        data() {
            return {
                ordersCount : 0,
            }
        },

        methods: {
            countDown() {
                axios.get('/portal/sparePartOrderCount')
                    .then(response => {
                        this.ordersCount = response.data;
                    })
                    .catch()
            }
        },

        mounted: function () {
            this.$nextTick(function () {
                window.setInterval(() => {
                    this.countDown();
                }, 1000);
            })
        }
    })
</script>